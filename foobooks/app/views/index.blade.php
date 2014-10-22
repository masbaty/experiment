@extends("_master")

@section("title")
	Welcome to Foobooks
@stop

@section("head")
	<link rel="stylesheet" href="index.css" type="text/css">
@stop

@section("content")
	<h1>Welcome to Foobooks</h1>

<!--
	<form method='GET' action='/list'>
		<label for='query'>Search: </label>
		<input type='text' name='query' id='query' />
		<input type='submit' value='Search' />
	</form>
-->

	{{ Form::open(array('url' => '/list', 'method' => 'GET')) }}
		{{ Form::label('query','Search') }}
		{{ Form::text('query'); }}
		{{ Form::submit('Search'); }}
	{{ Form::close() }}

@stop