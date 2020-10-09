<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all tag form database
        //$data['tags']=Tag::all();
        //pagination
        $data['tags']=Tag::paginate();
        //get all with order by
        //$data['tags']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.tag.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        //store data into database
        //dd($request->all());
        //add created_by in request
        $request->request->add(['created_by'=>Auth::user()->id]);
        //send data to tag model
        $id=Tag::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Tag Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('tag.index');
        }else{
            $request->session()->flash('error_message','Tag Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('tag.create');
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
      //get tag by id
        $data['tag']=Tag::find($id);
        return view('backend.tag.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get tag by id
        $data['tag']=Tag::find($id);
        return view('backend.tag.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $tag=Tag::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$tag->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Tag Updated Successfully');
        }else{
            $request->session()->flash('error_message','Tag Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('tag.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //get tag id
        $tag=Tag::find($id);
        //delete
        if ($tag->delete()){
            $request->session()->flash('success_message','Tag Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Tag Delete Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('tag.index');

    }
}
