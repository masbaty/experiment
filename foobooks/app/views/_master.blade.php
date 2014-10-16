<!DOCTYPE html>
<html>
<head>
	<title>@yield("title","Foobooks")</title>	<!-- If title is not found, defaults to Foobooks -->
	<meta charset="utf-8">
	<link rel="stylesheet" href="foobooks.css" type="text/css">

	@yield("head")


</head>
<body>

	<img src="/images/laravel-foobooks-logo@2x.png" alt="Foobooks Logo">

	@yield("content")

</body>
</html>