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
//   // Understands welcome = welcome.blade.php
//     return view('welcome');
// });
Route::get('/', 'LecturesController@showWelcome');


// Route::get('/lectures', function () {
//     $titles = ["SA", "QA", "Archtecture Patterns", "UML", "REST", "SOAP"];
//     $cars = ["Volvo", "Cadillac", "Benz"];
//
//     // return view('lectures', ["titles"=>$titles]);
//     return view('lectures')->with('titles', $titles)->with('cars', $cars);
// });
Route::get('/lectures', 'LecturesController@showLectures');


// Route::get('/notes', function () {
//     return view('lectures');
// });
Route::get('/notes', 'LecturesController@showLectures');

// GET, POST, PUT, DELETE

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
