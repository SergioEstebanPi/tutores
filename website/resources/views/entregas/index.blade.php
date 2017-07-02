@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Historial de Transacciones</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped well">
			<thead>
				<th>user_id</th>
				<th>publicacion_id</th>
				<th>cotizacion_id</th>
				<th>calificacion</th>
				<th>recibido</th>
				<th>pagado</th>
				<th>Acción</th>
			</thead>
			@foreach($transacciones as $transaccion)
			<tbody>
				<td>{{$transaccion->user_id}}</td>
				<td>{{$transaccion->publicacion_id}}</td>
				<td>{{$transaccion->id}}</td>
				<td>{{$transaccion->calificacion}}</td>
				@if($transaccion->user_id == Auth::user()->id)
					<td>{{$transaccion->precio}}</td>
				@endif
				<td>{{$transaccion->precio}}</td>
				<td>
					<a href="{{route('transaccion.show', $transaccion->id)}}" class="btn btn-primary">
						Ver
					</a>
			</tbody>
			@endforeach
		</table>
	</div>
</div>	
@stop