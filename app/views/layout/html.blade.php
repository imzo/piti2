<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="UTF-8">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/styles.css') }}
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		{{ HTML::script('js/bootstrap.js') }}
		{{ HTML::script('js/jquery.raty.js') }}
		{{ HTML::script('js/script.js') }}
		<!--
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		This tag was replaced by 
		{{ HTML::style('css/styles.css') }}
		to get dynamic access to the public folder where the CSS files are.
		-->



	</head>
        @yield('body')