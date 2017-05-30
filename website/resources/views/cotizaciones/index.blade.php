@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>precio</th>
			<th>estado</th>
			<th>inicio</th>
			<th>fin</th>
			<th>descripcion</th>
			<th>Acción</th>
		</thead>
		@foreach($cotizaciones as $cotizacion)
		<tbody>
			<td>{{$cotizacion->precio}}</td>
			<td>{{$cotizacion->estado}}</td>
			<td>{{$cotizacion->inicio}}</td>
			<td>{{$cotizacion->fin}}</td>
			<td>{{$cotizacion->descripcion}}</td>
			<td>
				<a href="{{route('cotizacion.show', $cotizacion->id)}}">
					Ver
				</a>
				<a href="{{route('cotizacion.edit', $cotizacion->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('cotizacion.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop