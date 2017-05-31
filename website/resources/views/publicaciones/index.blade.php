@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<div class="container">
		<table class="table table-striped">
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
					<a href="{{route('publicacion.show', $publicacion->id)}}" class="btn btn-default">
						Ver
					</a>
					<a href="{{route('publicacion.edit', $publicacion->id)}}" class="btn btn-primary">
						Editar
					</a>
				</td>
			</tbody>
			@endforeach
		</table>
	</div>

	<div>
		<a href="{{route('publicacion.create')}}" class="btn btn-primary">Nuevo</a>
	</div>
	<div>
		<a href="/" class="btn btn-default">Atrás</a>
	</div>
@stop