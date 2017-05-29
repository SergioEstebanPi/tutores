<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_tipo</label>
	<input type="text" name="id_tipo" value="{{$trabajo->id_tipo or old('id_tipo')}}">
</div>
<div>
	<label for="">titulo_trabajo</label>
	<input type="text" name="titulo_trabajo" value="{{$trabajo->titulo_trabajo or old('titulo_trabajo')}}">
</div>
<div>
	<label for="">descripcion_trabajo</label>
	<input type="text" name="descripcion_trabajo" value="{{$trabajo->descripcion_trabajo or old('descripcion_trabajo')}}">
</div>
<div>
	<label for="">estado_trabajo</label>
	<input type="text" name="estado_trabajo" value="{{$trabajo->estado_trabajo or old('estado_trabajo')}}">
</div>
<div>
    <label>Sube el trabajo</label>
	<input type="file" name="ruta_trabajo">	
	<input type="text" value="{{$trabajo->ruta_trabajo or old('ruta_trabajo')}}">
</div>