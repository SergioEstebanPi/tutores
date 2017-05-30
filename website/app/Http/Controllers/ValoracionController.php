<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValoracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $valoraciones = \App\Valoracion::all();
        return view('valoraciones.index', compact('valoraciones', $valoraciones));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('valoraciones.create');
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
        $nuevo = \App\Valoracion::create([
            'nombre' => $request['nombre'],
            'cantidad' => $request['cantidad'],
            'descripcion' => $request['descripcion']
        ]);

        return redirect('valoracion')->with('mensaje', 'Valoracion creada correctamente');
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
        $valoracion = \App\Valoracion::find($id);
        return view('valoraciones.show', compact('valoracion', $valoracion));
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
        $valoracion = \App\Valoracion::find($id);
        return view('valoraciones.edit', compact('valoracion', $valoracion));
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
        $valoracion = \App\Valoracion::find($id);
        $valoracion->fill($request->all());
        $valoracion->save();
        //Session::flash('mensaje', 'Valoracion editado correctamente');
        return redirect('valoracion')->with('mensaje', 'Valoracion editada correctamente');
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
        \App\Valoracion::destroy($id);
        return redirect('valoracion')->with('mensaje', 'Valoracion eliminada correctamente');
    }
}
