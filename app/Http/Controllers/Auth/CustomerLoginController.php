<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout');

    }

    public function login()
    {
        return view('frontend.customer.login');
    }
    public function loginCustomer(Request $request)
    {

//         Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
//        dd($request);

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('customer.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->route('customer.auth.login');

    }

//    public function logout()
//    {
//        Auth::guard('customer')->logout();
//        return redirect()->route('customer.auth.login');
//    }
    function  logout(Request $request){
        {
//            dd(Auth::guard('customer')->user()->name);
            Auth::guard('customer')->logout();
            $activeGuards = 0;
            foreach (config('auth.guards') as $guard => $guardConfig) {
                if ($guardConfig['driver'] === 'session') {
                    $guardName = Auth::guard($guard)->getName();
                    if ($request->session()->has($guardName) && $request->session()->get($guardName) === Auth::guard($guard)->user()->getAuthIdentifier()) {
                        $activeGuards++;
                    }
                }
            }
            if ($activeGuards === 0) {
                $request->session()->flush();
                $request->session()->regenerate();
            }
            return redirect('/customer/login');
        }
    }

    protected function guard()
    {
        return Auth::guard('customer');
    }
}
