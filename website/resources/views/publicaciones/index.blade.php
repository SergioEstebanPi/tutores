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

		<div id="display" class="">
			@include('principal.publicaciones.tabla')
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