<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
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
        $categorias = \App\Categoria::all();
        return view('categorias.index', compact('categorias', $categorias));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categorias.create');
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
        $nuevo = \App\Categoria::create([
            'nombre' => $request['nombre']
        ]);

        return redirect('categoria')->with('mensaje', 'Categoria creada correctamente');
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
        $categoria = \App\Categoria::find($id);
        return view('categorias.show', compact('categoria', $categoria));
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
        $categoria = \App\Categoria::find($id);
        return view('categorias.edit', compact('categoria', $categoria));
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
        $categoria = \App\Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        //Session::flash('mensaje', 'Categoria editado correctamente');
        return redirect('categoria')->with('mensaje', 'Categoria editada correctamente');
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
        \App\Categoria::destroy($id);
        return redirect('categoria')->with('mensaje', 'Categoria eliminada correctamente');
    }
}
