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

Route::get('/', 'BooksController@show');

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> ['auth', 'admin']],function(){
    // Route::get('/users', 'UserController@index')->middleware('admin');
    Route::resource('/users','UserController');
    Route::get('/books/create','BooksController@create');
    Route::post('/books','BooksController@store');
    Route::post('/subscribe','SubscribeController@store');
});

Route::resource('comments', 'CommentController');
Route::post('/{id}', 'BooksController@subscribe');