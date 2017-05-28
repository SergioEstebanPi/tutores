@extends('layouts.index')

@section('contenido')
<h1>Registro de estudiantes</h1>
	<form action="{{route('estudiante.store')}}" method="post">
		@include('estudiantes.forms.formulario')
		<div>
			<button>Registrarme</button>
		</div>
	</form>
@stop