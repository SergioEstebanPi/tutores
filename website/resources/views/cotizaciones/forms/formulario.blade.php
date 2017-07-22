@include('alertas.mensaje')
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<input type="hidden" name="publicacion_id" value="{{$publicacion->id}}" />
</div>
<div>
	<label for="" class="control-label">titulo de la publicación</label>
	<label for="" class="form-control">{{$publicacion->titulo}}</label>
</div>
{{--
<div>
	<label for="" >Conversor de moneda (COP)</label class="control-label">
	<input type="text" name="" value="{{$cotizacion->precio or old('precio')}}" class="form-control">
</div>
--}}
<div>
	<label for="" >precio cotizacion en (USD)</label class="control-label">
	<input type="number" min="10" step="0.01" max="9999999.99" name="precio" value="{{$cotizacion->precio or old('precio')}}" class="form-control">
</div>
<div>
    <p><label>descripcion del trabajo a realizar</label class="control-label"></p>
	<p><textarea name="descripcion" class="form-control">{{$cotizacion->descripcion or old('descripcion')}}</textarea></p>
</div>