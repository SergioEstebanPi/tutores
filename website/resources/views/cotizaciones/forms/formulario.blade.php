<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" class="control-label">id_publicacion</label>
	<input type="text" name="id_publicacion" value="{{$cotizacion->id_publicacion or old('id_publicacion')}}" class="form-control">
	@if($errors->first('id_publicacion'))
		<small class="alert-danger">{{$errors->first('id_publicacion')}}</small>
	@endif
</div>
<div>
	<label for="" >precio</label class="control-label">
	<input type="text" name="precio" value="{{$cotizacion->precio or old('precio')}}" class="form-control">
</div>
<div>
	<label for="" >inicio</label class="control-label">
	<input type="date" name="inicio" value="{{$cotizacion->inicio or old('inicio')}}" class="form-control">
</div>
<div>
	<label for="" >fin</label class="control-label">
	<input type="date" name="fin" value="{{$cotizacion->fin or old('fin')}}">
</div>
<div>
    <p><label>descripcion</label class="control-label"></p>
	<p><textarea name="descripcion" value="{{$trabajo->descripcion or old('descripcion')}}" class="form-control"></textarea></p>
</div>