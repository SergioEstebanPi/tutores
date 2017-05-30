<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_user</label>
	<input type="text" name="id_user" value="{{$puntuacion->id_user or old('id_user')}}">
</div>
<div>
	<label for="" >id_valoracion</label>
	<input type="text" name="id_valoracion" value="{{$puntuacion->id_valoracion or old('id_valoracion')}}">
</div>