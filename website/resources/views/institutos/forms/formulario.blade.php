<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >nombre</label>
	<input type="text" name="nombre" value="{{$cotizacion->nombre or old('nombre')}}">
</div>