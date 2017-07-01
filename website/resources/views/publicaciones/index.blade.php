@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		@if(Auth::check() && $ruta == 'mis_publicaciones')
			<h3>Mis Publicaciones</h3>
		@else
			<h3>Noticias</h3>
		@endif
	</div>
	<div class="panel-body">
		@include('alertas.mensaje')
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
				@if(Auth::check() && $ruta == 'mis_publicaciones')
					<div>
						<h3>Aún no tienes publicaciones creadas</h3>
					</div>
				@else
					<div>
						<h3>No existen noticias nuevas puedes crear una nueva en "Mis Publicaciones"</h3>
					</div>
				@endif
			@endif
		</div>

		@if(Auth::check())
			@if(Auth::check() && $ruta == 'mis_publicaciones')
				<div>
					<a href="{{route('publicacion.create')}}" class="btn btn-primary">Nuevo</a>
				</div>
				<div>
					<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
				</div>
			@endif
		@endif

		{{$publicaciones->render()}}
	</div>
</div>
@stop