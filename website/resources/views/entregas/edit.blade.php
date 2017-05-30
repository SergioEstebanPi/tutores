@extends('layouts.index')

@section('contenido')
<h1>Edición de entregas</h1>
	<form action="{{route('entrega.update', $entrega->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('entregas.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('entrega.destroy', $entrega->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('entrega.index')}}">Atrás</a>
	</div>
@stop