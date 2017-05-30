<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >nombre</label>
	<input type="text" name="nombre" value="{{$tipo->nombre or old('nombre')}}">
</div>
<div>
	<label for="">descripcion</label>
	<input type="text" name="descripcion" value="{{$tipo->descripcion or old('descripcion')}}">
</div>