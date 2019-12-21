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

Route::get('/', function () {
    return view('welcome');
});
Route::get('posts','PagesController@posts');
Route::get('posts/{id}','PagesController@post');
Route::get('categories/{id}','PagesController@category');
Route::get('register','Registration@create');
Route::post('register','Registration@store');
Route::get('login','SessionController@create');
Route::post('login','SessionController@store');
Route::get('logout','SessionController@destroy');
Route::get('accessDenied','PagesController@accessDenied');
Route::post('comments/store','CommentsController@store');
Route::get('statistics','PagesController@statistics');
Route::group(['middleware'=>'roles','roles'=>['admin']],function(){
    Route::get('admin','PagesController@admin');
    Route::post('addRole','PagesController@addRole');
    Route::post('setting','PagesController@setting');
});
Route::group(['middleware'=>'roles','roles'=>['admin','editor']],function(){
	Route::post('posts/store','PagesController@store');
	
});
Route::group(['middleware'=>'roles','roles'=>['user','editor','admin']],function(){
   
   Route::post('like','PagesController@like')->name('like');
   Route::post('dislike','PagesController@dislike')->name('dislike');
});
