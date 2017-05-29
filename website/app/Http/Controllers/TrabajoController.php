<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trabajos = \App\Trabajo::all();
        return view('trabajos.index', compact('trabajos', $trabajos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('trabajos.create');
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
        \App\Trabajo::create([
            'id_tipo' => $request['id_tipo'],
            'titulo_trabajo' => $request['titulo_trabajo'],
            'ruta_trabajo' => $request['ruta_trabajo'],
            'descripcion_trabajo' => $request['descripcion_trabajo'],
            'estado_trabajo' => $request['estado_trabajo']
        ]);

        return redirect('trabajo')->with('mensaje', 'Trabajo creado correctamente');
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
        $trabajo = \App\Trabajo::find($id);
        return view('trabajos.show', compact('trabajo', $trabajo));
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
        $trabajo = \App\Trabajo::find($id);
        return view('trabajos.edit', compact('trabajo', $trabajo));
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
        $user = \App\Trabajo::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('trabajo')->with('mensaje', 'Trabajo editado correctamente');
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
        \App\Trabajo::destroy($id);
        return redirect('trabajo')->with('mensaje', 'Trabajo eliminado correctamente');
    }
}
