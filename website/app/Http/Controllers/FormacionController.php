<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $formaciones = \App\Formacion::all();
        return view('formaciones.index', compact('formaciones', $formaciones));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('formaciones.create');
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
        $nuevo = \App\Formacion::create([
            'id_instituto' => $request['id_instituto'],
            'nombre' => $request['nombre'],
            'certificado' => $request['certificado']
        ]);

        return redirect('formacion')->with('mensaje', 'Formacion creada correctamente');
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
        $formacion = \App\Formacion::find($id);
        return view('formaciones.show', compact('formacion', $formacion));
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
        $formacion = \App\Formacion::find($id);
        return view('formaciones.edit', compact('formacion', $formacion));
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
        $formacion = \App\Formacion::find($id);
        $formacion->fill($request->all());
        $formacion->save();
        //Session::flash('mensaje', 'Formacion editado correctamente');
        return redirect('formacion')->with('mensaje', 'Formacion editada correctamente');
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
        \App\Formacion::destroy($id);
        return redirect('formacion')->with('mensaje', 'Formacion eliminada correctamente');
    }
}
