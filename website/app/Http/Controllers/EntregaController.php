<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class EntregaController extends Controller
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
        $entregas = \App\Cotizacion::where('user_id', '=', Auth::user()->id)
                    ->where('estado', '=', 2)
                    ->paginate(10);
        return view('entregas.index', [
            'entregas' => $entregas
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
        return view('entregas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*
        return redirect('entrega')->with([
            'mensaje' => 'Entrega creada correctamente',
            'tipo' => 'success'
        ]);
        */
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
        $entrega = \App\Entrega::find($id);
        return view('entregas.show', compact('entrega', $entrega));
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
        $entrega = \App\Entrega::find($id);
        return view('entregas.edit', compact('entrega', $entrega));
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
        $entrega = \App\Entrega::find($id);
        $entrega->fill($request->all());
        $entrega->save();
        //Session::flash('mensaje', 'Entrega editado correctamente');
        return redirect('entrega')->with('mensaje', 'Entrega editada correctamente');
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
        \App\Entrega::destroy($id);
        return redirect('entrega')->with('mensaje', 'Entrega eliminada correctamente');
    }
}