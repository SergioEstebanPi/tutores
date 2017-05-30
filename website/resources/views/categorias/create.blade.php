@extends('layouts.index')

@section('contenido')
<h1>Registro de categorias</h1>
	<form action="{{route('categoria.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('categorias.forms.formulario')
		<div>
			<button>Aceptar</button>
		</div>
	</form>
	<div>
		<a href="{{route('categoria.index')}}">Atrás</a>
	</div>
@stop