<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/navbar.css')}}">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> 
	<link href="{{asset('css/sidebar.css')}}" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Inicio</title>
</head>
<body>
	@include('principal.navbar.index')
	<div class="espacio"></div>

	<div class="row">
		<div class="col-md-3">
			 @include('principal.sidebar.index')
		</div>
		<div class="col-md-9">
			
				@yield('contenido')
			
		</div>
	</div>

	<script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>

	{{-- permite buscar en la seccion de noticas --}}

	<script src="{{asset('js/buscador.js')}}"></script>

</body>
</html>