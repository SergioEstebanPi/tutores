@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detalle de la cotización</h3>
	</div>
	<div class="panel-body">
		<div>
			<label for="" class="control-label">precio</label>
			<label name="precio" class="form-control">{{$cotizacion->precio}}</label>
		</div>
		<div>
			<label for="" class="control-label">estado</label>
			<label name="estado" class="form-control">{{$cotizacion->estado}}</label>
		</div>
		<div>
			<label for="" class="control-label">inicio</label>
			<label name="inicio" class="form-control">{{$cotizacion->inicio}}</label>
		</div>
		<div>
			<label for="" class="control-label">fin</label>
			<label name="fin" class="form-control">{{$cotizacion->fin}}</label>
		</div>
		<div>
			<label for="" class="control-label">descripcion</label>
			<label name="descripcion" class="form-control">{{$cotizacion->descripcion}}</label>
		</div>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
@stop