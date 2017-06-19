@include('alertas.mensaje')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<input type="hidden" name="publicacion_id" value="{{$publicacion->id}}" />
</div>
<div>
	<label for="" class="control-label">titulo de la publicación</label>
	<label for="" class="form-control">{{$publicacion->titulo}}</label>
</div>
<div>
	<label for="" >precio cotizacion</label class="control-label">
	<input type="text" name="precio" value="{{$cotizacion->precio or old('precio')}}" class="form-control">
</div>
<div>
	<label for="" >inicio</label class="control-label">
	<input type="datetime" name="inicio" value="{{$cotizacion->inicio or old('inicio')}}" class="form-control">
</div>
<div>
	<label for="" >fin</label class="control-label">
	<input type="datetime" name="fin" value="{{$cotizacion->fin or old('fin')}}" class="form-control">
</div>
<div>
    <p><label>descripcion del trabajo a realizar</label class="control-label"></p>
	<p><textarea name="descripcion" class="form-control">{{$cotizacion->descripcion or old('descripcion')}}</textarea></p>
</div>