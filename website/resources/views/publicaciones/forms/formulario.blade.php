<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >Fecha inicio</label>
	<input type="date" name="fecha_inicio" value="{{$publicacion->fecha_inicio or old('fecha_inicio')}}">
</div>
<div>
	<label for="">Fecha fin</label>
	<input type="date" name="fecha_fin" value="{{$publicacion->fecha_fin or old('fecha_fin')}}">
</div>
<div>
	<label for="">Formato solicitado</label>
	<input type="text" name="formato_solicitado" value="{{$publicacion->formato_solicitado or old('formato_solicitado')}}">
</div>
