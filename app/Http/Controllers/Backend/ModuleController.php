<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all module form database
        //$data['modules']=Tag::all();
        //pagination
        $data['modules']=Module::paginate();
        //get all with order by
        //$data['modules']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.module.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.module.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuleRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
       $id=Module::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Module Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('module.index');
        }else{
            $request->session()->flash('error_message','Module Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('module.create');
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
        //get module by id
        $data['module']=Module::find($id);
        return view('backend.module.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get module by id
        $data['module']=Module::find($id);
        return view('backend.module.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleRequest $request, $id)
    {
        $module=Module::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$module->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Module Updated Successfully');
        }else{
            $request->session()->flash('error_message','Module Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('module.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get module id
        $module=Module::find($id);
        //delete
        if ($module->delete()){
            $request->session()->flash('success_message','Module Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Module Delete Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('module.index');
    }
}
