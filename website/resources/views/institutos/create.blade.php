@extends('layouts.index')

@section('contenido')
<h1>Registro de institutos</h1>
	<form action="{{route('instituto.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('institutos.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('instituto.index')}}">Atrás</a>
	</div>
@stop