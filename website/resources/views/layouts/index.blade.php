<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	<title>Inicio</title>
</head>
<body>
	@include('principal.navbar.index')
	<div class="container">
		<div class="center">
			<h1 class="cabeza">x</h1>
			<h1 class="cabeza">x</h1>
		</div>
		<div class="cuerpo">
			@yield('contenido')
		</div>
	</div>
</body>
</html>