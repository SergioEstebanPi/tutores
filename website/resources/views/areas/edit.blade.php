@extends('layouts.index')

@section('contenido')
<h1>Edición de areas</h1>
	<form action="{{route('area.update', $area->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('areas.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('area.destroy', $area->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('area.index')}}">Atrás</a>
	</div>
@stop