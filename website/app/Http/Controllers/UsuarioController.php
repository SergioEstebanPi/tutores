<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = \App\User::all();
        return view('usuarios.index', compact('users', $users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.create');
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
        $nuevo = \App\User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        if ($request['tipo_usuario'] == 'estudiante') {
            \App\Estudiante::create([
                'id' => $nuevo->id,
                'nombre1_estudiante' => $request['name'],
                'nombre2_estudiante' => $request['name'],
                'apellido1_estudiante' => $request['name'],
                'apellido2_estudiante' => $request['name'],
                'telefono1_estudiante' => $request['name'],
                'telefono2_estudiante' => $request['name'],
            ]);
        }

        return redirect('publicacion')->with('mensaje', 'Usuario creado correctamente');
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
        $user = \App\User::find($id);
        return view('usuarios.show', compact('user', $user));
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
        $user = \App\User::find($id);
        return view('usuarios.edit', compact('user', $user));
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
        $user = \App\User::find($id);
        $user->fill($request->all());
        $user->save();
        //Session::flash('mensaje', 'Usuario editado correctamente');
        return redirect('usuario')->with('mensaje', 'Usuario editado correctamente');
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
        \App\User::destroy($id);
        return redirect('usuario')->with('mensaje', 'Usuario eliminado correctamente');
    }
}
