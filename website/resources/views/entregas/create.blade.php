@extends('layouts.index')

@section('contenido')
<h1>Registro de entregas</h1>
	<form action="{{route('entrega.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('entregas.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('entrega.index')}}">Atrás</a>
	</div>
@stop