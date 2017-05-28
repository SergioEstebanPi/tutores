@extends('layouts.index')

@if(Session::has('mensaje'))
	<div>
		<button>X</button>
		{{Session::get('mensaje')}}
	</div>
@endif

@section('contenido')
	<table>
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Acción</th>
		</thead>
		@foreach($users as $user)
		<tbody>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
				<a href="{{route('usuario.show', $user->id)}}">
					Ver
				</a>
				<a href="{{route('usuario.edit', $user->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('usuario.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop