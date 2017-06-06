<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InteresController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $intereses = \App\Interes::all();
        return view('intereses.index', compact('intereses', $intereses));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('intereses.create');
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
        $nuevo = \App\Interes::create([
            'id_area' => $request['id_area'],
            'id_user' => $request['id_user'],
            'notificar' => $request['notificar'],
        ]);

        return redirect('interes')->with('mensaje', 'Interes creado correctamente');
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
        $interes = \App\Interes::find($id);
        return view('intereses.show', compact('interes', $interes));
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
        $interes = \App\Interes::find($id);
        return view('intereses.edit', compact('interes', $interes));
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
        $interes = \App\Interes::find($id);
        $interes->fill($request->all());
        $interes->save();
        //Session::flash('mensaje', 'Interes editado correctamente');
        return redirect('interes')->with('mensaje', 'Interes editado correctamente');
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
        \App\Interes::destroy($id);
        return redirect('interes')->with('mensaje', 'Interes eliminado correctamente');
    }
}
