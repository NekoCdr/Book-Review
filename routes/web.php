<?php

use Illuminate\Routing\Router;

/** @var $router Router */

$router->name('index')->get('/', function () {
	return view('index');
});

$router->name('authors')->get('authors', function (){
	return view('author-list');
});

$router->name('books')->get('books', function (){
	return view('book-list');
});

$router->group(['namespace' => 'App\\Controllers'], function (Router $router){
	$router->name('author-info')->get('authors/{id}', 'AuthorController@show');
	$router->name('book-info')->get('books/{id}', 'BookController@show');
});
