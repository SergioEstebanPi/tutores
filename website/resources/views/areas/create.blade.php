@extends('layouts.index')

@section('contenido')
<h1>Registro de areas</h1>
	<form action="{{route('area.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('areas.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('area.index')}}">Atrás</a>
	</div>
@stop