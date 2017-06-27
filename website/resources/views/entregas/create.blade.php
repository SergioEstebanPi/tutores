@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Registro de entregas</h3>
	</div>
	<div class="panel-body">
		<form action="{{route('entrega.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
			@include('entregas.forms.formulario')
			<div>
				<input type="submit" value="Entregar" class="btn btn-primary" />
			</div>
		</form>
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>	
@stop