<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    function add(Request $request){
        $status=Cart::add(['id'=>$request->input('product_id'),'name'=>$request->input('product_name'),'qty'=>$request->input('qty'),'price'=>$request->input('price'),'weight'=>1,'options'=>$request->input('attribute')]);
        if ($status){
            $request->session()->flash('success_message','Item Added into cart Successfully!');
        }else{
            $request->session()->flash('error_message','Cart Addition Failed!');
        }
        return redirect()->route('frontend.front.product',$request->input('product_slug'));
    }


    function  delete(Request $request,$row_id){

        if(Cart::remove($row_id)){
            $request->session()->flash('success_message','Item deleted from cart  Successfully!');
        }else{
            $request->session()->flash('error_message','Cart delete Failed!');
        }
        return back();
    }

    function  index(){
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();
        $data['carts'] = Cart::content();
        return view('frontend.cart.index',compact('data'));
    }
}
