@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>nombre</th>
			<th>descripcion</th>
			<th>Acción</th>
		</thead>
		@foreach($tipos as $tipo)
		<tbody>
			<td>{{$tipo->nombre}}</td>
			<td>{{$tipo->descripcion}}</td>
			<td>
				<a href="{{route('tipo.show', $tipo->id)}}">
					Ver
				</a>
				<a href="{{route('tipo.edit', $tipo->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('tipo.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop