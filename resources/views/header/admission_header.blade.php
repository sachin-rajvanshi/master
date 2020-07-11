<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}/css/style.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Hello, world!</title>
  </head>
  <body>
	
</head>
<body>
<header>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-6">
				<img src="{{ asset('') }}/images/logo1.png" class="img-fluid">
			</div>
		</div>
	</div>	
</header>
@yield('content')
@extends('footer.admission_footer')