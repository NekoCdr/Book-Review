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
    return view('index');
});

Route::get('authors', function (){
    return view('author-list');
})->name('authors');

Route::get('books', function (){
    return view('book-list');
})->name('books');

Route::get('authors/{id}', 'AuthorController@show')->name('author-info');

Route::get('books/{id}', 'BookController@show')->name('book-info');
