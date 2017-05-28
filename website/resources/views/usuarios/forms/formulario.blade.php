<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >Nombre</label>
	<input type="text" name="name" value="{{$user->name or old('name')}}">
</div>
<div>
	<label for="">Correo</label>
	<input type="text" name="email" value="{{$user->email or old('email')}}">
</div>
<div>
	<label for="">Contraseña</label>
	<input type="password" name="password">
</div>
