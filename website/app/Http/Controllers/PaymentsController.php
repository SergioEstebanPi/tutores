<?php

//namespace App\Http\Controllers;
//namespace App;
use public_path() .'/../payu-php-sdk/lib/PayU/util/PayUParameters.php';
require_once public_path() .'/../payu-php-sdk/lib/PayU.php';
//use Alexo\LaravelPayU\LaravelPayU;

class PaymentsController 
{

	public function probarSDK(){
		$parameters = array(
		        //Ingrese aquí el número de cuotas.
				PayUParameters::INSTALLMENTS_NUMBER => "1",
		        //Ingrese aquí el nombre del país.
				PayUParameters::COUNTRY => PayUCountries::MX,
		        //Ingrese aquí el identificador de la cuenta.
				PayUParameters::ACCOUNT_ID => "500547",
		        //Cookie de la sesión actual.
				PayUParameters::PAYER_COOKIE => "cookie_" . time(),
		        //Ingrese aquí la moneda.
				PayUParameters::CURRENCY => "MXN",
				//Se ingresa el id de usuario, una referencia del sistema
				PayUParameters::PAYER_ID => "125",
		        //Ingrese aquí el código de referencia.
				PayUParameters::REFERENCE_CODE => "100",
		        //Ingrese aquí la descripción.
				PayUParameters::DESCRIPTION => "Test de pago",
		        //Ingrese aquí el valor o monto a pagar.
				PayUParameters::VALUE => 300,
		        //Ingrese aquí su firma. “{APIKEY}~{MERCHANTID}~{REFERENCE_CODE}~{VALUE}~{CURRENCY}”
				PayUParameters::SIGNATURE => md5(PayU::$apiKey . "~" . PayU::$merchantId . "~" ."100" . "~" . "300" . "~MXN"),

		);
	}

	public function doPing(){
		LaravelPayU::doPing(function($response) {
	        $code = $response->code;
	        // ... revisar el codigo de respuesta
	        return $code;
	    }, function($error) {
	     // ... Manejo de errores PayUException
	    	return "Error";
	    });

	    return "Nada";
	}
}   