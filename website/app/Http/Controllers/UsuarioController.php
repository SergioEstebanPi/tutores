<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
    public function __construct(){
        //$this->middleware('auth');
        //$this->middleware('admin');
    }

    public function index()
    {
        //
        //$users = \App\User::all();
        //return view('usuarios.index', compact('users', $users));
    }

    public function mi_perfil(){
        $user = \App\User::find(Auth::user()->id);
        return view('usuarios.show', [
            'user' => $user
        ]);
    }

    public function ver_perfil($id){
        $user = \App\User::find($id);
        if(Auth::check() && Auth::user()->id != $user->id){ // cuando no soy yo viendo mi perfil
            // validar si el usuario ya vio el perfil
            // modificar campo de vistos del perfil por usuarios distintos 
        } 
        return view('usuarios.show', [
                'user' => $user
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
        //return view('usuarios.create');
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
        /*
        if($request['password'] == $request['password2']){
            $nuevo = \App\User::create([
                'foto' => '',
                'alias' => '',
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'formacion_id' => $request['formacion']
            ]);
        }
        
        return redirect('publicacion')->with([
            'mensaje' => 'Usuario creado correctamente',
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
        //$user = \App\User::find($id);
        //return view('usuarios.show', compact('user', $user));
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
        //$user = \App\User::find($id);
        //return view('usuarios.edit', compact('user', $user));
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
        /*
        $user = \App\User::find($id);
        $user->fill($request->all());
        $user->save();
        //Session::flash('mensaje', 'Usuario editado correctamente');
        return redirect('usuario')->with([
            'mensaje' => 'Usuario editado correctamente',
            'tipo' => 'success'
        ]);
        */
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
        //\App\User::destroy($id);
        //return redirect('usuario')->with('mensaje', 'Usuario eliminado correctamente');
    }
}
