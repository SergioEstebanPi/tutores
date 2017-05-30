@extends('layouts.index')

@section('contenido')
<h2>Detalle</h2>
<div>
	<p><label>id_area</label>{{$interes->id_area}}</p>
	<p><label>id_user</label>{{$interes->id_user}}</p>
	<p><label>notificar</label>{{$interes->notificar}}</p>
</div>
<div>
	<a href="{{route('interes.index')}}">Atrás</a>
</div>
@stop