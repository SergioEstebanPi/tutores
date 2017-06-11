<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Requests\PublicacionRequest;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */

class PublicacionController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
        //$this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $publicaciones = \App\Publicacion::where(
            'id_user', '=', Auth::user()->id)->get();
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
        $tipos = \App\Tipo::all();
        $areas = \App\Area::all();
        $categorias = \App\Categoria::all();
        return view('publicaciones.create')
            ->with([
                'tipos' => $tipos,
                'areas' => $areas,
                'categorias' => $categorias
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionRequest $request)
    {
        //
        if ($validator->fails()) {
            return redirect('publicacion/create')
                ->withErrors($validator)
                ->withInput();
        }
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
        return redirect('publicacion')->with([
            'mensaje' => 'Publicación creada correctamente',
            'tipo' => 'success'
        ]);
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
        $tipos = \App\Tipo::all();
        $areas = \App\Area::all();
        $categorias = \App\Categoria::all();
        return view('publicaciones.edit', compact(
                ['publicacion', $publicacion],
                ['tipos', $tipos],
                ['areas', $areas],
                ['categorias', $categorias]
            ));
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
        return redirect('publicacion')->with([
            'mensaje' => 'Publicación editada correctamente',
            'tipo' => 'success'
        ]);
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
        return redirect('publicacion')->with([
            'mensaje' => 'Publicación eliminada correctamente',
            'tipo' => 'success'
        ]);
    }
}
