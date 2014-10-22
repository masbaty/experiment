<?php

class Library {

	// Properties (Variables)

	// Arrays
	private $books;
	

	// Strings
	private $path;



	// Methods (Functions)
	public function setPath($path) {
		$this->path = $path;
	}

	public function getPath() {
		return $this->path;
	}

	public function getBooks() {
		$books = File::get(app_path().'/database/books.json');
		$this->books = json_decode($books,true); // Transforms it into array

		return $this->books;
	}


	/**
	* @param String $query
	* @return Array $results
	*/
	public function search($query) {
		
		# If any books match our query, they'll get stored in this array
		$results = Array();
		
		# Loop through the books looking for matches
		foreach($this->books as $title => $book) {
					
			# First compare the query against the title
			if(stristr($title,$query)) {
			
				# There's a match - add this book the the $results array
				$results[$title] = $book;
			}
			# Then compare the query against all the attributes of the book (author, tags, etc.)
			else {
						
				if(self::search_book_attributes($book,$query)) {
					# There's a match - add this book the the $results array
					$results[$title] = $book;
				}
			}
		}
		
		return $results;
		
	}

	/**
	* Resursively search through a book's attributes looking for a query match
	* @param Array $attributes
	* @param String $query
	* @return Boolean
	*/
	private function search_book_attributes($attributes,$query) { 
	        
	    foreach($attributes as $k => $value) { 
	        
	      	# Dig deeper
	        if (is_array($value)) {
	        	return self::search_book_attributes($value,$query);
	        }
	   		
	   		if(stristr($value,$query)) {
	   			return true;
	   		}             
	    } 
	  
		return false;
	  
	 }

}