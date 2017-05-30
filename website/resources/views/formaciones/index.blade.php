@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
	<table>
		<thead>
			<th>id_instituto</th>
			<th>nombre</th>
			<th>certificado</th>
			<th>Acción</th>
		</thead>
		@foreach($formaciones as $formacion)
		<tbody>
			<td>{{$formacion->id_instituto}}</td>
			<td>{{$formacion->nombre}}</td>
			<td>{{$formacion->certificado}}</td>
			<td>
				<a href="{{route('formacion.show', $formacion->id)}}">
					Ver
				</a>
				<a href="{{route('formacion.edit', $formacion->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('formacion.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop