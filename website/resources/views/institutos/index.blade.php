@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>nombre</th>
			<th>Acción</th>
		</thead>
		@foreach($institutos as $instituto)
		<tbody>
			<td>{{$instituto->nombre}}</td>
			<td>
				<a href="{{route('instituto.show', $instituto->id)}}">
					Ver
				</a>
				<a href="{{route('instituto.edit', $instituto->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('instituto.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop