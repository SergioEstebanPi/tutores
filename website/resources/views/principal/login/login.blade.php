<form action="{{route('login.store')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div>
		<label for="">Correo</label>
		<input type="text" name="email">
	</div>
	<div>
		<label for="">Contraseña</label>
		<input type="password" name="password">
	</div>
	<div>
		<button>Ingresar</button>
	</div>
</form>