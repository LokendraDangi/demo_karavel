<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('customer/')->group(function () {
    Route::get('/verification/{code}', 'Frontend\CustomerController@verification')->name('customer.verification');
    Route::get('/', 'Frontend\CustomerController@index')->name('customer.dashboard');
    Route::get('dashboard', 'Frontend\CustomerController@index')->name('customer.dashboard');
    Route::get('register', 'Frontend\CustomerController@create')->name('customer.register');
    Route::post('register', 'Frontend\CustomerController@store')->name('customer.register.store');
    Route::get('login', 'Auth\CustomerLoginController@login')->name('customer.auth.login');
    Route::post('login', 'Auth\CustomerLoginController@loginCustomer')->name('customer.auth.loginCustomer');
    Route::get('logout', 'Auth\CustomerLoginController@logout')->name('customer.auth.logout');
});


Route::prefix('/')->namespace('frontend')->group(function(){
    Route::get('', 'FrontController@index')->name('front.index');
    Route::get('category/{slug}', 'FrontController@category')->name('front.category');
    Route::get('product/{slug}', 'FrontController@product')->name('front.product');
    Route::post('cart/add', 'CartController@add')->name('frontend.cart.add');
    Route::get('cart/delete/{row_id}', 'CartController@delete')->name('frontend.cart.delete');
    Route::get('cart', 'CartController@index')->name('frontend.cart.index');
});

