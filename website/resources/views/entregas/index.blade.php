@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Historial de Transacciones</h3>
	</div>
	<div class="panel-body">

		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Pagos de Mis publicaciones</h4>
				@if(count($pagos) > 0)
					<table class="table table-striped well">
						<thead>
							<th>user_id</th>
							<th>publicacion_id</th>
							<th>cotizacion_id</th>
							<th>calificacion</th>
							<th>pagado</th>
							<th>Acción</th>
						</thead>
						@foreach($pagos as $pago)
						<tbody>
							<td>{{$pago->user_id}}</td>
							<td>{{$pago->publicacion_id}}</td>
							<td>{{$pago->id}}</td>
							<td>{{$pago->calificacion}}</td>
							<td>{{$pago->precio}}</td>
							<td>
							{{--
								<a href="{{route('transacciones.show', $transacciones->id)}}" class="btn btn-primary">
									Ver
								</a>
							--}}
						</tbody>
						@endforeach
					</table>
				@else
					<h4>Aún no has realizado pagos puedes 
						<a href="/publicacion">publicar un trabajo</a> nuevo
					</h4>
				@endif
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Recibido de Mis cotizaciones</h4>
				@if(count($recibidos) > 0)
					<table class="table table-striped well">
						<thead>
							<th>user_id</th>
							<th>publicacion_id</th>
							<th>cotizacion_id</th>
							<th>calificacion</th>
							<th>recibido</th>
							<th>Acción</th>
						</thead>
						@foreach($recibidos as $recido)
						<tbody>
							<td>{{$recido->user_id}}</td>
							<td>{{$recido->publicacion_id}}</td>
							<td>{{$recido->id}}</td>
							<td>{{$recido->calificacion}}</td>
							<td>{{$recido->precio}}</td>
							<td>
							{{--
								<a href="{{route('transacciones.show', $transacciones->id)}}" class="btn btn-primary">
									Ver
								</a>
							--}}
						</tbody>
						@endforeach
					</table>
					<div>
						{{-- route('payout') --}}
			        	<a href="#" class="btn btn-primary">Retirar dinero<i class="fa fa-cc-paypal fa-2x"></i></a>
			      	</div>
				@else
					<h4>Aún no has recibido pagos por cotizaciones puedes 
						<a href="/noticias">cotizar un trabajo</a> existente
					</h4>
				@endif
			</div>
		</div>

	</div>
</div>	
@stop