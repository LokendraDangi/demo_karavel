<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all categeory form database
        //$data['categeories']=Tag::all();
        //pagination
        $data['categories']=Category::paginate(10);
        //get all with order by
        //$data['categeories']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
       $id=Category::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Category Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('category.index');
        }else{
            $request->session()->flash('error_message','Category Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('category.create');
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
        //get category by id
        $data['category']=Category::find($id);
        return view('backend.category.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get category by id
        $data['category']=Category::find($id);
        return view('backend.category.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);
        //dd($category->update());
        $status=$category->update($request->all());

        if ($status){
            $request->session()->flash('success_message','Category Updated Successfully');
        }else{
            $request->session()->flash('error_message','Category Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('category.index');
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
        $category=Category::find($id);
        //delete
        if ($category->delete()){
            $request->session()->flash('success_message','Category Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Category Delete Failed');
        }
        //redirect abck to category index page
        return redirect()->route('category.index');
    }


}
