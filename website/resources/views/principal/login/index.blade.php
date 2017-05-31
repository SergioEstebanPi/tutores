<form action="{{route('login.store')}}" method="post" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="modal-body">
	  <div class="form-group">
	    <label class="" for="email">Correo</label>
	    <div class="">
	      <input name="name" type="email" class="form-control" id="email" placeholder="Ingresa tu correo">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="" for="pwd">Contraseña</label>
	    <div class=""> 
	      <input name"password" type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña">
	    </div>
	  </div>
	</div>
	  <div class="modal-footer"> 
	    <div class="">
	    	<a href="/registro" class="">Registrate</a>
	      	<button type="submit" class="btn btn-primary btn-md">Ingresar</button>
	    </div>
	  </div>
</form>      