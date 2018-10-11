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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::match(['get','post'],'/admin', 'AdminController@login');
Route::match(['get','post'],'/', 'indexController@index');
Route::match(['get','post'],'/Products', 'ProductsController@showProducts');
Route::match(['get','post'],'/Products/{id}', 'ProductsController@showProducts');
Route::match(['get','post'],'/productsdetail/{id}', 'ProductsController@showProductDetail');
Route::match(['get','post'],'/404','indexController@error');
Route::match(['get','post'],'/cart', 'cartController@showCart');
Route::match(['get','post'],'/deleteimage/{id}', 'ProductsController@deleteImage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'AdminController@logout');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::match(['get','post'],'/admin/settings', 'AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@chkpswd');
    Route::match(['get','post'],'/admin/update-pwd', 'AdminController@updatepassword');

    //routes for CategoryController
    Route::match(['get','post'],'admin/add_category','CategoryController@addCategory');
    Route::match(['get','post'],'admin/add','CategoryController@add');
    Route::match(['get','post'],'admin/view_category','CategoryController@viewcategory');
    Route::match(['get','post'],'/admin/deletecategory/{id}','CategoryController@deletecategory');
    Route::match(['get','post'],'/admin/edit_category/{id}','CategoryController@vieweditcategory');
    Route::match(['get','post'],'/admin/editcat/{id}','CategoryController@editcategory');
    //routes for ProductsController

    Route::match(['get','post'],'admin/add_product','ProductsController@addproduct');
    Route::match(['get','post'],'admin/addingproduct','ProductsController@addproduct');
    Route::match(['get','post'],'admin/view_products','ProductsController@viewproducts');
    Route::match(['get','post'],'/admin/edit_product/{id}','ProductsController@editproduct');
    Route::match(['get','post'],'/admin/editvalue/{id}','ProductsController@editproduct');
    Route::match(['get','post'],'/admin/deleteproduct/{id}','ProductsController@deleteproduct');

    //routes for add_attributes
    Route::match(['get','post'],'admin/add_attributes/{id}','ProductsController@addAttribute');
    Route::match(['get','post'],'/admin/addingattribute/{id}','ProductsController@addAttribute');
    Route::match(['get','post'],'/admin/deleteattribute/{id}','ProductsController@deleteAttribute');
}
);