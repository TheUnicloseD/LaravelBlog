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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'HomeController@index');
Route::get('/articles/', 'ArticlesController@index');
Route::get('welcome', 'ArticlesController@list');
Route::get('/articles/{post_title}', 'ArticlesController@affiche');

Route::get('/contact', 'ContactController@create');
Route::post('/contact','ContactController@store');



Auth::routes();

   
Route::middleware('auth')->group(function () {
    // All routes and resource routes defined in this Closure are protected by the `auth` middleware
    Route::post('/{posts}/comments', 'CommentController@store')->name('comments.store');
    // other routes...
    

});

Route::resource('posts', 'ArticlesController');