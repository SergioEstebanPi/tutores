@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>titulo</th>
			<th>estado</th>
			<th>entrega</th>
			<th>ruta</th>
			<th>Acción</th>
		</thead>
		@foreach($publicaciones as $publicacion)
		<tbody>
			<td>{{$publicacion->titulo}}</td>
			<td>{{$publicacion->estado}}</td>
			<td>{{$publicacion->entrega}}</td>
			<td>{{$publicacion->ruta}}</td>
			<td>
				<a href="{{route('publicacion.show', $publicacion->id)}}">
					Ver
				</a>
				<a href="{{route('publicacion.edit', $publicacion->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('publicacion.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop