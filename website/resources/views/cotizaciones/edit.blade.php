@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edición de la cotización</h3>
	</div>
	<div class="panel-body">
		<form action="{{route('cotizacion.update', $cotizacion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="put">
			@include('cotizaciones.forms.formulario')
			<div>
				<button class="btn btn-primary">Editar</button>
			</div>
		</form>
		<form action="{{route('cotizacion.destroy', $cotizacion->id)}}" method="post">
			<input type="hidden" name="_method" value="delete">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div>
				<button class="btn btn-danger">Borrar</button>
			</div>
		</form>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
@stop