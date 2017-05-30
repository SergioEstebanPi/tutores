@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>id_user</label>{{$puntuacion->id_user}}</p>
	<p><label>id_valoracion</label>{{$puntuacion->id_valoracion}}</p>
</div>
<div>
	<a href="{{route('puntuacion.index')}}">Atrás</a>
</div>
@stop