<?php

namespace App\Http\Controllers;

use App;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use App\Http\Requests\PublicacionRequest;
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
            'user_id', '=', Auth::user()->id)
            ->paginate(10);
        //$cotizaciones = \App\Cotizacion::where('publicacion_id', '=', $publicaciones)
        //    ->get();
        return view('publicaciones.index', [
            'publicaciones' => $publicaciones,
            'ruta' => 'mis_publicaciones'
            //'cotizaciones', $cotizaciones
        ]);
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
        $validator = Validator::make($request->all(), $request->rules());
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
            'user_id' => Auth::user()->id,
            'categoria_id' => $request['categoria_id'],
            'tipo_id' => $request['tipo_id'],
            'area_id' => $request['area_id'],
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
        $extensions = [
            'jpg' => 'jpeg.png',
            'png' => 'png.png',
            'pdf' => 'pdfdocument.png',
            'doc' => 'wordicon.jpg',
        ];
        
        return view('publicaciones.show', [
            'publicacion' => $publicacion,
            'file' => array_get($extensions,'sdf.pdf','unknown.png')

        ]);
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
    public function update(PublicacionRequest $request, $id)
    {
        //
        $validator = Validator::make($request->all(), $request->rules());
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
