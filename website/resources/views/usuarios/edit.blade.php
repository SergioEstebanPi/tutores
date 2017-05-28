@extends('layouts.index')

@section('contenido')
<h1>Edición de usuarios</h1>
	<form action="{{route('usuario.update', $user->id)}}" method="post">
		<input type="hidden" name="_method" value="put">
		@include('usuarios.forms.formulario')
		<div>
			<button>Editar</button>
		</div>
	</form>
	<form action="{{route('usuario.destroy', $user->id)}}" method="post">
		<input type="hidden" name="_method" value="delete">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div>
			<button>Borrar</button>
		</div>
	</form>
	<div>
		<a href="{{route('usuario.index')}}">Atrás</a>
	</div>
@stop