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
				Formacion del usuario
			</div>
			<div class="panel-heading">Puntuación</div>
			<div class="panel-body">
				Trabajos realizados
			</div>
		</div>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
@stop