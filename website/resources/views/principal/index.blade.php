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

<div class="jumbotron text-center">
  <h1>Tutores</h1>
  <p>Red de tele-trabajo que te paga por tus conocimientos</p> 
</div>
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Trabaja como freelance</h3>
      <p>Gana dinero por lo que conoces</p>
      <p>Puedes disponer de tu tiempo</p>
    </div>
    <div class="col-sm-4">
      <h3>Has trabajos desde casa</h3>
      <p>Sin horarios</p>
      <p>Trabaja on-line</p>
    </div>
    <div class="col-sm-4">
      <h3>Comparte el conocimiento</h3> 
      <p>Red de trabajos académicos</p>
      <p>Desarrollo de proyectos</p>
    </div>
  </div>
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