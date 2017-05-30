@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>nombre</label>{{$area->nombre}}</p>
</div>
<div>
	<a href="{{route('area.index')}}">Atrás</a>
</div>
@stop