@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>nombre</th>
			<th>Acción</th>
		</thead>
		@foreach($categorias as $categoria)
		<tbody>
			<td>{{$categoria->nombre}}</td>
			<td>
				<a href="{{route('categoria.show', $categoria->id)}}">
					Ver
				</a>
				<a href="{{route('categoria.edit', $categoria->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('categoria.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop