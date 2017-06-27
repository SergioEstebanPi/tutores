<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class CotizacionController extends Controller
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
        $cotizaciones = \App\Cotizacion::where(
            'user_id', '=', Auth::user()->id)
            ->paginate(10);
        return view('cotizaciones.index', [
            'cotizaciones' => $cotizaciones,
            'ruta' => 'mis_cotizaciones'
        ]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cotizaciones_por_publicacion($publicacion_id)
    {
        //
        $cotizaciones = \App\Cotizacion::where('publicacion_id', '=', $publicacion_id)
                ->paginate(10);
        return view('cotizaciones.index', [
            'cotizaciones' => $cotizaciones,
            'ruta' => 'por_publicacion'
        ]);
    }

    public function pagar_cotizacion($id){
        $cotizacion = \App\Cotizacion::find($id);
        $cotizacion->estado = 1;
        $cotizacion->save();
        // notificar al tutor del pago
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('cotizaciones.create');
    }

    public function cotizar_publicacion($id) {
        $publicacion = \App\Publicacion::find($id);
        return view('cotizaciones.create', [
            'publicacion' => $publicacion
        ]);
        // notificar al publicador de la nueva cotización
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // se crea la cotizacion
        \App\Cotizacion::create([
            'publicacion_id' => $request['publicacion_id'],
            'user_id' => Auth::user()->id,
            'estado' => 0,
            'precio' => $request['precio'],
            'inicio' => $request['inicio'],
            'fin' => $request['fin'],
            'descripcion' => $request['descripcion']
        ]);
        // se modifica el estado de la publicacion
        $publicacion = \App\Publicacion::find($request['publicacion_id']);
        $publicacion->estado = 1;
        $publicacion->save();

        return redirect('cotizacion')->with([
            'mensaje' => 'Cotización creada correctamente',
            'tipo' => 'success'
        ]);
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
        $cotizacion = \App\Cotizacion::find($id);
        return view('cotizaciones.show', compact('cotizacion', $cotizacion));
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
        $cotizacion = \App\Cotizacion::find($id);
        return view('cotizaciones.edit', [
            'cotizacion' => $cotizacion,
            'publicacion' => $cotizacion->publicacion
        ]);
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
        $user = \App\Cotizacion::find($id);
        $user->fill($request->all());
        $user->save();
        return redirect('cotizacion')->with([
            'mensaje' => 'Cotización editada correctamente',
            'tipo'  => 'success'
        ]);
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
        \App\Cotizacion::destroy($id);
        return redirect('cotizacion')->with([
            'mensaje' => 'Cotización eliminada correctamente',
            'tipo' => 'danger'
        ]);
    }
}
