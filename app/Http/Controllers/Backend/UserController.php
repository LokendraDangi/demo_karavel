<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all user form database
        //$data['users']=User::all();
        //pagination
        $data['users']=User::paginate();
        //get all with order by
        //$data['users']=User::orderby('creatd_at','desc')->get();
        return view('backend.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get category name
        $data['roles']=Role::all();
       return view('backend.user.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        //send data to tag model
        $id=User::create($request->all());
        if ($id){
            $request->session()->flash('success_message','User Created Successfully');
            //redirect back to tag index page
            return redirect()->route('user.index');
        }else{
            $request->session()->flash('error_message','User Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('user.create');
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
        //get user by id
        $data['user']=User::find($id);
        return view('backend.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get user by id
        $data['user']=User::find($id);
        return view('backend.user.edit',compact('data',$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user=User::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$user->update($request->all());
        if ($status){
            $request->session()->flash('success_message','User Updated Successfully');
        }else{
            $request->session()->flash('error_message','User Updated Failed');
        }
        //redirect abck to user index page
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get user id
        $user=User::find($id);
        //delete
        if ($user->delete()){
            $request->session()->flash('success_message','User Deleted Successfully');
        }else{
            $request->session()->flash('error_message','User Delete Failed');
        }
        //redirect abck to user index page
        return redirect()->route('user.index');
    }
}
