@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>fecha inicio: </label>{{$publicacion->fecha_inicio}}</p>
	<p><label>fecha fin: </label>{{$publicacion->fecha_fin}}</p>
	<p><label>formato solicitado: </label>{{$publicacion->formato_solicitado}}</p>
</div>
<div>
	<a href="{{route('publicacion.index')}}">Atrás</a>
</div>
@stop