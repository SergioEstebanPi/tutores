@extends('layouts.index')

@section('contenido')
<h1>Registro de formaciones</h1>
	<form action="{{route('formacion.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('formaciones.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('formacion.index')}}">Atrás</a>
	</div>
@stop