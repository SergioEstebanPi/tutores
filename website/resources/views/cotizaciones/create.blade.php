@extends('layouts.index')

@section('contenido')
<h1>Registro de cotizaciones</h1>
	<form action="{{route('cotizacion.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('cotizaciones.forms.formulario')
		<div>
			<button>Cotizar</button>
		</div>
	</form>
	<div>
		<a href="{{route('cotizacion.index')}}">Atrás</a>
	</div>
@stop