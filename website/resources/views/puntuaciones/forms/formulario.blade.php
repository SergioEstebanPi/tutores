<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >user_id</label>
	<input type="text" name="user_id" value="{{$puntuacion->user_id or old('user_id')}}">
</div>
<div>
	<label for="" >valoracion_id</label>
	<input type="text" name="valoracion_id" value="{{$puntuacion->valoracion_id or old('valoracion_id')}}">
</div>
<div>
	<label for="" >valor</label>
	<input type="text" name="valor" value="{{$puntuacion->valor or old('valor')}}">
</div>