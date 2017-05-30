@extends('layouts.index')

@section('contenido')
<h1>Edición de valoraciones</h1>
	<form action="{{route('valoracion.update', $valoracion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('valoraciones.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('valoracion.destroy', $valoracion->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('valoracion.index')}}">Atrás</a>
	</div>
@stop