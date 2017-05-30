@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>nombre</label>{{$tipo->nombre}}</p>
	<p><label>descripcion</label>{{$tipo->descripcion}}</p>
</div>
<div>
	<a href="{{route('tipo.index')}}">Atrás</a>
</div>
@stop