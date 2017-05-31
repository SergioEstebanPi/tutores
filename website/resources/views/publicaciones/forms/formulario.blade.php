<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" class="control-label">titulo</label>
	<input type="text" name="titulo" value="{{$publicacion->titulo or old('titulo')}}" class="form-control">
</div>
<div>
	<label for="">categoria</label>
	<select name="id_categoria" class="form-control">
		@foreach($categorias as $categoria)
			<option value="{{$categoria->id}}">{{$categoria->nombre}}<option>
		@endforeach
	</select>	
</div>
<div>
	<label for="" class="control-label">tipo</label>
	<select name="id_tipo" class="form-control">
		@foreach($tipos as $tipo)
			<option value="{{$tipo->id}}">{{$tipo->nombre}}<option>
		@endforeach
	</select>	
</div>
<div>
	<label for="" class="control-label">area</label>
	<select name="id_area" class="form-control">
		@foreach($areas as $area)
			<option value="{{$area->id}}">{{$area->nombre}}<option>
		@endforeach
	</select>
</div>
<div>
	<label for="" class="control-label">entrega</label>
	<input type="date" name="entrega" value="{{$publicacion->entrega or old('entrega')}}" class="form-control">
</div>
<div>
    <p><label class="control-label">descripcion</label></p>
	<p><textarea name="descripcion" value="{{$trabajo->descripcion or old('descripcion')}}" class="form-control"></textarea></p>
</div>
<div>
    <label class="control-label">Sube el trabajo</label>
	<input type="file" name="ruta" value="{{$trabajo->ruta or old('ruta')}}" class="form-control">
</div>