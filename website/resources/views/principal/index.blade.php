<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
	<title>Inicio</title>
</head>
<body>

<nav class="navbar navbar">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Soy Tutor</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Inicio</a></li>
      <li><a href="/publicacion">Publicaciones</a></li>
      <li><a href="#">Noticias</a></li>
      <li><a href="#">Acerca de</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>Perfil</a></li>
      <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span>Iniciar</a></li>
    </ul>
  </div>
</nav>

<div class="jumbotron text-center">
	<h1>Bienvenido</h1>
	<p>Asesorías y tutores</p> 
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Trabaja como freelance</h3>
      <p>Lorem ipsum dolor..</p>
      <p>Ut enim ad..</p>
    </div>
    <div class="col-sm-4">
      <h3>Has trabajos desde casa</h3>
      <p>Lorem ipsum dolor..</p>
      <p>Ut enim ad..</p>
    </div>
    <div class="col-sm-4">
      <h3>Comparte el conocimiento</h3> 
      <p>Lorem ipsum dolor..</p>
      <p>Ut enim ad..</p>
    </div>
  </div>
</div>

<div>
	@include('alertas.mensaje')
	@if(!Auth::check())
		@include('principal.login.index')
	@endif
</div>

@if(Auth::check())
	<div>
		<div class="list-group">
			<ul>
				<li><a href="{{route('usuario.index')}}" class="list-group-item">Editar usuarios</a></li>
				<li><a href="{{route('publicacion.index')}}" class="list-group-item">Editar publicaciones</a></li>
				<li><a href="{{route('tipo.index')}}" class="list-group-item">Editar tipos</a></li>
				<li><a href="{{route('cotizacion.index')}}" class="list-group-item">Editar cotizaciones</a></li>
				<li><a href="{{route('entrega.index')}}" class="list-group-item">Editar entregas</a></li>
				<li><a href="{{route('puntuacion.index')}}" class="list-group-item">Editar puntuaciones</a></li>
				<li><a href="{{route('interes.index')}}" class="list-group-item">Editar intereses</a></li>
				<li><a href="{{route('categoria.index')}}" class="list-group-item">Editar categorias</a></li>
				<li><a href="{{route('area.index')}}" class="list-group-item">Editar areas</a></li>
				<li><a href="{{route('formacion.index')}}" class="list-group-item">Editar formaciones</a></li>
				<li><a href="{{route('instituto.index')}}" class="list-group-item">Editar institutos</a></li>
				<li><a href="{{route('valoracion.index')}}" class="list-group-item">Editar valoraciones</a></li>
			</ul>
		</div>
	</div>
@endif

</body>
</html>