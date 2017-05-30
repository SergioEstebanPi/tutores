<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >titulo</label>
	<input type="text" name="titulo" value="{{$publicacion->titulo or old('titulo')}}">
</div>
<select name="id_categoria">
	<option><option>
</select>
<select name="id_tipo">
	<option><option>
</select>
<select name="id_area">
	<option><option>
</select>
<div>
	<label for="" >entrega</label>
	<input type="date" name="entrega" value="{{$publicacion->entrega or old('entrega')}}">
</div>
<div>
    <p><label>descripcion</label></p>
	<p><textarea name="descripcion" value="{{$trabajo->descripcion or old('descripcion')}}"></textarea></p>
</div>
<div>
    <label>Sube el trabajo</label>
	<input type="file" name="ruta" value="{{$trabajo->ruta or old('ruta')}}">
</div>