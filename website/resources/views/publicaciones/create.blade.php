@extends('layouts.index')

@section('contenido')
<h1>Registro de publicaciones</h1>
	<form action="{{route('publicacion.store')}}" method="post">
		@include('publicaciones.forms.formulario')
		<div>
			<button>Registrarme</button>
		</div>
	</form>
	<div>
		<a href="{{route('publicacion.index')}}">Atrás</a>
	</div>
@stop