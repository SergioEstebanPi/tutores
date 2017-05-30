@extends('layouts.index')

@section('contenido')
<h1>Registro de intereses</h1>
	<form action="{{route('interes.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('intereses.forms.formulario')
		<div>
			<button>Enviar</button>
		</div>
	</form>
	<div>
		<a href="{{route('interes.index')}}">Atrás</a>
	</div>
@stop