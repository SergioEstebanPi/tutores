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
						@if(Auth::check() && $ruta != 'mis_publicaciones')
							<th>Publicado por</th>
						@endif
						<th>Título</th>
						@if(Auth::check() && $ruta == 'mis_publicaciones')
							<th>Estado</th>
						@endif
						<th>Fecha de entrega</th>
						<th>Archivo</th>
						<th>Cotizaciones</th>
						<th>Acción</th>
					</thead>
						@foreach($publicaciones as $publicacion)
						<tbody>
							@if(Auth::check() && $ruta != 'mis_publicaciones')
								<td>{{$publicacion->user->name}}</td>
							@endif
							<td>{{$publicacion->titulo}}</td>
							@if(Auth::check() && Auth::user()->id == $publicacion->user_id && $ruta == 'mis_publicaciones')
								<td>{{$publicacion->estado}}</td>
							@endif
							<td>{{$publicacion->entrega}}</td>
							<td>{{$publicacion->ruta}}</td>
							<td>{{count($publicacion->cotizacion)}}</td>
							<td>
								<a href="{{route('publicacion.show', $publicacion->id)}}" class="btn btn-default">
									Ver
								</a>
								@if(Auth::check() && Auth::user()->id == $publicacion->user_id && $publicacion->estado == 0)
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