Route::get('/welcome', function () {
    return view('layouts.backend');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('/backend/')->middleware('auth')->namespace('Backend')->group(function (){
    //listing page
    Route::get('tag', 'TagController@index')->name('tag.index');
    //insert form
    Route::get('tag/create', 'TagController@create')->name('tag.create');
    //data store
    Route::post('tag', 'TagController@store')->name('tag.store');
    //view details of tag
    Route::get('tag/{id}', 'TagController@show')->name('tag.show');
    //edit for tag
    Route::get('tag/{id}/edit', 'TagController@edit')->name('tag.edit');
    //update for tag
    Route::put('tag/{id}', 'TagController@update')->name('tag.update');
    //delete for tag
    Route::delete('tag/{id}', 'TagController@destroy')->name('tag.destroy');

    Route::post('category/subcategory', 'CategoryController@subcategory')->name('category.subcategory');


    /*category*/
    //listing page
    Route::get('category', 'CategoryController@index')->name('category.index');
    //insert form
    Route::get('category/create', 'CategoryController@create')->name('category.create');
    //data store
    Route::post('category', 'CategoryController@store')->name('category.store');
    //view details of category
    Route::get('category/{id}', 'CategoryController@show')->name('category.show');
    //edit for category
    Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
    //update for category
    Route::put('category/{id}', 'CategoryController@update')->name('category.update');
    //delete for category
    Route::delete('category/{id}', 'CategoryController@destroy')->name('category.destroy');

    /*Module*/
    //listing page
    Route::get('module', 'ModuleController@index')->name('module.index');
    //insert form
    Route::get('module/create', 'ModuleController@create')->name('module.create');
    //data store
    Route::post('module', 'ModuleController@store')->name('module.store');
    //view details of module
    Route::get('module/{id}', 'ModuleController@show')->name('module.show');
    //edit for module
    Route::get('module/{id}/edit', 'ModuleController@edit')->name('module.edit');
    //update for module
    Route::put('module/{id}', 'ModuleController@update')->name('module.update');
    //delete for module
    Route::delete('module/{id}', 'ModuleController@destroy')->name('module.destroy');

    /*Slider*/
    //listing page
    Route::get('slider', 'SliderController@index')->name('slider.index');
    //insert form
    Route::get('slider/create', 'SliderController@create')->name('slider.create');
    //data store
    Route::post('slider', 'SliderController@store')->name('slider.store');
    //view details of slider
    Route::get('slider/{id}', 'SliderController@show')->name('slider.show');
    //edit for slider
    Route::get('slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    //update for slider
    Route::put('slider/{id}', 'SliderController@update')->name('slider.update');
    //delete for slider
    Route::delete('slider/{id}', 'SliderController@destroy')->name('slider.destroy');

    /*Subcategory*/
    Route::post('subcategory/productline', 'SubcategoryController@productline')->name('subcategory.productline');

    //listing page
    Route::get('subcategory', 'SubcategoryController@index')->name('subcategory.index');
    //insert form
    Route::get('subcategory/create', 'SubcategoryController@create')->name('subcategory.create');
    //data store
    Route::post('subcategory', 'SubcategoryController@store')->name('subcategory.store');
    //view details of subcategory
    Route::get('subcategory/{id}', 'SubcategoryController@show')->name('subcategory.show');
    //edit for subcategory
    Route::get('subcategory/{id}/edit', 'SubcategoryController@edit')->name('subcategory.edit');
    //update for subcategory
    Route::put('subcategory/{id}', 'SubcategoryController@update')->name('subcategory.update');
    //delete for subcategory
    Route::delete('subcategory/{id}', 'SubcategoryController@destroy')->name('subcategory.destroy');

    /*Permission*/
    //listing page
    Route::get('permission', 'PermissionController@index')->name('permission.index');
    //insert form
    Route::get('permission/create', 'PermissionController@create')->name('permission.create');
    //data store
    Route::post('permission', 'PermissionController@store')->name('permission.store');
    //view details of permission
    Route::get('permission/{id}', 'PermissionController@show')->name('permission.show');
    //edit for permission
    Route::get('permission/{id}/edit', 'PermissionController@edit')->name('permission.edit');
    //update for permission
    Route::put('permission/{id}', 'PermissionController@update')->name('permission.update');
    //delete for permission
    Route::delete('permission/{id}', 'PermissionController@destroy')->name('permission.destroy');

    /*Roles*/
    //listing page
    Route::get('role', 'RoleController@index')->name('role.index');
    //insert form
    Route::get('role/create', 'RoleController@create')->name('role.create');
    //data store
    Route::post('role', 'RoleController@store')->name('role.store');
    //view details of role
    Route::get('role/{id}', 'RoleController@show')->name('role.show');
    //edit for role
    Route::get('role/{id}/edit', 'RoleController@edit')->name('role.edit');
    //update for role
    Route::put('role/{id}', 'RoleController@update')->name('role.update');
    //delete for role
    Route::delete('role/{id}', 'RoleController@destroy')->name('role.destroy');
    //assign role permission
    Route::get('role/assignpermission/{id}', 'RoleController@assignpermission')->name('role.assignpermission');

    Route::post('role/savepermission/{id}', 'RoleController@savePermission')->name('role.savepermission');

    /*users*/
    //listing page
    Route::get('user', 'UserController@index')->name('user.index');
    //insert form
    Route::get('user/create', 'UserController@create')->name('user.create');
    //data store
    Route::post('user', 'UserController@store')->name('user.store');
    //view details of user
    Route::get('user/{id}', 'UserController@show')->name('user.show');
    //edit for user
    Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
    //update for user
    Route::put('user/{id}', 'UserController@update')->name('user.update');
    //delete for user
    Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy');

    /*product*/
    //listing page
    Route::get('product', 'ProductController@index')->name('product.index');
    //insert form
    Route::get('product/create', 'ProductController@create')->name('product.create');
    //data store
    Route::post('product', 'ProductController@store')->name('product.store');
    //view details of product
    Route::get('product/{id}', 'ProductController@show')->name('product.show');
    //edit for product
    Route::get('product/{id}/edit', 'ProductController@edit')->name('product.edit');
    //update for product
    Route::put('product/{id}', 'ProductController@update')->name('product.update');
    //delete for product
    Route::delete('product/{id}', 'ProductController@destroy')->name('product.destroy');

    Route::post('product/deleteimage', 'ProductController@deleteImage')->name('product.deleteimage');

    //route for product line
    Route::get('productline', 'ProductLineController@index')->name('productline.index');
    //insert form
    Route::get('productline/create', 'ProductLineController@create')->name('productline.create');
    //data store
    Route::post('productline', 'ProductLineController@store')->name('productline.store');
    //view details of productline
    Route::get('productline/{id}', 'ProductLineController@show')->name('productline.show');
    //edit for productline
    Route::get('productline/{id}/edit', 'ProductLineController@edit')->name('productline.edit');
    //update for productline
    Route::put('productline/{id}', 'ProductLineController@update')->name('productline.update');
    //delete for productline
    Route::delete('productline/{id}', 'ProductLineController@destroy')->name('productline.destroy');

    /*Configuration*/
    //listing page
    Route::get('profile', 'ProfileController@index')->name('profile.index');
    //insert form
    Route::get('profile/create', 'ProfileController@create')->name('profile.create');
    //data store
    Route::post('profile', 'ProfileController@store')->name('profile.store');
    //view details of profile
    Route::get('profile/{id}', 'ProfileController@show')->name('profile.show');
    //edit for profile
    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    //update for profile
    Route::put('profile/{id}', 'ProfileController@update')->name('profile.update');
    //delete for profile
    Route::delete('profile/{id}', 'ProfileController@destroy')->name('profile.destroy');
});

