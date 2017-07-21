@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detalle de la publicación</h3>
	</div>
	<div class="panel-body">
		@if(Auth::check())
			@if($publicacion->user_id != Auth::user()->id)
				<div>
					<label for="" class="control-label">publicador por</label>
					<label name="titulo" class="form-control">{{$publicacion->user->name}}</label>
				</div>
			@endif
		@endif
		<div>
			<label for="" class="control-label">titulo</label>
			<label name="titulo" class="form-control">{{$publicacion->titulo}}</label>
		</div>
		<div>
			<label for="" class="control-label">estado</label>
			<label name="titulo" class="form-control">{{$publicacion->estado}}</label>
		</div>
		<div>
			<label for="" class="control-label">entrega</label>
			<label name="entrega" class="form-control">{{$publicacion->entrega}}</label>
		</div>
		<div>
			<label for="" class="control-label">titulo archivo</label>
			<label name="ruta" class="form-control">{{$publicacion->ruta}}</label>
		</div>
		{{--
		<div>
			<label for="" class="control-label">ruta</label>
			@if(!Auth::check())
				<label name="ruta" class="form-control">{{$publicacion->titulo}}</label>
			@else
				<img src="/noticias/{{$file}}" name="titulo" class="form-control"></img>
			@endif
		</div>
		--}}
		{{-- @if(Auth::check()) --}}
			<div>
				<a href="/noticias/{{$publicacion->id}}" class="btn btn-default">
					@if($extension == 'pdf')
						<img src="{{asset('iconos/pdf.png')}}" height="100px" width="100px"></img>
					@elseif($extension == 'docx' or $extension == 'doc')
						<img src="{{asset('iconos/docx.png')}}" height="100px" width="100px"></img>
					@elseif($extension == 'rar')
						<img src="{{asset('iconos/rar.png')}}" height="100px" width="100px"></img>
					@elseif($extension == 'png' or $extension == 'jpg' or $extension == 'bmp')
						<img src="/noticias/{{$publicacion->id}}" height="100px" width="100px"></img>
					@else
						<img src="{{asset('iconos/unknown.png')}}" height="100px" width="100px"></img>
					@endif
					<p>{{$publicacion->ruta}}</p>
				</a>
			</div>
		{{-- @else
			<div>
				<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default">
					@if($extension == 'pdf')
						<img src="{{asset('iconos/pdf.png')}}" height="100px" width="100px"></img>
					@elseif($extension == 'docx' or $extension == 'doc')
						<img src="{{asset('iconos/docx.png')}}" height="100px" width="100px"></img>
					@elseif($extension == 'rar')
						<img src="{{asset('iconos/rar.png')}}" height="100px" width="100px"></img>
					@elseif($extension == 'png' or $extension == 'jpg' or $extension == 'bmp')
						<img src="/noticias/{{$publicacion->ruta}}" height="100px" width="100px"></img>
					@else
						<img src="{{asset('iconos/unknown.png')}}" height="100px" width="100px"></img>
					@endif
					<p>{{$publicacion->ruta}}</p>
				</a>
			</div>
		@endif --}}
		@if(Auth::check())
			@if(Auth::user()->id != $publicacion->user_id)
				<div>
					<a href="/cotizar_publicacion/{{$publicacion->id}}" class="btn btn-primary">Cotizar</a>
				</div>
			@else
				<h2>Cotizaciones {{count($publicacion->cotizacion)}}</h2>
				@if(Auth::check())
					@if(count($publicacion->cotizacion)>0 && $publicacion->user_id == Auth::user()->id)
						@if($publicacion->estado == 1)
							<div>
								<a href="/cotizaciones_por_publicacion/{{$publicacion->id}}" class="btn btn-primary">Ver cotizaciones</a>
							</div>
						@else
							@if($publicacion->estado == 3)
								<div>
									<a href="/cotizaciones_por_publicacion/{{$publicacion->id}}" class="btn btn-primary">Ver cotizaciones</a>
								</div>
								<div>
									<a href="/entregas/{{$cotizacion->id}}" class="btn btn-primary">Ver entrega</a>
								</div>
							@else
								<div>
									<h3>Ya pagaste esta publicación, aún no tienes entregas</h3>
								</div>
								<div>
									<a href="/cotizaciones_por_publicacion/{{$publicacion->id}}" class="btn btn-primary">Ver cotizaciones</a>
								</div>
							@endif
						@endif
					@endif
				@endif
			@endif
		@else
			<div>
				<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Cotizar</a>
			</div>
		@endif
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>

@stop