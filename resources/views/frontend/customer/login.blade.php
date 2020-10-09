@extends('frontend.layouts.frontend')
@section('title','Customer Login page')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Login or Create an Account</h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>


    <!-- BEGIN Main Container -->

    <div class="main-container col1-layout wow bounceInUp animated animated" style="visibility: visible;">
        @include('layouts.includes.flash')
        <div class="main">
            <div class="account-login container">
                <!--page-title-->

                <form action="{{ route('customer.auth.loginCustomer') }}" method="post" id="login-form">
                    @csrf
                    <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
                    <fieldset class="col2-set">
                        <div class="col-1 new-users">
                            <strong>New Customers</strong>
                            <div class="content">

                                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                <div class="buttons-set">
                                    <button type="button" title="Create an Account" class="button create-account" onClick=""><span><span>Create an Account</span></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <strong>Registered Customers</strong>
                            <div class="content">

                                <p>If you have an account with us, please log in.</p>
                                <ul class="form-list">
                                    <li>
                                        <label for="email">Email Address<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="text" name="email" value="" id="email" class="input-text required-entry validate-email" title="Email Address">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </li>
                                    <li>
                                        <label for="pass">Password<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input type="password" name="password" class="input-text required-entry validate-password" id="pass" title="Password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                                <p class="required">* Required Fields</p>
                                <div class="buttons-set">
                                    <input type="checkbox" name="remember" value="remember"/>Remember Me

                                    <button type="submit" class="button login" title="Login" name="send" id="send2"><span>Login</span></button>

                                    <a href="#" class="forgot-word">Forgot Your Password?</a>
                                </div> <!--buttons-set-->
                            </div> <!--content-->
                        </div> <!--col-2 registered-users-->
                    </fieldset> <!--col2-set-->
                </form>

            </div> <!--account-login-->

        </div><!--main-container-->

    </div> <!--col1-layout-->

@endsection   <!-- For version 1,2,3,4,6 -->
@section('js')

@endsection
