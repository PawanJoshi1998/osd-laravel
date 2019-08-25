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
//     return view('index');
// });

Route::get('/', 'IndexController@index');

Route::get('/book', function () {
    return view('book');
});

Route::get('/logins', function () {
    return view('logins');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/privacy', function () {
    return view('privacy-policy');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/product-single', function () {
    return view('product-single');
});
Route::get('/registers', function () {
    return view('registers');
});
Route::get('/shipping', function () {
    return view('shipping');
});
Route::get('/terms', function () {
    return view('terms-condition');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//for Books 

Route::get('books', 'BooksController@index')->name('books')->middleware('auth');

Route::get('books/create','BooksController@create')->middleware('auth');

Route::post('books','BooksController@store')->middleware('auth');

Route::get('books/{books}/edit','BooksController@edit')->middleware('auth');

Route::post('books/{books}','BooksController@update')->middleware('auth');

Route::delete('books/{books}', 'BooksController@destroy')->middleware('auth');


//for category

Route::get('categories', 'CategoriesController@index');
Route::get('categories/create', 'CategoriesController@create');
Route::post('categories', 'CategoriesController@store');
Route::get('categories/{category}/edit', 'CategoriesController@edit');
Route::patch('categories/{category}', 'CategoriesController@update');
Route::get('categories/{category}', 'CategoriesController@show');
Route::delete('categories/{category}', 'CategoriesController@destroy');


//for Banners

Route::get('banners', 'BannersController@index');
Route::get('banners/create', 'BannersController@create');
Route::post('banners', 'BannersController@store');
Route::get('banners/{banner}/edit', 'BannersController@edit');
Route::patch('banners/{banner}', 'BannersController@update');
Route::delete('banners/{banner}', 'BannersController@destroy');