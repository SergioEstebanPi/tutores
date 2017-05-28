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
			<th>id_tipo</th>
			<th>titulo_trabajo</th>
			<th>ruta_trabajo</th>
			<th>descripcion_trabajo</th>
			<th>estado_trabajo</th>
			<th>Acción</th>
		</thead>
		@foreach($trabajos as $trabajo)
		<tbody>
			<td>{{$trabajo->id_tipo}}</td>
			<td>{{$trabajo->titulo_trabajo}}</td>
			<td>{{$trabajo->ruta_trabajo}}</td>
			<td>{{$trabajo->descripcion_trabajo}}</td>
			<td>{{$trabajo->estado_trabajo}}</td>
			<td>
				<a href="{{route('trabajo.show', $trabajo->id)}}">
					Ver
				</a>
				<a href="{{route('trabajo.edit', $trabajo->id)}}">
					Editar
				</a>
			</td>
		</tbody>
		@endforeach
	</table>
	<div>
		<a href="{{route('trabajo.create')}}">Nuevo</a>
	</div>
	<div>
		<a href="/">Atrás</a>
	</div>
@stop