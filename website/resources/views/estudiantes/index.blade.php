@extends('layouts.index')

<?php $mensaje = Session::get('mensaje')?>

@if($mensaje == 'store')
	<div>
		<button></button>
		Usuario creado correctamente
	</div>
@endif

@section('contenido')
	<table>
		<thead>
			<th>Nombre</th>
			<th>Correo</th>
			<th>Acción</th>
		</thead>
		@foreach($users as $user)
		<tbody>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td></td>
		</tbody>
		@endforeach
	</table>
@stop