@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Publicaciones</h3>
	</div>
	<div class="panel-body">
		<div class="">
			<table class="table table-striped well">
				<thead>
					<th>Título</th>
					<th>Fecha de entrega</th>
					<th>Archivo</th>
					<th>Acción</th>
				</thead>
				@foreach($publicaciones as $publicacion)
				<tbody>
					<td>{{$publicacion->titulo}}</td>
					<td>{{$publicacion->entrega}}</td>
					<td>{{$publicacion->ruta}}</td>
					<td>
						<a href="{{route('publicacion.show', $publicacion->id)}}" class="btn btn-default">
							Ver
						</a>
						@if(Auth::check())
						<a href="{{route('publicacion.edit', $publicacion->id)}}" class="btn btn-primary">
							Editar
						</a>
						@endif
					</td>
				</tbody>
				@endforeach
			</table>
		</div>

		@if(Auth::check())
			<div>
				<a href="{{route('publicacion.create')}}" class="btn btn-primary">Nuevo</a>
			</div>
			<div>
				<a href="/" class="btn btn-default">Atrás</a>
			</div>
		@endif
	</div>
</div>
@stop