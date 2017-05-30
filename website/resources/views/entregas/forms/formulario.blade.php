<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_publicacion</label>
	<input type="text" name="id_publicacion" value="{{$cotizacion->id_publicacion or old('id_publicacion')}}">
</div>
<div>
	<label for="" >id_user</label>
	<input type="text" name="id_user" value="{{$cotizacion->id_user or old('id_user')}}">
</div>
<div>
	<label for="" >ruta</label>
	<input type="text" name="ruta" value="{{$cotizacion->ruta or old('ruta')}}">
</div>
<div>
	<label for="" >calificacion</label>
	<input type="text" name="calificacion" value="{{$cotizacion->calificacion or old('calificacion')}}">
</div>
<div>
    <p><label>descripcion</label></p>
	<p><textarea name="descripcion" value="{{$trabajo->descripcion or old('descripcion')}}"></textarea></p>
</div>