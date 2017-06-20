@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Mi perfil</h3>
	</div>
	<div class="panel-body">
		<div>
			<label for="" class="control-label">Nombre</label>
			<label name="name" class="form-control">{{$user->name}}</label>
		</div>
		<div>
			<label for="" class="control-label">Correo</label>
			<label name="email" class="form-control">{{$user->email}}</label>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Formación</div>
			<div class="panel-body">
				<div>
					<label for="" class="control-label">nombre</label>
					<label name="email" class="form-control">{{$user->formacion}}</label>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Puntuación</div>
			<div class="panel-body">
				@foreach($user->puntuacion as $puntuacion)
					<div>
						<label for="" class="control-label">nombre</label>
						<label name="nombre" class="form-control">{{$puntuacion->valoracion->nombre}}</label>
					</div>
					<div>
						<label for="" class="control-label">valor</label>
						<label name="valor" class="form-control">{{$puntuacion->valor}}</label>
					</div>
				@endforeach
			</div>
		</div>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
@stop