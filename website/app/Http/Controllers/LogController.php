<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* imports para autenticacion */
use Auth;
use Session;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('principal.login.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        if(Auth::attempt(['email' => $request['email'], 
                          'password' => $request['password'] 
                        ])){
            
            return redirect()->to('/publicacion')->with([
                'mensaje' => 'Bienvenido ' . $request['email'],
                'tipo' => 'success'
            ]);
        }
        return redirect()->to('/')->with([
            'mensaje' => 'Error datos incorrectos',
            'tipo' => 'danger'
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }

}
