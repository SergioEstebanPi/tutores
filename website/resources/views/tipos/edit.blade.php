@extends('layouts.index')

@section('contenido')
<h1>Edición de tipos</h1>
	<form action="{{route('tipo.update', $tipo->id)}}" method="post">
		<input type="hidden" name="_method" value="put">
		@include('tipos.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('tipo.destroy', $tipo->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('tipo.index')}}">Atrás</a>
	</div>
@stop