<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_tipo</label>
	<input type="text" name="id_tipo" value="{{$user->id_tipo or old('id_tipo')}}">
</div>
<div>
	<label for="">titulo_trabajo</label>
	<input type="text" name="titulo_trabajo" value="{{$user->titulo_trabajo or old('titulo_trabajo')}}">
</div>
<div>
	<label for="">ruta_trabajo</label>
	<input type="text" name="ruta_trabajo" value="{{$user->ruta_trabajo or old('ruta_trabajo')}}">
</div>
<div>
	<label for="">descripcion_trabajo</label>
	<input type="text" name="descripcion_trabajo" value="{{$user->descripcion_trabajo or old('descripcion_trabajo')}}">
</div>
<div>
	<label for="">estado_trabajo</label>
	<input type="text" name="estado_trabajo" value="{{$user->estado_trabajo or old('estado_trabajo')}}">
</div>
