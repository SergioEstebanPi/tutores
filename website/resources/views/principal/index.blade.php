<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.cabeza{
			background-color: #00ffcc;
		}
		.cuerpo{
			background-color: #00aabb;	
		}
	</style>
	<title>Inicio</title>
</head>
<body>

<div>
	<div class="cabeza">
		<h1>Bienvenido</h1>
		<h2>Asesorías y tutores</h2>
	</div>
	@include('alertas.mensaje')
	@if(!Auth::check())
		@include('principal.login.index')
		<p><a href="/registro">Registrate</a></p>
	@endif
	<div class="cuerpo">
		<p><a href="{{route('usuario.index')}}">Editar usuarios</a></p>
		<p><a href="{{route('publicacion.index')}}">Editar publicaciones</a></p>
		<p><a href="{{route('tipo.index')}}">Editar tipos</a></p>
		<p><a href="{{route('cotizacion.index')}}">Editar cotizaciones</a></p>
		<p><a href="{{route('entrega.index')}}">Editar entregas</a></p>
		<p><a href="{{route('puntuacion.index')}}">Editar puntuaciones</a></p>
		<p><a href="{{route('interes.index')}}">Editar intereses</a></p>
		<p><a href="{{route('categoria.index')}}">Editar categorias</a></p>
		<p><a href="{{route('area.index')}}">Editar areas</a></p>
		<p><a href="{{route('formacion.index')}}">Editar formaciones</a></p>
		<p><a href="{{route('instituto.index')}}">Editar institutos</a></p>
		<p><a href="{{route('valoracion.index')}}">Editar valoraciones</a></p>
	</div>
</div>

</body>
</html>