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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//for Books 

Route::get('books', 'BooksController@index')->name('books')->middleware('auth');

Route::get('books/create','BooksController@create')->middleware('auth');

Route::post('books','BooksController@store')->middleware('auth');

Route::get('books/{books}/edit','BooksController@edit')->middleware('auth');
// Route::patch('books/{books}/edit','BooksController@edit')->middleware('auth');

Route::post('books/{books}','BooksController@update')->middleware('auth');

Route::delete('books/{books}', 'BooksController@destroy')->middleware('auth');