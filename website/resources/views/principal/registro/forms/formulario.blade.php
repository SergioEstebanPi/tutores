<h3>Registrate</h3>
<form action="{{route('usuario.store')}}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div>
		<label for="">Nombre</label>
		<input type="text" name="name">
	</div>
	<div>
		<label for="">Correo</label>
		<input type="text" name="email">
	</div>
	<div>
		<label for="">Contraseña</label>
		<input type="password" name="password">
	</div>
	<div>
		<label for="">Confirma Contraseña</label>
		<input type="password" name="password2">
	</div>
	<div>
		<button>Registrarme</button>
	</div>
</form>
<a href="/">Atrás</a>