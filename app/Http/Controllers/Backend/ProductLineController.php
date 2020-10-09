<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductLineRequest;
use App\Models\Category;
use App\Models\ProductLine;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all categeory form database
        $data['categeories']=Category::all();
        $data['subcategeories']=Subcategory::all();
        //pagination
        $data['productlines']=productline::paginate(10);
        //get all with order by
        //$data['categeories']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.productline.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get categroy name by status
        $data['categories']=Category::all();
        $data['subcategories']=Subcategory::all();
        return view('backend.productline.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productLineRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        $request->request->add(['stock'=>$request->input('quantity')]);
        $id=ProductLine::create($request->all());
            if($id){
            $request->session()->flash('success_message','productline Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('productline.index');
        }else{
            $request->session()->flash('error_message','productline Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('productline.create');
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
        //get product by id
        $data['productline']=ProductLine::find($id);
        return view('backend.productline.show',compact('data'));
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
        $data['categories']=Category::all();
        $data['subcategories']=Subcategory::all();
        $data['productline']=ProductLine::find($id);
        //dd($data);
        return view('backend.productline.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(productLineRequest $request, $id)
    {
       $productline=ProductLine::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$productline->update($request->all());
        if ($status){
            $request->session()->flash('success_message','ProductLine Updated Successfully');
        }else{
            $request->session()->flash('error_message','ProductLine Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('productline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //get product id
        $productline=ProductLine::find($id);
        //delete
        if ($productline->delete()){
            $request->session()->flash('success_message','ProductLine Deleted Successfully');
        }else{
            $request->session()->flash('error_message','ProductLine Delete Failed');
        }
        //redirect abck to product index page
        return redirect()->route('productline.index');
    }
    function  subcategory(Request $request){
        $category = Category::find($request->input('category_id'));
        $options = '';
        foreach($category->subcategories as $subcategory){
            $options .= "<option value='$subcategory->id'>$subcategory->name</option>";
        }
        return $options;
    }
}
