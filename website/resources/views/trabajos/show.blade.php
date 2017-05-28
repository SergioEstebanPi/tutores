@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>fecha inicio: </label>{{$trabajo->id_tipo}}</p>
	<p><label>fecha fin: </label>{{$trabajo->titulo_trabajo}}</p>
	<p><label>formato solicitado: </label>{{$trabajo->ruta_trabajo}}</p>
	<p><label>formato solicitado: </label>{{$trabajo->descripcion_trabajo}}</p>
	<p><label>formato solicitado: </label>{{$trabajo->estado_trabajo}}</p>
</div>
<div>
	<a href="{{route('trabajo.index')}}">Atrás</a>
</div>
@stop