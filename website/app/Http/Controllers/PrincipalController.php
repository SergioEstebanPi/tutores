<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        return view('principal.index');
    }

    public function registrar(){
        //return view('principal.registro.index');        
    }

    public function mostrar_publicaciones(){
        // solo las que no han sido pagadas
        $publicaciones = \App\Publicacion::whereIn('estado', [0, 1])
                                        ->paginate(50);
        return view('publicaciones.index', [
            'publicaciones' => $publicaciones,
            'ruta' => 'noticias'
        ]);
    }

    public function buscar_publicaciones(){
        $valor = \Input::get('valor');
        $ruta = \Input::get('ruta');

        $publicaciones = '';
        if($ruta == 'noticias'){
            $publicaciones = \App\Publicacion::whereIn('estado', [0, 1])
                                        ->where('titulo', 'like', '%' . $valor . '%')
                                        ->orWhere('descripcion', 'like', '%' . $valor . '%')
                                        ->paginate(50);
        } else {
            if(Auth::check()){
                $publicaciones = \App\Publicacion::where(
                    'user_id', '=', Auth::user()->id)
                    ->paginate(10);    
            } else {
                abort(404);
            }
            
        }

        return view('principal.publicaciones.tabla')->with([
            'publicaciones' => $publicaciones,
            'ruta' => $ruta
        ]);
        /*
        return view('publicaciones.index', [
            'publicaciones' => $publicaciones,
            'ruta' => 'noticias'
        ]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
