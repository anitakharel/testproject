<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>IGC Test</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <!-- Styles -->
        
		<!-- Ckeditor -->
		<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    </head>
    <body>