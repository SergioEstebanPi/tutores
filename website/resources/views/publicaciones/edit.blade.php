@extends('layouts.index')

@section('contenido')
<h1>Edición de publicaciones</h1>
	<form action="{{route('publicacion.update', $publicacion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('publicaciones.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('publicacion.destroy', $publicacion->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('publicacion.index')}}">Atrás</a>
	</div>
@stop