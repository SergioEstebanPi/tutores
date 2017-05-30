@extends('layouts.index')

@section('contenido')
<h1>Edición de intereses</h1>
	<form action="{{route('interes.update', $interes->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('intereses.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('interes.destroy', $interes->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('interes.index')}}">Atrás</a>
	</div>
@stop