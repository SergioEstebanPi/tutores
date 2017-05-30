@extends('layouts.index')

@section('contenido')
<h1>Edición de institutos</h1>
	<form action="{{route('instituto.update', $instituto->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('institutos.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('instituto.destroy', $instituto->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('instituto.index')}}">Atrás</a>
	</div>
@stop