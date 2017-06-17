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
        return view('storages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipos.create');
    }

	public function save(Request $request)
	{
 
	       //obtenemos el campo file definido en el formulario
	       $file = $request->file('file');
	 
	       //obtenemos el nombre del archivo
	       $nombre = $file->getClientOriginalName();
	 
	       //indicamos que queremos guardar un nuevo archivo en el disco local
	       \Storage::disk('local')->put($nombre,  \File::get($file));
	 
	       return "archivo guardado";
	}

    public function download($archivo){
        //C:\Users\Usuario\Documents\TUTORES\tutores\website\storage\app\storage
        $url = storage_path() .'/app/storage/'. $archivo;
        //verificamos si el archivo existe y lo retornamos
        if (\Storage::exists($archivo))
        {
            $ext = pathinfo($url, PATHINFO_EXTENSION);
            return response()->download($url);
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);
    }
}
