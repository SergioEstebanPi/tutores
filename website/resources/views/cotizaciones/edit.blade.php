@extends('layouts.index')

@section('contenido')
<h1>Edición de cotizaciones</h1>
	<form action="{{route('cotizacion.update', $cotizacion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('cotizaciones.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('cotizacion.destroy', $cotizacion->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('cotizacion.index')}}">Atrás</a>
	</div>
@stop