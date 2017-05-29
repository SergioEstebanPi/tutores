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
Route::get('/', function () {
    return view('principal.index');
});

/* CRUDS del administrador */
Route::resource('usuario', 'UsuarioController');
Route::resource('publicacion', 'PublicacionController');
Route::resource('tipo', 'TipoController');
Route::resource('trabajo', 'TrabajoController');

/* cargar archivos */
Route::get('formulario', 'StorageController@index');
Route::post('storage/create', 'StorageController@save');
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

Route::resource('login', 'LogController');
Route::get('logout', 'LogController@logout');
