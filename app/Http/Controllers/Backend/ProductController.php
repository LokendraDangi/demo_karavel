<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductLine;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        $data['productlines']=ProductLine::all();
        //pagination
        $data['products']=Product::paginate(10);
        //get all with order by
        //$data['categeories']=Tag::orderby('creatd_at','desc')->get();
        return view('backend.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get categroy name by status
        $data['tags']=Tag::all();
        $data['categories']=Category::all();
        $data['subcategories']=Subcategory::all();
        $data['productlines']=ProductLine::all();
        return view('backend.product.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->request->add(['created_by'=>Auth::user()->id]);
        $request->request->add(['stock'=>$request->input('quantity')]);
        $product = Product::create($request->all());
        if ($product) {
            $product->tags()->attach($request->input('tag_id'));
            $att = $request->input('attribute_name');
            $att_value = $request->input('attribute_value');
            for ($i = 0; $i < count($att); $i++) {
                $attributes = [
                    'name' => $att[$i],
                    'value' => $att_value[$i],
                    'product_id' => $product->id,
                    'status' => 1
                ];
                Attribute::create($attributes);
            }
            $images = $request->file('product_image');
            $image_data = ['product_id' => $product->id];
            for($i = 0;$i < count($images);$i++){
                if(!empty($images[$i])){
                    $img = $images[$i];
                    $path=base_path().'/public/images/product';
                    $name=uniqid().'_'.$img->getClientOriginalName();
                    if($img->move($path,$name)){
                        $image_data['image'] = $name;
                        Image::create($image_data);
                    }
                }
            }
            $request->session()->flash('success_message','Product Created Successfully');
            //redirect abck to tag index page
            return redirect()->route('product.index');
        }else{
            $request->session()->flash('error_message','Product Creation Failed');
            //redirect abck to tag index page
            return redirect()->route('product.create');
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
        $data['product']=Product::find($id);
        $data['attribute']=Attribute::find($id);
        return view('backend.product.show',compact('data'));
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
        $data['tags']=Tag::all();
        $data['product']=Product::find($id);
        //dd($data);
        return view('backend.product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
       $product=Product::find($id);
        //add updated by to request
        $request->request->add(['updated_by'=>Auth::user()->id]);

        $status=$product->update($request->all());
        if ($status){
            $request->session()->flash('success_message','product Updated Successfully');
        }else{
            $request->session()->flash('error_message','Product Updated Failed');
        }
        //redirect abck to tag index page
        return redirect()->route('product.index');
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
        $product=Product::find($id);
        //delete
        if ($product->delete()){
            $request->session()->flash('success_message','Product Deleted Successfully');
        }else{
            $request->session()->flash('error_message','Product Delete Failed');
        }
        //redirect abck to product index page
        return redirect()->route('Product.index');
    }

    /**
     * @param Request $request
     * @param $id
     */
    public  function  deleteImage(Request $request){
        $image = Image::find($_POST['image_id']);
        if($image->delete()){
           return 'true';
        }else{
            return 'false';
        }
    }

}
