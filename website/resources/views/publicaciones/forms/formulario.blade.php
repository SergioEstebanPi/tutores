<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >titulo</label>
	<input type="text" name="titulo" value="{{$publicacion->titulo or old('titulo')}}">
</div>
<div>
	<label for="">categoria</label>
	<select name="id_categoria">
		@foreach($categorias as $categoria)
			<option value="{{$categoria->id}}">{{$categoria->nombre}}<option>
		@endforeach
	</select>	
</div>
<div>
	<label for="">tipo</label>
	<select name="id_tipo">
		@foreach($tipos as $tipo)
			<option value="{{$tipo->id}}">{{$tipo->nombre}}<option>
		@endforeach
	</select>	
</div>
<div>
	<label for="">area</label>
	<select name="id_area">
		@foreach($areas as $area)
			<option value="{{$area->id}}">{{$area->nombre}}<option>
		@endforeach
	</select>
</div>
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