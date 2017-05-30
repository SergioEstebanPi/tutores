@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<div class="container">
		<table class="table table-striped">
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
					<a href="{{route('usuario.show', $user->id)}}" class="">
						Ver
					</a>
					<a href="{{route('usuario.edit', $user->id)}}" class="btn btn-info">
						Editar
					</a>
				</td>
			</tbody>
			@endforeach
		</table>
	</div>	
	<div>
		<a href="{{route('usuario.create')}}" class="btn btn-success">Nuevo</a>
	</div>
	<div>
		<a href="/" class="btn btn-default">Atrás</a>
	</div>
@stop
