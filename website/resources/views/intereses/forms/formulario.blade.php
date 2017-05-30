<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_area</label>
	<input type="text" name="id_area" value="{{$interes->id_area or old('id_area')}}">
</div>
<div>
	<label for="" >id_user</label>
	<input type="text" name="id_user" value="{{$interes->id_user or old('id_user')}}">
</div>
<div>
	<label for="" >notificar</label>
	<input type="checkbox" name="notificar" value="{{$interes->notificar or old('notificar')}}">
</div>