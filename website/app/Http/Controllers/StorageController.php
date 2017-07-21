<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StorageController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('storages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('tipos.create');
    }

    /*
    lógica no implementada acá sino en los controladores 
    PublicacionController y CotizacionController pendiente por revisar (eliminar)
    

	public function save(Request $request)
	{
 
	       //obtenemos el campo file definido en el formulario
	       $file = $request->file('ruta');
	 
	       //obtenemos el nombre del archivo
	       $nombre = $file->getClientOriginalName();
	 
	       //indicamos que queremos guardar un nuevo archivo en el disco local
	       \Storage::disk('local')->put($nombre,  \File::get($file));
	 
	       //return "archivo guardado";
           return -1;
	}
    */

    public function download($id){
        /*
        C:\Users\Usuario\Documents\TUTORES\tutores\website\storage\app\storage
        se retornan los archivos de la publicaciones se muestran a todo público
        */
        $publicacion = \App\Publicacion::find($id);
        //$user = \App\User::find($publicacion->user_id);

        $url = storage_path() . '/app/storage/' . $publicacion->user->email . '/publicaciones/' . $publicacion->id . '/' . $publicacion->ruta;
        //verificamos si el archivo existe y lo retornamos

        if (file_exists($url)) { 
            return response()->download($url);
        }
        /*
        if (\Storage::exists($archivo))
        {
            $ext = pathinfo($url, PATHINFO_EXTENSION);
            return response()->download($url);
        }
        */
        //si no se encuentra lanzamos un error 404.
        abort(404);
    }
}
