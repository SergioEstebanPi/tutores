<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >nombre</label>
	<input type="text" name="nombre" value="{{$valoracion->nombre or old('nombre')}}">
</div>
<div>
	<label for="" >cantidad</label>
	<input type="text" name="cantidad" value="{{$valoracion->cantidad or old('cantidad')}}">
</div>
<div>
	<label for="" >descripcion</label>
	<input type="text" name="descripcion" value="{{$valoracion->descripcion or old('descripcion')}}">
</div>