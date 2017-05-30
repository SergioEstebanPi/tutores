<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuntuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        //
        $puntuaciones = \App\Puntuacion::all();
        return view('puntuaciones.index', compact('puntuaciones', $puntuaciones));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('puntuaciones.create');
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
        $nuevo = \App\Puntuacion::create([
            'id_user' => '',
            'id_valoracion' => ''
        ]);

        return redirect('publicacion')->with('mensaje', 'Puntuación creada correctamente');
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
        $user = \App\Puntuacion::find($id);
        return view('puntuaciones.show', compact('user', $user));
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
        $user = \App\Puntuacion::find($id);
        return view('puntuaciones.edit', compact('user', $user));
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
        $user = \App\Puntuacion::find($id);
        $user->fill($request->all());
        $user->save();
        //Session::flash('mensaje', 'Puntuación editado correctamente');
        return redirect('puntuacion')->with('mensaje', 'Puntuación editada correctamente');
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
        \App\Puntuacion::destroy($id);
        return redirect('puntuacion')->with('mensaje', 'Puntuación eliminada correctamente');
    }
}
