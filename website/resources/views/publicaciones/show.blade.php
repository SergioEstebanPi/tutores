@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detalle de la publicación</h3>
	</div>
	<div class="panel-body">
		<div>
			<label for="" class="control-label">titulo</label>
			<label name="titulo" class="form-control">{{$publicacion->titulo}}</label>
		</div>
		<div>
			<label for="" class="control-label">entrega</label>
			<label name="titulo" class="form-control">{{$publicacion->entrega}}</label>
		</div>
		<div>
			<label for="" class="control-label">titulo</label>
			<label name="titulo" class="form-control">{{$publicacion->ruta}}</label>
		</div>
		<div>
			<label for="" class="control-label">ruta</label>
			@if(!Auth::check())
				<label name="titulo" class="form-control">{{$publicacion->titulo}}</label>
			@else
				<img src="#" name="titulo" class="form-control"></img>
			@endif
		</div>
		<div>
			<a href="/storage/{{$publicacion->ruta}}" class="btn btn-default">Descargar</a>
		</div>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
@stop