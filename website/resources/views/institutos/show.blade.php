@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>nombre</label>{{$instituto->nombre}}</p>
</div>
<div>
	<a href="{{route('instituto.index')}}">Atrás</a>
</div>
@stop