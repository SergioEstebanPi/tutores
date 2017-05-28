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
			<th>Fecha inicio</th>
			<th>Fecha fin</th>
			<th>Formato solicitado</th>
			<th>Acción</th>
		</thead>
		@foreach($publicaciones as $publicacion)
		<tbody>
			<td>{{$publicacion->fecha_inicio}}</td>
			<td>{{$publicacion->fecha_fin}}</td>
			<td>{{$publicacion->formato_solicitado}}</td>
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