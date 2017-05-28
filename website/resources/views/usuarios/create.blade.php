@extends('layouts.index')

@section('contenido')
<h1>Registro de usuarios</h1>
	<form action="{{route('usuario.store')}}" method="post">
		@include('usuarios.forms.formulario')
		<div>
			<button>Registrarme</button>
		</div>
	</form>
	<div>
		<a href="{{route('usuario.index')}}">Atrás</a>
	</div>
@stop