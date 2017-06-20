<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >nombre</label>
	<input type="text" name="nombre" value="{{$valoracion->nombre or old('nombre')}}">
</div>
<div>
	<label for="" >cantidad min</label>
	<input type="text" name="cantidad_min" value="{{$valoracion->cantidad_min or old('cantidad_min')}}">
</div>
<div>
	<label for="" >cantidad max</label>
	<input type="text" name="cantidad_max" value="{{$valoracion->cantidad_max or old('cantidad_max')}}">
</div>
<div>
	<label for="" >descripcion</label>
	<input type="text" name="descripcion" value="{{$valoracion->descripcion or old('descripcion')}}">
</div>