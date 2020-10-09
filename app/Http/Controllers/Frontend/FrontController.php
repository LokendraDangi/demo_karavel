<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

class FrontController extends Controller
{
    function __construct()
    {

    }

    function index(){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['sliders'] = Slider::orderby('title')->limit(5)->get();
        $data['topcategories'] = Category::orderby('rank','desc')->limit(5)->get();
        //dd($data);
        return view('Frontend.front.index',compact('data'));
    }

    function category($slug){
        $data['menus']=Category::where('status',1)->orderby('rank')->get();
        $data['category'] = Category::where('slug',$slug)->get();
        $data['products'] = Product::where('category_id',$data['category'][0]->id)->paginate(12);
        return view('Frontend.front.category',compact('data'));
    }

    function  product($slug){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['product'] = Product::where('slug',$slug)->get();
        // replace where('subcategory_id',$data['product'][0]->subcategory_id) with prodcut_line_id
        $data['related_products'] = Product::where('productline_id',$data['product'][0]->productline_id)->get();
        return view('Frontend.front.product',compact('data'));
    }
}
