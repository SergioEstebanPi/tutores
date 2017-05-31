@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>titulo</label>{{$publicacion->titulo}}</p>
	<p><label>estado</label>{{$publicacion->estado}}</p>
	<p><label>entrega</label>{{$publicacion->entrega}}</p>
	<p><label>ruta</label>{{$publicacion->ruta}}</p>
</div>
<div>
	<a href="{{route('publicacion.index')}}" class="btn btn-default">Atrás</a>
</div>
@stop