<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $publicaciones = \App\Publicacion::all();
        return view('publicaciones.index', compact('publicaciones', $publicaciones));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('publicaciones.create');
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
        //obtenemos el campo file definido en el formulario
       $file = $request->file('ruta');
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
 
        \App\Publicacion::create([
            'id_user' => Auth::user()->id,
            'id_categoria' => $request['id_categoria'],
            'id_tipo' => $request['id_tipo'],
            'id_area' => $request['id_area'],
            'titulo' => $request['titulo'],
            'entrega' => $request['entrega'],
            'estado' => 0,
            'ruta' => $nombre,
            'descripcion' => $request['descripcion']
        ]);
        return redirect('publicacion')->with('mensaje', 'Publicación creada correctamente');
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
        $publicacion = \App\Publicacion::find($id);
        return view('publicaciones.show', compact('publicacion', $publicacion));
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
        $publicacion = \App\Publicacion::find($id);
        return view('publicaciones.edit', compact('publicacion', $publicacion));
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
        $user = \App\Publicacion::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('publicacion')->with('mensaje', 'Publicación editada correctamente');
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
        \App\Publicacion::destroy($id);
        return redirect('publicacion')->with('mensaje', 'Publicación eliminada correctamente');
    }
}
