@extends('layouts.index')

@section('contenido')
<h1>Edición de categorias</h1>
	<form action="{{route('categoria.update', $categoria->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		@include('categorias.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('categoria.destroy', $categoria->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('categoria.index')}}">Atrás</a>
	</div>
@stop