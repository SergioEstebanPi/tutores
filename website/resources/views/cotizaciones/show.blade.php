@extends('layouts.index')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>Detalle de la cotización</h3>
	</div>
	<div class="panel-body">
		@if($cotizacion->user_id != Auth::user()->id)
			<div>
				<label for="" class="control-label">tutor</label>
				<label name="name" class="form-control">{{$cotizacion->user->name}}</label>
			</div>
			<div>
				<a href="/ver_perfil/{{$cotizacion->user->id}}" class="btn btn-primary">Ver perfil</a>
			</div>
		@endif
		<div>
			<label for="" class="control-label">titulo trabajo</label>
			<label name="titulo" class="form-control">{{$cotizacion->publicacion->titulo}}</label>
		</div>
		<div>
			<label for="" class="control-label">precio</label>
			<label id="precio" name="precio" class="form-control">{{$cotizacion->precio}}</label>
		</div>
		@if(Auth::check() && $cotizacion->user_id == Auth::user()->id)
			<div>
				<label for="" class="control-label">estado</label>
				<label name="estado" class="form-control">{{$cotizacion->estado}}</label>
			</div>
		@endif
		<div>
			<label for="" class="control-label">descripcion</label>
			<label name="descripcion" class="form-control">{{$cotizacion->descripcion}}</label>
		</div>

		<label for="" class="control-label">Archivo publicado</label>
		<div>
			<a href="/noticias/{{$cotizacion->publicacion->id}}" class="btn btn-default">
				@if($extensionpublicacion == 'pdf')
					<img src="{{asset('iconos/pdf.png')}}" height="100px" width="100px"></img>
				@elseif($extensionpublicacion == 'docx' or $extensionpublicacion == 'doc')
					<img src="{{asset('iconos/docx.png')}}" height="100px" width="100px"></img>
				@elseif($extensionpublicacion == 'rar')
					<img src="{{asset('iconos/rar.png')}}" height="100px" width="100px"></img>
				@elseif($extensionpublicacion == 'png' or $extensionpublicacion == 'jpg' or $extensionpublicacion == 'bmp')
					<img src="/noticias/{{$cotizacion->publicacion->id}}" height="100px" width="100px"></img>
				@else
					<img src="{{asset('iconos/unknown.png')}}" height="100px" width="100px"></img>
				@endif
				<p>{{$cotizacion->publicacion->ruta}}</p>
			</a>
		</div>
		@if($cotizacion->estado == 2)
			<label for="" class="control-label">Archivo entregado</label>
			<div>
				<a href="/entregas/{{$cotizacion->id}}" class="btn btn-default">
					@if($extensioncotizacion == 'pdf')
						<img src="{{asset('iconos/pdf.png')}}" height="100px" width="100px"></img>
					@elseif($extensioncotizacion == 'docx' or $extensioncotizacion == 'doc')
						<img src="{{asset('iconos/docx.png')}}" height="100px" width="100px"></img>
					@elseif($extensioncotizacion == 'rar')
						<img src="{{asset('iconos/rar.png')}}" height="100px" width="100px"></img>
					@elseif($extensioncotizacion == 'png' or $extensioncotizacion == 'jpg' or $extensioncotizacion == 'bmp')
						<img src="/entregas/{{$cotizacion->id}}" height="100px" width="100px"></img>
					@else
						<img src="{{asset('iconos/unknown.png')}}" height="100px" width="100px"></img>
					@endif
					<p>{{$cotizacion->ruta_entrega}}</p>
				</a>
			</div>
		@endif
		@if($cotizacion->publicacion->user_id == Auth::user()->id && $cotizacion->publicacion->estado == 1)
			<div>
				<a href="{{ route('payment') }}" class="btn btn-primary">Pagar al tutor con <i class="fa fa-cc-paypal fa-2x"></i></a>
			</div>
			<div>
				<h1>------------</h1>
			</div>
			<div>
				<a href="/pagar_cotizacion/{{$cotizacion->id}}" class="btn btn-primary">Pagar al tutor</a>
			</div>
			<div id="paypal-button-container"></div>
			{{-- Script configuracion boton paypal --}}
			<script>
			    paypal.Button.render({

			        env: 'sandbox', // sandbox | production

			        // PayPal Client IDs - replace with your own
			        // Create a PayPal app: https://developer.paypal.com/developer/applications/create
			        client: {
			        	sandbox:    'AUe0eLturPW6lyIR5f30yj6vBSMc5W8yUDjgTUVZvHEz7L0LxKQZkp8N4YhYKbg3Q_9GgoKM9sww_7HH',
			            //sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
			            production: '<insert production client id>'
			        },

			        // Show the buyer a 'Pay Now' button in the checkout flow
			        commit: true,

			        // payment() is called when the button is clicked
			        payment: function(data, actions) {

			            // Make a call to the REST api to create the payment
			            return actions.payment.create({
			                payment: {
			                    transactions: [
			                        {
			                            amount: { total: '100.00', currency: 'USD' }
			                            //amount: { total: document.getElementById("precio").value, currency: 'USD' }
			                        }
			                    ]
			                }
			            });
			        },

			        // onAuthorize() is called when the buyer approves the payment
			        onAuthorize: function(data, actions) {

			            // Make a call to the REST api to execute the payment
			            return actions.payment.execute().then(function() {
			                window.alert('Payment Complete!');
			            });
			        }

			    }, '#paypal-button-container');

			</script>
		@elseif($cotizacion->user_id == Auth::user()->id && $cotizacion->estado == 1)
			<form action="/crear_entrega" method="post" accept-charset="utf-8" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="id" value="{{$cotizacion->id}}" />
				<div>
				    <label class="control-label">Sube el trabajo <small class="help-block">(Máx 10MB)</small></label>
				</div>
				<div>
				    <label class="control-label">Subir archivo</label>
				    <label type="text" name="" class="control-label">{{$cotizacion->ruta_entrega or old('ruta_entrega')}}</label>
				</div>
					<input type="file" name="ruta_entrega" value="{{$cotizacion->ruta_entrega or old('ruta_entrega')}}" class="form-control">
				</div>
				<div>
					<button class="btn btn-primary">Entregar trabajo</button>
				</div>
			</form>
		@endif
		<div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Atrás</a>
		</div>
	</div>
</div>
 
{{--
 <form method="post" action="https://gateway.payulatam.com/ppp-web-gateway/">
  <input name="merchantId"    type="hidden"  value="651921"   >
  <input name="accountId"     type="hidden"  value="654415" >
  <input name="description"   type="hidden"  value="Test PAYU"  >
  <input name="referenceCode" type="hidden"  value="2" >
  <input name="amount"        type="hidden"  value="50000"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="COP" >
  <input name="signature"     type="hidden"  value="45759c5bde9c8ee790e8dbfdc7ce242d"  >
  <input name="test"          type="hidden"  value="1" >
  <input name="buyerEmail"    type="hidden"  value="test@test.com" >
  <input name="responseUrl"    type="hidden"  value="http://www.test.com/response" >
  <input name="confirmationUrl"    type="hidden"  value="http://www.test.com/confirmation" >
  <input name="Submit"        type="submit"  value="Enviar" >
</form>
--}}

@stop
