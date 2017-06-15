@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Edición de la publicación</h3>
	</div>
	<div class="panel-body">
		<form action="{{route('publicacion.update', $publicacion->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			<input type="hidden" name="_method" value="put">
			@include('publicaciones.forms.formulario')
			<div>
				<button class="btn btn-primary">Editar</button>
			</div>
		</form>
		<form action="{{route('publicacion.destroy', $publicacion->id)}}" method="post">
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