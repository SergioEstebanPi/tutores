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
					<th>precio</th>
					<th>estado</th>
					<th>inicio</th>
					<th>fin</th>
					<th>descripcion</th>
					<th>Acción</th>
				</thead>
					@foreach($cotizaciones as $cotizacion)
					<tbody>
						<td>{{$cotizacion->precio}}</td>
						<td>{{$cotizacion->estado}}</td>
						<td>{{$cotizacion->inicio}}</td>
						<td>{{$cotizacion->fin}}</td>
						<td>{{$cotizacion->descripcion}}</td>
						<td>
							<a href="{{route('cotizacion.show', $cotizacion->id)}}" class="btn btn-default">
								Ver
							</a>
							<a href="{{route('cotizacion.edit', $cotizacion->id)}}" class="btn btn-primary">
								Editar
							</a>
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