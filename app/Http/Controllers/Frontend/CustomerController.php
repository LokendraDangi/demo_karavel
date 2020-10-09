<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:customer',['only' => 'index','edit']);
    }

    public function index()
    {
        return view('frontend.customer.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['menus'] = Category::where('status',1)->orderby('rank')->get();

        return view('frontend.customer.register',compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
//        $this->validate($request, [
//            'name'          => 'required',
//            'email'         => 'required',
//            'password'      => 'required'
//        ]);
        // store in the database
        $customers = new Customer();
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->password=bcrypt($request->input('password'));

        $customers->phone = $request->phone;
        $customers->address = $request->address;
        $customers->shipping_address = $request->shipping_address;
        $customers->username = $request->username;
        $customers->verification_key = uniqid();
        $customers->status = 0;
        if ($customers->save()){
            $path = route('customer.verification',$customers->verification_key);
            $link = "<a href='$path' target='_blank'>Verify</a>";
            $request->session()->flash('success_message',"Your Registration is Success!, Please click on verification link, $link");
        }else {
            $request->session()->flash('error_message','Registration Failed!');
            return redirect()->route('customer.auth.register');
        }
        return redirect()->route('customer.auth.login');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function  verification(Request $request,$code){
        $customer = Customer::where('verification_key' ,$code)->where('status',0)->get();
        if (count($customer) == 1){
            $customer[0]->verification_key = '';
            $customer[0]->status = 1;
            $customer[0]->update();
            $request->session()->flash('success_message','Verification Success!, Please Login');
            return redirect()->route('customer.auth.login');

        }else {
            $request->session()->flash('error_message','Verification Failed!, Please Try Again');
            return redirect()->route('customer.register');
        }
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }

}
