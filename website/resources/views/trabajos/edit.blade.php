@extends('layouts.index')

@section('contenido')
<h1>Edición de trabajos</h1>
	<form action="{{route('trabajo.update', $trabajo->id)}}" method="post">
		<input type="hidden" name="_method" value="put">
		@include('trabajos.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('trabajo.destroy', $trabajo->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('trabajo.index')}}">Atrás</a>
	</div>
@stop