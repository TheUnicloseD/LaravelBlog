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
Route::get('home', function () {
    return view('/home');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::post('comments/{posts}', 'CommentController@store')->name('comments.store');
    
});


Auth::routes();


Route::get('/', 'HomeController@index');

Route::get('welcome', 'ArticlesController@list');

Route::get('/posts/articles/', 'ArticlesController@index');
Route::get('/show/{post_title}', 'ArticlesController@affiche');

Route::get('/contact', 'ContactController@create');
Route::post('/contact','ContactController@store');

Route::resource('posts', 'ArticlesController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {
    Route::resource('users', 'UsersController');
});


Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/sign-in/github', 'Auth\LoginController@github');
Route::get('/sign-in/github/redirect','Auth\LoginController@githubRedirect');

