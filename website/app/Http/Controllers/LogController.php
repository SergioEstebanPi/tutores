<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* imports para autenticacion */
use Auth;
use Session;
use App\Http\Requests;
use App\Http\Requests\LoginRequest;

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
        return view('principal.login.login');
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
    public function store(LoginRequest $request)
    {
        //
        if(Auth::attempt(['email' => $request['email'], 
                          'password' => $request['password'] ])){
            
            return redirect()->to('usuario')->with('mensaje', 'Bienvenido ' . $request['email']);
        }
        return redirect()->to('/')->with('mensaje', 'Error datos incorrectos');
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }

}
