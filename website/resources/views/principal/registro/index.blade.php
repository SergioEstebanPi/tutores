@extends('layouts.index')

@section('contenido')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Registrate</h3>
		</div>
		<div class="panel-body">
			<form action="{{route('usuario.store')}}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="control-label">
					<label for="">Nombre</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="control-label">
					<label for="">Correo</label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="control-label">
					<label for="">Contraseña</label>
					<input type="password" name="password" class="form-control">
				</div>
				<div class="control-label">
					<label for="">Confirma Contraseña</label>
					<input type="password" name="password2" class="form-control">
				</div>
				@include('principal.registro.forms.perfil')
				<div>
					<button>Registrarme</button>
				</div>
			</form>
			<a href="/">Atrás</a>
		</div>
	</div>
@stop