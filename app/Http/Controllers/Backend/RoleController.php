<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\RoleRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all role form database
        //$data['roles']=Role::all();
        //pagination
        $data['roles']=Role::paginate();
        //get all with order by
        //$data['roles']=Role::orderby('creatd_at','desc')->get();
        return view('backend.role.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //add created_by in request
        $request->request->add(['created_by'=>Auth::user()->id]);
        //send data to tag model
        $id=Role::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Role Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('role.index');
        }else{
            $request->session()->flash('error_message','Role Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('role.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get role by id
        $data['role']=Role::find($id);
        return view('backend.role.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get role by id
        $data['role']=Role::find($id);
        return view('backend.role.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        $role=Role::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$role->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Role Updated Successfully');
        }else{
            $request->session()->flash('error_message','Role Updated Failed');
        }
        //redirect abck to role index page
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get role id
        $role=Role::find($id);
        //delete
        if ($role->delete()){
            $request->session()->flash('success_message','Role Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Role Delete Failed');
        }
        //redirect abck to role index page
        return redirect()->route('role.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function assignpermission($id)
    {

        $data['modules']=Module::all();
        $data['role'] =Role::find($id);
        $data['assigned_permission'] = array_column($data['role']->permissions->toArray(),'id');
        return view('backend.role.assignpermission',compact('data'));

    }

    /**
     * @param Request $request
     * @param $id
     *  @return message for role
     */
    public function  savePermission(Request $request, $id){
//        dd($request);
        $role =Role::find($id);
        $status = $role->permissions()->sync($request->input('permission'));
        if ($status){
            $request->session()->flash('success_message','Permisison Assigned Successfully');
        }else{
            $request->session()->flash('error_message','Permission Assign Failed');
        }
        //redirect abck to role index page
        return redirect()->route('role.index');
    }

}
