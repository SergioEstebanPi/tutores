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
		    <div class="well well-sm">
		        <strong>Cambiar visualización</strong>
		        <div class="btn-group">
		            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
		            </span>Listado</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
		                class="glyphicon glyphicon-th"></span>Cuadrícula</a>
		        </div>
		    </div>

		    @if(count($publicaciones)>0)
		   		<div id="products" class="row list-group">

					@foreach($publicaciones as $publicacion)
			   			<div class="item  col-xs-4 col-lg-3">
				            <div class="thumbnail">
				                <img class="group list-group-image" src="{{asset('iconos/unknown.png')}}" alt="" width="100px" height="50px" />
				                <div class="caption">
				                    <h4 class="group inner list-group-item-heading">
				                        titulo: {{$publicacion->titulo}}
				                    </h4>
				                    <h5>
				                    	publicado: {{$publicacion->created_at}}
				                    </h5>
				                    <p class="group inner list-group-item-text">
				                       descripcion: {{$publicacion->descripcion}}
				                    </p>
				                    <p>
				                    	nombre archivo: {{$publicacion->ruta}}
				                    </p>
				                    <p>
				                    	Fecha entrega: {{$publicacion->entrega}}
				                    </p>
				                   	@if(Auth::check() && $ruta != 'mis_publicaciones')
										<p>
											publicado por:{{$publicacion->user->name}}
										</p>
									@endif
				                    <div class="row">
				                        <div class="col-xs-12 col-md-6">
				                            <p class="lead">
				                                Cotizaciones {{count($publicacion->cotizacion)}}
				                            </p>
				                        </div>
				                        <div class="col-xs-12 col-md-6">
				                        	@if(Auth::check() && Auth::user()->id == $publicacion->user_id && $publicacion->estado == 0)
												<a href="{{route('publicacion.edit', $publicacion->id)}}" class="btn btn-primary">
													Editar detalle
												</a>
											@endif
				                            <a href="{{route('publicacion.show', $publicacion->id)}}" class="btn btn-success">
												Ver detalle
											</a>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>

			        @endforeach
		    	</div>

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