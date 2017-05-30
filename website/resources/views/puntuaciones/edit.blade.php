@extends('layouts.index')

@section('contenido')
<h1>Edición de puntuaciones</h1>
	<form action="{{route('puntuacion.update', $puntuacion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('puntuacions.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('puntuacion.destroy', $puntuacion->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('puntuacion.index')}}">Atrás</a>
	</div>
@stop