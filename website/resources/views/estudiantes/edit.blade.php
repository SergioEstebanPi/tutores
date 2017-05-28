@extends('layouts.index')

@section('contenido')
<h1>Edición de estudiantes</h1>
	<form action="{{route('estudiante.update', $user->id)}}" method="post">
		<input type="hidden" name="_method" value="put">
		@include('estudiantes.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('estudiante.destroy', $user->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
@stop