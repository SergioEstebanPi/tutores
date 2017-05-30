@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>id_publicacion</label>{{$entrega->id_publicacion}}</p>
	<p><label>id_user</label>{{$entrega->id_user}}</p>
	<p><label>ruta</label>{{$entrega->ruta}}</p>
	<p><label>calificacion</label>{{$entrega->calificacion}}</p>
	<p><label>descripcion</label>{{$entrega->descripcion}}</p>
</div>
<div>
	<a href="{{route('entrega.index')}}">Atrás</a>
</div>
@stop