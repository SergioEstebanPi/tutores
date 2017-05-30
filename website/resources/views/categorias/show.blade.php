@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>nombre</label>{{$categoria->nombre}}</p>
</div>
<div>
	<a href="{{route('categoria.index')}}">Atrás</a>
</div>
@stop