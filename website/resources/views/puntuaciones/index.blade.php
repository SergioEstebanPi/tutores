@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>id_user</th>
			<th>id_valoracion</th>
			<th>Acción</th>
		</thead>
		@foreach($puntuaciones as $puntuacion)
		<tbody>
			<td>{{$puntuacion->id_user}}</td>
			<td>{{$puntuacion->id_valoracion}}</td>
			<td>
				<a href="{{route('puntuacion.show', $puntuacion->id)}}">
					Ver
				</a>
				<a href="{{route('puntuacion.edit', $puntuacion->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('puntuacion.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop