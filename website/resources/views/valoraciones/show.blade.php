@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>nombre</label>{{$valoracion->nombre}}</p>
	<p><label>cantidad</label>{{$valoracion->cantidad}}</p>
	<p><label>descripcion</label>{{$valoracion->descripcion}}</p>
</div>
<div>
	<a href="{{route('valoracion.index')}}">Atrás</a>
</div>
@stop