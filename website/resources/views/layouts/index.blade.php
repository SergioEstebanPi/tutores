<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
	<title>Inicio</title>
</head>
<body>
	@include('principal.navbar.index')
	<div class="espacio"></div>
	<div class="container">
		@yield('contenido')
	</div>

	<script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
</body>
</html>