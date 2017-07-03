<?php 

namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Input;

class PaypalController extends BaseController
{
	private $_api_context;

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		//$this->_api_context = new ApiContext($paypal_conf['client_id'], $paypal_conf['secret']);
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	/* se configura lo que se le envia a paypal */
	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$items = array();
		$subtotal = 0;
		//$cart = \Session::get('cart');
		$currency = 'USD';

		/*
		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->name)
			->setCurrency($currency)
			->setDescription($producto->extract)
			->setQuantity($producto->quantity)
			->setPrice($producto->price);
			$items[] = $item;
			$subtotal += $producto->quantity * $producto->price;
		}
		*/

		$item = new Item();
			$item->setName('trabajo1')
			->setCurrency($currency)
			->setDescription('pago trabajo1')
			->setQuantity(1)
			->setPrice(0.05);
			$items[] = $item;
			//$subtotal += 1 * 0.05;
			$subtotal = 0.05;

		// lista de objetos del carrito
		$item_list = new ItemList();
		$item_list->setItems($items);
		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping(0); // cobro adicional
		$total = $subtotal + 0; // se añade el cobro adicional

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		//$amount->setTotal(0.05);

		// se envia la cantidad a pagar y los items del carrito
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pedido de prueba en mi Laravel App Store');

		// ruta a donde se envia al usuario si acepta el pago o si se cancela
		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		// se realiza el pago y se configura el tipo de pago en este caso venta directa
		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		// se crea la conexion a través de la API Paypal
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getmensaje() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}
		return \Redirect::route('cart-show')
			->with('error', 'Ups! Error desconocido.');
	}

	/* se obtiene la respuesta de Paypal */
	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');

		// clear the session payment ID
		\Session::forget('paypal_payment_id');
		$payerId = \Input::get('PayerID');
		$token = \Input::get('token');

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			/*
			return \Redirect::route('/') // 'home'
				->with('mensaje', 'Hubo un problema al intentar pagar con Paypal');
				*/
			return redirect()->to('publicacion')
				->with([
					'mensaje' => 'Hubo un problema al intentar pagar con Paypal',
					'tipo' => 'danger'
				]);
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));

		//Execute the payment se ejecuta el pago
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		// 'approved' -> la compra se realiza correctamente
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

			// ruta para registrar la compra en la base de datos
			//$this->saveOrder(\Session::get('cart'));

			/*
			\Session::forget('cart');
			return \Redirect::route('/')
				->with('mensaje', 'Compra realizada de forma correcta');
				*/
			return redirect()->to('publicacion')
				->with([
					'mensaje' => 'Pago realizado de forma correcta',
					'tipo' => 'success'
				]);
		}

		// la compra no se pudo realizar
		/*
		return \Redirect::route('/') // 'home'
			->with('mensaje', 'La compra fue cancelada');
			*/
		return redirect()->to('publicacion')
			->with([
				'mensaje' => 'El pago no pudo realizarse correctamente',
				'tipo' => 'danger'
			]);
	}

	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }
	    
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 100,
	        'user_id' => \Auth::user()->id
	    ]);
	    
	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}
}