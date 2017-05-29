<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >nombre_tipo</label>
	<input type="text" name="nombre_tipo" value="{{$tipo->nombre_tipo or old('nombre_tipo')}}">
</div>
<div>
	<label for="">descripcion_tipo</label>
	<input type="text" name="descripcion_tipo" value="{{$tipo->descripcion_tipo or old('descripcion_tipo')}}">
</div>