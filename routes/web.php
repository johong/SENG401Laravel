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
    Route::resource('/users','UserController');
    Route::get('/books/create','BooksController@create');
    Route::post('/books','BooksController@store');
    Route::get('/books/{id}/edit', 'BooksController@edit');
    Route::patch('/books/{id}','BooksController@update');
    Route::delete('/books/{id}','BooksController@destroy');
    Route::post('/subscribe','SubscribeController@store');
    Route::get('/authors/create','AuthorsController@create');
    Route::post('/authors','AuthorsController@store');
    Route::get('/authors/{id}/edit', 'AuthorsController@edit');
    Route::patch('/authors/{id}','AuthorsController@update');
    Route::delete('/authors/{id}','AuthorsController@destroy');
});

Route::resource('comments', 'CommentController');
Route::post('/{id}', 'BooksController@subscribe');
Route::delete('/{id}', 'BooksController@unsubscribe');