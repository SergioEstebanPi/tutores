@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detalle de la cotización</h3>
	</div>
	<div class="panel-body">
		@if($cotizacion->user_id != Auth::user()->id)
			<div>
				<label for="" class="control-label">tutor</label>
				<label name="precio" class="form-control">{{$cotizacion->user->name}}</label>
			</div>
			<div>
				<a href="/ver_perfil/{{$cotizacion->user->id}}" class="btn btn-primary">Ver perfil</a>
			</div>
		@endif
		<div>
			<label for="" class="control-label">titulo trabajo</label>
			<label name="precio" class="form-control">{{$cotizacion->publicacion->titulo}}</label>
		</div>
		<div>
			<label for="" class="control-label">precio</label>
			<label name="precio" class="form-control">{{$cotizacion->precio}}</label>
		</div>
		@if(Auth::check() && $cotizacion->user_id == Auth::user()->id)
			<div>
				<label for="" class="control-label">estado</label>
				<label name="estado" class="form-control">{{$cotizacion->estado}}</label>
			</div>
		@endif
		<div>
			<label for="" class="control-label">descripcion</label>
			<label name="descripcion" class="form-control">{{$cotizacion->descripcion}}</label>
		</div>
		@if($cotizacion->publicacion->user_id == Auth::user()->id)
			<div>
				<a href="/pagar_cotizacion/{{$cotizacion->id}}" class="btn btn-primary">Pagar al tutor</a>
			</div>
		@elseif($cotizacion->user_id == Auth::user()->id && $cotizacion->estado == 1)
			<div>
				<a href="/crear_entrega/{{$cotizacion->id}}" class="btn btn-primary">Entregar trabajo</a>
			</div>
		@endif
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
@stop