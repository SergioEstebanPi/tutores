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

// Route::get('/', function () {
//     return view('welcome');
// });

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
Route::get('/mis_publicaciones', 'PrincipalUsuarioController@mis_publicaciones');
Route::get('/mis_cotizaciones', 'PrincipalUsuarioController@mis_cotizaciones');
Route::get('/mi_perfil', 'UsuarioController@mi_perfil');
Route::get('/cotizar_publicacion/{id}', 'CotizacionController@cotizar_publicacion');
Route::get('/cotizaciones_por_publicacion/{id}', 'CotizacionController@cotizaciones_por_publicacion');
Route::get('/ver_perfil/{id}', 'UsuarioController@ver_perfil');
Route::get('/pagar_cotizacion/{id}', 'CotizacionController@pagar_cotizacion');

/* CRUDS del administrador */
Route::resource('usuario', 'UsuarioController');
Route::resource('publicacion', 'PublicacionController');
Route::resource('tipo', 'TipoController');
Route::resource('cotizacion', 'CotizacionController');
Route::resource('entrega', 'EntregaController');
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
Route::get('formulario', 'StorageController@index');
Route::post('storage/create', 'StorageController@save');
Route::get('storage/{archivo}', 'StorageController@download');
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
