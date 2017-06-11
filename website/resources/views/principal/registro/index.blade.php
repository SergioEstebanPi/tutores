@extends('layouts.index')

@section('contenido')
    @include('alertas.mensaje')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Registrate</h3>
		</div>
		<div class="panel-body">
			<form action="{{route('registro.store')}}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="control-label">
					<label for="">Nombre</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}">
					@if($errors->first('name'))
						<small class="alert-danger">{{$errors->first('name')}}</small>
					@endif
				</div>
				<div class="control-label">
					<label for="">Correo</label>
					<input type="text" name="email" class="form-control" value="{{ old('email') }}">
					@if($errors->first('email'))
						<small class="alert-danger">{{$errors->first('email')}}</small>
					@endif
				</div>
				<div class="control-label">
					<label for="">Contraseña</label>
					<input type="password" name="password" class="form-control">
					@if($errors->first('password'))
						<small class="alert-danger">{{$errors->first('password')}}</small>
					@endif
				</div>
				<div class="control-label">
					<label for="">Confirma Contraseña</label>
					<input type="password" name="password_confirmation" class="form-control">
					@if($errors->first('password_confirmation'))
						<small class="alert-danger">{{$errors->first('password_confirmation')}}</small>
					@endif
				</div>
				<div class="control-label">
					<button type="submit" class="btn btn-primary"  class="form-control">Registrarme</button>
					<a href="/" class="btn btn-default"  class="form-control">Atrás</a>
				</div>
			</form>
		</div>
	</div>
@stop