<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >id_instituto</label>
	<input type="text" name="id_instituto" value="{{$area->id_instituto or old('id_instituto')}}">
</div>
<div>
	<label for="" >nombre</label>
	<input type="text" name="nombre" value="{{$area->nombre or old('nombre')}}">
</div>
<div>
	<label for="" >certificado</label>
	<input type="text" name="certificado" value="{{$area->certificado or old('certificado')}}">
</div>