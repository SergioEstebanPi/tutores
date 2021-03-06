<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
     return view('/');
});
*/

/* rutas principales */
//Route::get('/', function () {
//    return view('principal.index');
//});
//use Illuminate\Support\Facades\Input;

//Route::post('registro', 'RegistroController@store');

Route::resource('/', 'PrincipalController');
//Route::get('registro', 'PrincipalController@registrar');

/* opciones del usuario loggeado */
Route::get('/noticias', 'PrincipalController@mostrar_publicaciones');

/* busquedas */
Route::get('buscar', 'PrincipalController@buscar_publicaciones');

Route::get('/conversor/{origen}/{destino}/{cantidad}', 'CotizacionController@conversor_monedas');


//Route::get('/mis_publicaciones', 'PrincipalUsuarioController@mis_publicaciones');
//Route::get('/mis_cotizaciones', 'PrincipalUsuarioController@mis_cotizaciones');
Route::get('/mi_perfil', 'UsuarioController@mi_perfil');
Route::get('/cotizar_publicacion/{id}', 'CotizacionController@cotizar_publicacion');
Route::get('/cotizaciones_por_publicacion/{id}', 'CotizacionController@cotizaciones_por_publicacion');
Route::get('/ver_perfil/{id}', 'UsuarioController@ver_perfil');
Route::post('/pagar_cotizacion/{id}', 'CotizacionController@pagar_cotizacion');
Route::post('/crear_entrega', 'CotizacionController@crear_entrega');

Route::post('/', 'CotizacionController@crear_entrega');

/* crear pagos paypal */
// Enviamos nuestro pedido a Paypal

Route::get('payment/{cotizacion_id}', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment'
));

// Paypal redirecciona a esta ruta

Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'PaypalController@getPaymentStatus'
));


// Paypal pagar al tutor
Route::get('payout', array(
    'as' => 'payout',
    'uses' => 'PaypalController@pagarAlTutor'
));


/* CRUDS del administrador */
Route::resource('usuario', 'UsuarioController');
Route::resource('publicacion', 'PublicacionController');
Route::resource('tipo', 'TipoController');
Route::resource('cotizacion', 'CotizacionController');
Route::resource('transaccion', 'EntregaController');
Route::resource('area', 'AreaController');
Route::resource('interes', 'InteresController');
Route::resource('instituto', 'InstitutoController');
Route::resource('categoria', 'CategoriaController');
Route::resource('formacion', 'FormacionController');
Route::resource('puntuacion', 'PuntuacionController');
Route::resource('valoracion', 'ValoracionController');

/* formularios publicos */
//Route::get('registro', 'RegistroController@index');
Route::resource('registro', 'RegistroController');

/*
Route::match(['get', 'post'], 'registro', function(){
	$name = Input::get('name');
	$email = Input::get('email');
	return view('principal.registro.index', [
		'name' => $name,
		'email' => $email
	]);
});
*/


/* cargar archivos */
//Route::get('formulario', 'StorageController@index');
//Route::post('storage/create', 'StorageController@save');
Route::get('noticias/{id}', 'StorageController@download');
Route::get('entregas/{id}', 'CotizacionController@download');
/*
Route::get('publicaciondown/temp/{archivo}', function($archivo){
    $path = storage_path().'/app/storage/temp/' . $archivo;
    if (file_exists($path)) { 
        return Response::download($path);
    }

});
*/

//Route::get('storage/{id}', 'CotizacionController@download');


/*
Route::get('storage/app/{archivo}', function ($archivo) {
     $public_path = storage_path();
     $url = $public_path .'/app/storage/'. $archivo;
     //verificamos si el archivo existe y lo retornamos
     if (Storage::exists($archivo))
     {
       return response()->download($url);
     }
     //si no se encuentra lanzamos un error 404.
     abort(404);
 
});
*/
Route::resource('login', 'LogController');
Route::get('logout', 'LogController@logout');

/*
Route::group(['middleware' => 'auth'], function(){

});
*/
