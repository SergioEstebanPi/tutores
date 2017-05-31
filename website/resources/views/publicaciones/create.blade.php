@extends('layouts.index')

@section('contenido')
<h1>Registro de publicaciones</h1>
	<form action="{{route('publicacion.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('publicaciones.forms.formulario')
		<div>
			<button class="btn btn-primary">Publicar</button>
		</div>
	</form>
	<div>
		<a href="{{route('publicacion.index')}}" class="btn btn-default">Atrás</a>
	</div>
@stop