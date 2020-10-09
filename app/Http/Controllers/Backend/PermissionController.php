<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PermissionRequest;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['modules']=Module::all();
        $data['permissions']=Permission::paginate(3);
//        dd($data);
        //$data['permissions']=Permission::orderby('creatd_at','desc')->get();
        return view('backend.permission.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get module name by status
        $data['modules']=Module::where('status',1)->get();
        return view('backend.permission.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        //add created_by in request
        $request->request->add(['created_by'=>Auth::user()->id]);
        //send data to tag model
        $id=Permission::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Permission Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('permission.index');
        }else{
            $request->session()->flash('error_message','Permission Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('permission.create');
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
        //get permission by id
        $data['permission']=Permission::find($id);
        return view('backend.permission.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get permission by id
        $data['permission']=Permission::find($id);
        return view('backend.permission.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        $permission=Permission::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$permission->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Permission Updated Successfully');
        }else{
            $request->session()->flash('error_message','Permission Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get tag id
        $permission=Permission::find($id);
        //delete
        if ($permission->delete()){
            $request->session()->flash('success_message','Tag Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Tag Delete Failed');
        }
        //redirect abck to permission index page
        return redirect()->route('permission.index');
    }
}
