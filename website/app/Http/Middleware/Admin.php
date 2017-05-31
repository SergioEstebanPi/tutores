<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Guard;
use Closure;
use Session;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        // si es admin
        //dd($this->auth);
        if (Auth::user() == 1) {
            // enviar mensaje
            Session::flash('mensaje', 'Sin privilegios');
            return redirect()->to('/');
        }
        return $next($request);
    }
}
