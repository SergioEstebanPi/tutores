@extends('layouts.index')

@include('alertas.mensaje')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Mis Cotizaciones {{url()->previous()}}</h3>
	</div>
	<div class="panel-body">
		@include('alertas.mensaje')
		@if(count($cotizaciones)>0)
			<table class="table table-striped well">
				<thead>
					@if($ruta != 'mis_cotizaciones')
						<th>tutor</th>
					@endif
					<th>precio</th>
					<th>estado</th>
					<th>descripcion</th>
					<th>Acción</th>
				</thead>
					@foreach($cotizaciones as $cotizacion)
					<tbody>
						@if($ruta != 'mis_cotizaciones')
							<td>{{$cotizacion->user->name}}</td>
						@endif
						<td>{{$cotizacion->precio}}</td>
						<td>{{$cotizacion->estado}}</td>
						<td>{{$cotizacion->descripcion}}</td>
						<td>
							<a href="{{route('cotizacion.show', $cotizacion->id)}}" class="btn btn-default">
								Ver
							</a>
							@if($cotizacion->user_id == Auth::user()->id && $cotizacion->estado == 0)
							<a href="{{route('cotizacion.edit', $cotizacion->id)}}" class="btn btn-primary">
								Editar
							</a>
							@endif
						</td>
					</tbody>
					@endforeach
			</table>
		@else
			<h3>Aún no tienes cotizaciones</h3>
			<h4>Para crear una cotización debes seleccionar una publicación en la sección de noticias <a href="/noticias">Ir a Noticias</a></h4>
		@endif
		@if(Auth::check())
			<div>
				<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
			</div>
		@endif

		{{$cotizaciones->render()}}
	</div>
</div>
@stop