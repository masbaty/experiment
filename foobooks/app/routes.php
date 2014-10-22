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
	//return View::make('hello');
	return View::make("index");
});

Route::get('/list/{format?}', function($format = 'html') {
	
	// $query = $_GET['query'];		// Old school way
	$query = Input::get('query');	// With Laravel


	$library = new Library();
	$library->setPath(app_path().'/database/books.json');
	$books = $library->getBooks();
	//echo Pre::render($books);

	if($query) {
		$books = $library->search($query);
	}


	if ($format == 'pdf') {
		return 'PDF Version';
	}
	elseif (strtolower($format) == 'json') {
		return 'JSON Version';
	}
	else {
		return View::make('list')
			->with('name', 'Matthew')
			->with('books', $books)
			->with('query', $query);
	}
});






// Display the form for a new book
Route::get('/add', function() {

});

// Process the form for a new book
Route::post('/add', function() {
	
});

// Display form to edit book
Route::get('/edit/{title}', function($title) {

});

// Process form for edit book
Route::post('/edit/', function() {
	
});


// Load and output books
Route::get('/data', function() {
	
	//echo app_path()."<br>";
	//echo public_path()."<br>";
	//echo base_path()."<br>";
	//echo storage_path()."<br>";

	//$books = File::get(app_path().'/database/books.json');
	//$books = json_decode($books,true); // Transforms it into array

	//$first_book = array_pop($books);

	$library = new Library();

	$library->setPath(app_path().'/database/books.json');
	$books = $library->getBooks();

	//return $books;
	echo Pre::render($books);
});



/*
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
*/