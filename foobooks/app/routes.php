<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return "Hello World!";
	return View::make('hello');
});

Route::get("/saygoodbye", function() {
	return "Goodbye World!";
});


Route::get("/new", function() {
	$view  = '<form method="POST" action="/new">';
	$view .= 'Title: <input type="text" name="title">';
	$view .= '<input type="submit">';
	return $view;
});

Route::post("/new", function() {
	$input = Input::all();
	print_r($input);
});


Route::get('/books', function() {
	return "Here are all the books...";
});

Route::get('/books/{category}', function($category) {	// Category is a parameter. User will decide category.
	return "Here are the books in the category: ".$category;
});