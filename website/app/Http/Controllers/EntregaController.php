<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{

    /* el nombre de este controlador debe cambiar a TransaccionController */
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

        
        $pagos = DB::table('cotizaciones')
            ->whereIn('publicacion_id', function($query)
            {
                $query->select('id')
                      ->from('publicaciones')
                      ->where('user_id', '=', Auth::user()->id)  // mis publicaciones
                      ->whereIn('estado', [2, 3])
                      ->get(); // pagado, recibido
            })
            //->whereIn('estado', [1, 2, 3])
            ->get();

        $recibidos = \App\Cotizacion::where('user_id', '=', Auth::user()->id)
                                    ->whereIn('estado', [2, 3]) // entregado, calificada
                                    ->get(); 

        return view('entregas.index', [
            'pagos' => $pagos,
            'recibidos' => $recibidos
        ]);

        /*
        $publicaciones = DB::table('cotizaciones')
            ->join('publicaciones', 'cotizaciones.publicacion_id', '=', 'publicaciones.id')
            ->join('users', 'publicaciones.user_id', '=', 'users.id')
            ->where('publicaciones.estado', '=', 3) // trabajo recibido
            ->where('publicaciones.user_id', '=', Auth::user()->id)
            ->get();
        $cotizaciones = \App\Cotizacion::where('user_id', '=', Auth::user()->id)
            ->whereIn('estado', [2, 3]) // trabajo enviado - calificado
            ->get();
        $transacciones = $publicaciones->merge($cotizaciones);
        //dd($transacciones);
        return view('entregas.index', [
            'transacciones' => $transacciones
        ]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('entregas.create');
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
        /*$entrega = \App\Entrega::find($id);
        return view('entregas.edit', compact('entrega', $entrega));
        */
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
        $entrega = \App\Entrega::find($id);
        $entrega->fill($request->all());
        $entrega->save();
        //Session::flash('mensaje', 'Entrega editado correctamente');
        return redirect('entrega')->with('mensaje', 'Entrega editada correctamente');
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
        /*
        \App\Entrega::destroy($id);
        return redirect('entrega')->with('mensaje', 'Entrega eliminada correctamente');
        */
    }
}
