@extends('layouts.index')

@section('contenido')
<h1>Registro de trabajos</h1>
	<form action="{{route('tipo.store')}}" method="post">
		@include('tipos.forms.formulario')
		<div>
			<button>Registrarme</button>
		</div>
	</form>
	<div>
		<a href="{{route('tipo.index')}}">Atrás</a>
	</div>
@stop