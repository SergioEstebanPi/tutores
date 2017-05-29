@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>nombre_tipo</label>{{$tipo->nombre_tipo}}</p>
	<p><label>descripcion_tipo</label>{{$tipo->descripcion_tipo}}</p>
</div>
<div>
	<a href="{{route('tipo.index')}}">Atrás</a>
</div>
@stop