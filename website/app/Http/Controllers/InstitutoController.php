<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstitutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $institutos = \App\Instituto::all();
        return view('institutos.index', compact('institutos', $institutos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('institutos.create');
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
        $nuevo = \App\Instituto::create([
            'nombre' => $request['nombre']
        ]);

        return redirect('instituto')->with('mensaje', 'Instituto creado correctamente');
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
        $instituto = \App\Instituto::find($id);
        return view('institutos.show', compact('instituto', $instituto));
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
        $instituto = \App\Instituto::find($id);
        return view('institutos.edit', compact('instituto', $instituto));
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
        $instituto = \App\Instituto::find($id);
        $instituto->fill($request->all());
        $instituto->save();
        //Session::flash('mensaje', 'Instituto editado correctamente');
        return redirect('instituto')->with('mensaje', 'Instituto editado correctamente');
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
        \App\Instituto::destroy($id);
        return redirect('instituto')->with('mensaje', 'Instituto eliminado correctamente');
    }
}
