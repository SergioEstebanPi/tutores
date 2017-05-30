@extends('layouts.index')

@section('contenido')
<h1>Registro de puntuaciones</h1>
	<form action="{{route('puntuacion.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('puntuaciones.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('puntuacion.index')}}">Atrás</a>
	</div>
@stop