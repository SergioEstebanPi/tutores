@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>nombre</th>
			<th>Acción</th>
		</thead>
		@foreach($areas as $area)
		<tbody>
			<td>{{$area->nombre}}</td>
			<td>
				<a href="{{route('area.show', $area->id)}}">
					Ver
				</a>
				<a href="{{route('area.edit', $area->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('area.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop