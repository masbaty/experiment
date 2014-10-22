@extends("_master")

@section("title")
	List all the books
@stop

@section("content")
	<h1>List all books</h1>

	Hello {{ $name }}		<!-- Blade equivalent of php echo -->

	<!--
	<?php/* foreach($books as $title => $book): */?>
		<section>
			<h2><?/*php echo $title;*/?></h2>
		</section>
	<?/*php endforeach; */?>
	-->

	<h2>You searched for: {{{ $query }}}</h2>

	@foreach($books as $title => $book)
		<section>
			<h2>{{ $title }}</h2>
		</section>
	@endforeach
@stop