<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreaController extends Controller
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
        $areas = \App\Area::all();
        return view('areas.index', compact('areas', $areas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $areas_padre = \App\Area::where('tipo', '1');
        return view('areas.create', compact('areas_padre', $areas_padre));
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
        $nuevo = \App\Area::create([
            'nombre' => $request['nombre'],
            'id_area' => $request['id_area'],
            'tipo' => $request['tipo']
        ]);

        return redirect('area')->with('mensaje', 'Area creada correctamente');
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
        $area = \App\Area::find($id);
        return view('areas.show', compact('area', $area));
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
        $area = \App\Area::find($id);
        $areas_padre = \App\Area::where('tipo', 1)
                    ->where('id', '!=', $id)
                    ->get();
        return view('areas.edit', compact(
                    ['area', $area],
                    ['areas_padre', $areas_padre]
                )
            );
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
        $area = \App\Area::find($id);
        $area->fill($request->all());
        $area->save();
        //Session::flash('mensaje', 'Area editado correctamente');
        return redirect('area')->with('mensaje', 'Area editada correctamente');
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
        \App\Area::destroy($id);
        return redirect('area')->with('mensaje', 'Area eliminada correctamente');
    }
}
