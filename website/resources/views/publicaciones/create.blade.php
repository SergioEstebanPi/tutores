@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Registro de publicaciones</h3>
	</div>
	<div class="panel-body">
		<form action="{{route('publicacion.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@include('publicaciones.forms.formulario')
			<div>
				<button class="btn btn-primary">Publicar</button>
			</div>
		</form>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>	
@stop