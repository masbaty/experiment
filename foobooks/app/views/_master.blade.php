<!DOCTYPE html>
<html>
<head>
	<title>@yield("title","Foobooks")</title>	<!-- If title is not found, defaults to Foobooks -->
	<meta charset="utf-8">
	<link rel="stylesheet" 
		href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" 
		type="text/css" />
	<link rel="stylesheet" href="/css/foobooks.css" type="text/css" />

	@yield("head")


</head>
<body>

	<img src="/images/laravel-foobooks-logo@2x.png" alt="Foobooks Logo" id="logo" />

	@yield("content")

</body>
</html>