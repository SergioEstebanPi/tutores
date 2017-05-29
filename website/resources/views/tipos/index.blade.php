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
			<th>nombre_tipo</th>
			<th>descripcion_tipo</th>
			<th>Acción</th>
		</thead>
		@foreach($tipos as $tipo)
		<tbody>
			<td>{{$tipo->nombre_tipo}}</td>
			<td>{{$tipo->descripcion_tipo}}</td>
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