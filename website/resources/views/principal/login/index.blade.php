<div>
	<h3>Iniciar sesión</h3>
</div>
<form action="{{route('login.store')}}" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="email">Correo</label>
	    <div class="col-sm-10">
	      <input name="name" type="email" class="form-control" id="email" placeholder="Enter email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="pwd">Contraseña</label>
	    <div class="col-sm-10"> 
	      <input name"password" type="password" class="form-control" id="pwd" placeholder="Enter password">
	    </div>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Ingresar</button>
	      <a href="/registro" class="">Registrate</a>
	    </div>
	  </div>
</form>