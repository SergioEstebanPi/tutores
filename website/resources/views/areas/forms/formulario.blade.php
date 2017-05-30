<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >nombre</label>
	<input type="text" name="nombre" value="{{$area->nombre or old('nombre')}}">
</div>
<div>
	<label for="" >tipo</label>
	<input type="text" name="tipo" value="{{$area->tipo or old('tipo')}}">
</div>
<div>
	<label for="" >area</label>
	<select name="id_area">
		@foreach($areas_padre as $area_padre)
			<option value="{{$area_padre->id}}">{{$area_padre->nombre}}</option>
		@endforeach
	</select>
</div>