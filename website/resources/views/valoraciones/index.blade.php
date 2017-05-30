@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>nombre</th>
			<th>cantidad</th>
			<th>descripcion</th>
			<th>Acción</th>
		</thead>
		@foreach($valoraciones as $valoracion)
		<tbody>
			<td>{{$valoracion->nombre}}</td>
			<td>{{$valoracion->cantidad}}</td>
			<td>{{$valoracion->descripcion}}</td>
			<td>
				<a href="{{route('valoracion.show', $valoracion->id)}}">
					Ver
				</a>
				<a href="{{route('valoracion.edit', $valoracion->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('valoracion.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop