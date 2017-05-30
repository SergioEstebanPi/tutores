@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>id_area</th>
			<th>id_user</th>
			<th>notificar</th>
			<th>Acción</th>
		</thead>
		@foreach($intereses as $interes)
		<tbody>
			<td>{{$interes->id_area}}</td>
			<td>{{$interes->id_user}}</td>
			<td>{{$interes->notificar}}</td>
			<td>
				<a href="{{route('interes.show', $interes->id)}}">
					Ver
				</a>
				<a href="{{route('interes.edit', $interes->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('interes.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop