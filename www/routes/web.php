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
Route::match(['get','post'],'/', 'AdminController@login');
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
}
);