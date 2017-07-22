
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
			<h4>Aún no tienes publicaciones creadas</h4>
		</div>
	@else
		@if(Auth::check())
			<div>
				<h4>No existen noticias nuevas puedes crear una nueva en <a href="/publicacion">Mis Publicaciones</a></h4>
			</div>
		@else
			<div>
				<h4>No existen noticias nuevas puedes crear una nueva en <a href="/registro">Mis Publicaciones</a></h4>
			</div>
		@endif
	@endif
@endif
