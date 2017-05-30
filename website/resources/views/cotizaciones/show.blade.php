@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>precio</label>{{$cotizacion->precio}}</p>
	<p><label>estado</label>{{$cotizacion->estado}}</p>
	<p><label>inicio</label>{{$cotizacion->inicio}}</p>
	<p><label>fin</label>{{$cotizacion->fin}}</p>
	<p><label>descripcion</label>{{$cotizacion->descripcion}}</p>
</div>
<div>
	<a href="{{route('cotizacion.index')}}">Atrás</a>
</div>
@stop