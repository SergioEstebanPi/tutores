<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	<title>Inicio</title>
</head>
<body>
	<div class="center">
		<h1 class="cabeza">Asesores y tutores</h1>
	</div>
	<div class="cuerpo">
		@yield('contenido')
	</div>
</body>
</html>