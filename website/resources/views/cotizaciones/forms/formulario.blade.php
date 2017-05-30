<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_publicacion</label>
	<input type="text" name="id_publicacion" value="{{$cotizacion->id_publicacion or old('id_publicacion')}}">
</div>
<div>
	<label for="" >precio</label>
	<input type="text" name="precio" value="{{$cotizacion->precio or old('precio')}}">
</div>
<div>
	<label for="" >inicio</label>
	<input type="date" name="inicio" value="{{$cotizacion->inicio or old('inicio')}}">
</div>
<div>
	<label for="" >fin</label>
	<input type="date" name="fin" value="{{$cotizacion->fin or old('fin')}}">
</div>
<div>
    <p><label>descripcion</label></p>
	<p><textarea name="descripcion" value="{{$trabajo->descripcion or old('descripcion')}}"></textarea></p>
</div>