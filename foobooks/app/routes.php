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
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});



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