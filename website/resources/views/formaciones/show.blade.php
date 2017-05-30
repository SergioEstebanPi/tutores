@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>id_instituto</label>{{$formacion->id_publicacion}}</p>
	<p><label>nombre</label>{{$formacion->nombre}}</p>
	<p><label>certificado</label>{{$formacion->certificado}}</p>
</div>
<div>
	<a href="{{route('formacion.index')}}">Atrás</a>
</div>
@stop