<input type="hidden" name="_token" value="{{ csrf_token() }}">
@include('alertas.mensaje')
<div>
	<label for="" class="control-label">Título del trabajo</label>
	<input type="text" name="titulo" value="{{$publicacion->titulo or old('titulo')}}" class="form-control">
	@if($errors->first('titulo'))
		<small class="alert-danger">{{$errors->first('titulo')}}</small>
	@endif
</div>
<div>
	<label for="">Nivel Educativo</label>
	<select name="categoria_id" class="form-control">
		@foreach($categorias as $categoria)
			<option value="{{$categoria->id}}">{{$categoria->nombre or old('categoria_id')}}<option>
		@endforeach
	</select>	
	@if($errors->first('categoria_id'))
		<small class="alert-danger">{{$errors->first('titulo')}}</small>
	@endif
</div>
<div>
	<label for="" class="control-label">Tipo de trabajo</label>
	<select name="tipo_id" class="form-control">
		@foreach($tipos as $tipo)
			<option value="{{$tipo->id}}">{{$tipo->nombre}}<option>
		@endforeach
	</select>	
	@if($errors->first('tipo'))
		<small class="alert-danger">{{$errors->first('tipo')}}</small>
	@endif	
</div>
<div>
	<label for="" class="control-label">Área de conocimiento</label>
	<select name="area_id" class="form-control">
		@foreach($areas as $area)
			<option value="{{$area->id}}">{{$area->nombre}}<option>
		@endforeach
	</select>
	@if($errors->first('area'))
		<small class="alert-danger">{{$errors->first('area')}}</small>
	@endif		
</div>
<div>
	<label for="" class="control-label">Fecha de entrega</label>
	<input type="date" name="entrega" value="{{$publicacion->entrega or old('entrega')}}" class="form-control">
	@if($errors->first('entrega'))
		<small class="alert-danger">{{$errors->first('entrega')}}</small>
	@endif	
</div>
{{--<div>
	<label for="" class="control-label">Hora de entrega</label>
	<input type="time" name="entrega" value="{{$publicacion->entrega or old('entrega')}}" class="form-control">
	@if($errors->first('entrega'))
		<small class="alert-danger">{{$errors->first('entrega')}}</small>
	@endif	
</div>--}}
<div>
    <p><label class="control-label">Descripción</label></p>
	<p><textarea name="descripcion" class="form-control">{{$publicacion->descripcion or old('descripcion')}}</textarea></p>
	@if($errors->first('descripcion'))
		<small class="alert-danger">{{$errors->first('descripcion')}}</small>
	@endif	
</div>
<div>
    <label class="control-label">Sube el trabajo <small class="help-block">(Máx 10MB)</small></label>
</div>
<div>
    <label class="control-label">Archivo subido</label>
    <label type="text" name="" class="control-label">{{$publicacion->ruta or old('ruta')}}</label>
</div>
<div>
	<input type="file" name="ruta" value="{{$publicacion->ruta or old('ruta')}}" class="form-control">
	@if($errors->first('ruta'))
		<small class="alert-danger">{{$errors->first('ruta')}}</small>
	@endif	
</div>