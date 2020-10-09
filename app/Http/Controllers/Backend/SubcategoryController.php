<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //get category name
        $data['categories']=Category::all();
        $data['subcategories']=Subcategory::paginate(10);
        return view('backend.subcategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get category name
       // $data['categories']=Category::all();
        //get categroy name by status
        $data['categories']=Category::where('status',1)->get();
      return view('backend.subcategory.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
       $request->request->add(['created_by'=>Auth::user()->id]);
       $id=Subcategory::create($request->all());
        if ($id){
            $request->session()->flash('success_message','Subcategory Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('subcategory.index');
        }else{
            $request->session()->flash('error_message','Subcategory Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('subcategory.create');
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
        //get subcategory by id
        $data['subcategory']=Subcategory::find($id);
        return view('backend.subcategory.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   //get category for subcategory
        $data['categories']=Category::where('status',1)->get();
        //get subcategory for edit
        $data['subcategory']=Subcategory::find($id);
        return view('backend.subcategory.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, $id)
    {
        $subcategory=Subcategory::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$subcategory->update($request->all());
        if ($status){
            $request->session()->flash('success_message','Subcategory Updated Successfully');
        }else{
            $request->session()->flash('error_message','Subcategory Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get subcategory id
        $subcategory=Subcategory::find($id);
        //delete
        if ($subcategory->delete()){
            $request->session()->flash('success_message','Subcategory Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Subcategory Delete Failed');
        }
        //redirect abck to subcategory index page
        return redirect()->route('subcategory.index');
    }

    /**
     * @param Request $request
     * @return string
     */
    function  productline(Request $request){
        $subcategory = Subcategory::find($request->input('subcategory_id'));
        $options = '';
        foreach($subcategory->productlines as $productline){
            $options .= "<option value='$productline->id'>$productline->name</option>";
        }
        return $options;
    }
}
