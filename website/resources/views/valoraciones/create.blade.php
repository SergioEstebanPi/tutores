@extends('layouts.index')

@section('contenido')
<h1>Registro de valoraciones</h1>
	<form action="{{route('valoracion.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('valoraciones.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('valoracion.index')}}">Atrás</a>
	</div>
@stop