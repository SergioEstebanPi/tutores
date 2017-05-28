@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>Id: </label>{{$user->id}}</p>
	<p><label>Nombre: </label>{{$user->name}}</p>
	<label>Correo: </label>{{$user->email}}</p>
</div>
@stop