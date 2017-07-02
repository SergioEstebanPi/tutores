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
		@if($cotizacion->estado == 2)
			<div>
				<a href="/storage/{{$cotizacion->ruta_entrega}}" class="btn btn-primary">Ver entrega</a>
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
			            sandbox:    'AFcWxV21C7fd0v3bYYYRCpSSRl31AttOadwyUmWLnn8.qT7NEBbcYs-8',
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
			                            amount: { total: '0.01', currency: 'USD' }
			                            //amount: { total: document.getElementById("precio"), currency: 'USD' }
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
				    <label class="control-label">Archivo subido</label>
				    <input type="text" name="" value="{{$cotizacion->ruta_entrega or old('ruta_entrega')}}" class="form-control">
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

@stop