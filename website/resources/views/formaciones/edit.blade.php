@extends('layouts.index')

@section('contenido')
<h1>Edición de formaciones</h1>
	<form action="{{route('formacion.update', $formacion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('formaciones.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('formacion.destroy', $formacion->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('formacion.index')}}">Atrás</a>
	</div>
@stop