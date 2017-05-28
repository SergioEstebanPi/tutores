@extends('layouts.index')

@section('contenido')
<h1>Registro de estudiantes</h1>
	<form action="{{route('estudiante.store')}}" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<label for="" >Nombre</label>
			<input type="text" name="name">
		</div>
		<div>
			<label for="">Correo</label>
			<input type="text" name="email">
		</div>
		<div>
			<label for="">Contraseña</label>
			<input type="password" name="password">
		</div>
		<div>
			<button>Registrarme</button>
		</div>
	</form>
@stop