<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div>
	<label for="" >Fecha inicio</label>
	<input type="date" name="fecha_inicio" value="{{$publicacion->fecha_inicio or old('fecha_inicio')}}">
</div>
<div>
	<label for="">Fecha fin</label>
	<input type="date" name="fecha_fin" value="{{$publicacion->fecha_fin or old('fecha_fin')}}">
</div>
<div>
	<label for="">Formato solicitado</label>
	<select value="{{$publicacion->formato_solicitado or old('formato_solicitado')}">
		<optgroup name="formato_solicitado" label="formato">
			<option>
				PDF
			</option>
			<option>
				DOC
			</option>
			<option>
				XLS
			</option>
			<option>
				PPTX
			</option>
			<option>
				JPG
			</option>
			<option>
				PNG
			</option>
		</optgroup>
	</select>
</div>
