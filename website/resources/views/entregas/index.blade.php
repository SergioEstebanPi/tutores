@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>id_publicacion</th>
			<th>id_user</th>
			<th>ruta</th>
			<th>calificacion</th>
			<th>descripcion</th>
			<th>Acción</th>
		</thead>
		@foreach($entregas as $entrega)
		<tbody>
			<td>{{$entrega->id_publicacion}}</td>
			<td>{{$entrega->id_user}}</td>
			<td>{{$entrega->ruta}}</td>
			<td>{{$entrega->calificacion}}</td>
			<td>{{$entrega->descripcion}}</td>
			<td>
				<a href="{{route('entrega.show', $entrega->id)}}">
					Ver
				</a>
				<a href="{{route('entrega.edit', $entrega->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('entrega.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop