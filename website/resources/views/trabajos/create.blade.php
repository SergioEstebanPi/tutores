@extends('layouts.index')

@section('contenido')
<h1>Registro de trabajos</h1>
	<form action="{{route('trabajo.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
		@include('trabajos.forms.formulario')
		<div>
			<button>Registrarme</button>
		</div>
	</form>
	<div>
		<a href="{{route('trabajo.index')}}">Atrás</a>
	</div>
@stop