<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class CotizacionController extends Controller
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
        $cotizaciones = \App\Cotizacion::all();
        return view('cotizaciones.index', compact('cotizaciones', $cotizaciones));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cotizaciones.create');
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
        \App\Cotizacion::create([
            'id_publicacion' => $request['id_publicacion'],
            'id_user' => Auth::user()->id,
            'estado' => 0,
            'precio' => $request['precio'],
            'inicio' => $request['inicio'],
            'fin' => $request['fin'],
            'descripcion' => $request['descripcion']
        ]);
        return redirect('cotizacion')->with('mensaje', 'Cotización creada correctamente');
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
        $cotizacion = \App\Cotizacion::find($id);
        return view('cotizaciones.show', compact('cotizacion', $cotizacion));
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
        $cotizacion = \App\Cotizacion::find($id);
        return view('cotizaciones.edit', compact('cotizacion', $cotizacion));
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
        $user = \App\Cotizacion::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('cotizacion')->with('mensaje', 'Cotización editada correctamente');
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
        \App\Cotizacion::destroy($id);
        return redirect('cotizacion')->with('mensaje', 'Cotización eliminada correctamente');
    }
}
