<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = \App\Tipo::all();
        return view('tipos.index', compact('tipos', $tipos));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        \App\Tipo::create([
            'nombre_tipo' => $request['nombre_tipo'],
            'descripcion_tipo' => $request['descripcion_tipo']
        ]);

        return redirect('tipo')->with('mensaje', 'Tipo creado correctamente');
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
        $tipo = \App\Tipo::find($id);
        return view('tipos.show', compact('tipo', $tipo));
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
        $tipo = \App\Tipo::find($id);
        return view('tipos.edit', compact('tipo', $tipo));
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
        $user = \App\Tipo::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('tipo')->with('mensaje', 'Tipo editado correctamente');
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
        \App\Tipo::destroy($id);
        return redirect('tipo')->with('mensaje', 'Tipo eliminado correctamente');
    }
}
