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
				<a href="{{route('estudiante.show', $user->id)}}">
					Ver
				</a>
				<a href="{{route('estudiante.edit', $user->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
@stop