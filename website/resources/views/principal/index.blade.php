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
	@include('principal.login.index')
	<p><a href="/registro/estudiante">Registrate como Estudiante</a></p>
	<p><a href="/registro/tutor">Registrate como Tutor</a></p>
	<div class="cuerpo">
		<p><a href="{{route('usuario.index')}}">Editar usuarios</a></p>
		<p><a href="{{route('publicacion.index')}}">Editar publicaciones</a></p>
		<p><a href="{{route('tipo.index')}}">Editar tipos</a></p>
		<p><a href="{{route('trabajo.index')}}">Editar trabajos</a></p>
	</div>
</div>

</body>
</html>