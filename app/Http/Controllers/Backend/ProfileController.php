<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigurationRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Configuration;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profiles']=Profile::paginate(10);
        return view('backend.profile.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {

        if(!empty($request->file('logo'))){
            $path=base_path().'/public/images/profile';
            $image=$request->file('logo');
            $name=uniqid().'_'.$image->getClientOriginalName();
            if($image->move($path,$name)){
                $request->request->add(['logo'=>$name]);
            }
        }
        //dd($request);

        $request->request->add(['created_by'=>Auth::user()->id]);
        $id=Profile::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Profile Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('profile.index');
        }else{
            $request->session()->flash('error_message','Profile Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('profile.create');
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
        //get profile_id by id
        $data['profile']=Profile::find($id);
        return view('backend.profile.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get profile by id
        $data['profile']=Profile::find($id);
        return view('backend.profile.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $profile=Profile::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$profile->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Profile Updated Successfully');
        }else{
            $request->session()->flash('error_message','Profile Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get category id
        $profile=Profile::find($id);
        //delete
        if ($profile->delete()){
            $request->session()->flash('success_message','Profile Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Profile Delete Failed');
        }
        //redirect abck to category index page
        return redirect()->route('profile.index');
    }
}
