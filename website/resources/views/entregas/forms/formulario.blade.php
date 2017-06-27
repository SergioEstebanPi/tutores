<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" class="control-label">id_cotizacion</label>
	<input type="text" name="id_publicacion" class="form-control" value="{{$cotizacion->id_publicacion or old('id_publicacion')}}">
</div>
<div>
	<label for="" class="control-label">id_user</label>
	<input type="text" name="id_user" class="form-control" value="{{$cotizacion->id_user or old('id_user')}}">
</div>
<div>
	<label for="" class="control-label">ruta</label>
	<input type="text" name="ruta" class="form-control" value="{{$cotizacion->ruta or old('ruta')}}">
</div>
<div>
	<label for="" class="control-label">calificacion</label>
	<input type="text" name="calificacion" class="form-control" value="{{$cotizacion->calificacion or old('calificacion')}}">
</div>
<div>
    <p><label class="control-label">descripcion</label></p>
	<p><textarea name="descripcion" class="form-control" value="{{$trabajo->descripcion or old('descripcion')}}"></textarea></p>
</div>