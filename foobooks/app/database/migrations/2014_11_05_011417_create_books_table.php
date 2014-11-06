<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('books', function($table) {
			$table->increments('id'); // Set up primary key and set up auto increment
			$table->timestamps(); // Creates fields: created_at, updated_at

			$table->string('author'); // String is Laravel's varchar
			$table->string('title');
			$table->integer('published');
			$table->string('cover');
			$table->string('purchase_link');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('books');
	}

}
