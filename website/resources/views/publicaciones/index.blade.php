@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Mis Publicaciones</h3>
	</div>
	<div class="panel-body">
		@include('alertas.mensaje')
		<div class="col-sm-3">
		    <div class="input-group">
		      <input type="text" class="form-control">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">Buscar</button>
		      </span>
		    </div>
		</div>
		<div class="">
			@if(count($publicaciones)>0)
				<table class="table table-striped well">
					<thead>
						<th>Título</th>
						<th>Fecha de entrega</th>
						<th>Archivo</th>
						<th>Cotizaciones</th>
						<th>Acción</th>
					</thead>
						@foreach($publicaciones as $publicacion)
						<tbody>
							<td>{{$publicacion->titulo}}</td>
							<td>{{$publicacion->entrega}}</td>
							<td>{{$publicacion->ruta}}</td>
							<td>{{count($publicacion->cotizacion)}}</td>
							<td>
								<a href="{{route('publicacion.show', $publicacion->id)}}" class="btn btn-default">
									Ver
								</a>
								@if(Auth::check() && !isset($noticias))
								<a href="{{route('publicacion.edit', $publicacion->id)}}" class="btn btn-primary">
									Editar
								</a>
								@endif
							</td>
						</tbody>
						@endforeach
				</table>
			@else
				<div>
					<h3>Aún no tienes publicaciones creadas</h3>
				</div>
			@endif
		</div>

		@if(Auth::check())
			<div>
				<a href="{{route('publicacion.create')}}" class="btn btn-primary">Nuevo</a>
			</div>
			<div>
				<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
			</div>
		@endif

		{{$publicaciones->render()}}
	</div>
</div>
@stop