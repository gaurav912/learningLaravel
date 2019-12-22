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
Route::group(['middleware'=>'auth'],function(){
	Route::get('/admin','Backend\AdminController@dashboard');
	Route::get('/admin/dashboard','Backend\AdminController@dashboard');
	Route::get('/admin/blog','Backend\BlogController@index');
	Route::get('/admin/blog/create','Backend\BlogController@create');
	Route::post('/admin/blog/store','Backend\BlogController@store');
	Route::get('/admin/blog/edit/{id}','Backend\BlogController@edit')->name('admin.blog.edit');
	Route::post('/admin/blog/update','Backend\BlogController@update');
	Route::get('/admin/blog/show/{id}','Backend\BlogController@show')->name('admin.blog.show');
	Route::post('/admin/blog/delete/{id}','Backend\BlogController@destroy');
	Route::get('/admin/logout','Auth\LoginController@logout');

});
	
Route::get('/','Frontend\BlogController@index');
Route::get('/post/{id}','Frontend\BlogController@showindividualpost')->name('post.show');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
