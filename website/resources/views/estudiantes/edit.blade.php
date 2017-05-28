@extends('layouts.index')

@section('contenido')
<h1>Edición de estudiantes</h1>
	<form action="{{route('estudiante.update', $user->id)}}" method="post">
		<input type="hidden" name="_method" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<label for="" >Nombre</label>
			<input type="text" name="name" value="{{$user->name}}">
		</div>
		<div>
			<label for="">Correo</label>
			<input type="text" name="email" value="{{$user->email}}">
		</div>
		<div>
			<label for="">Contraseña</label>
			<input type="password" name="password">
		</div>
		<div>
			<button>Editar</button>
		</div>
	</form>
@stop