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
                // se crea la entrega pendiente al tutor
        \App\Entrega::create([
            'cotizacion_id' => $request['cotizacion_id'],
            'user_id' => $request['user_id'],
            'ruta' => '',
            'calificacion' => $request['calificacion'],
            'descripcion' => $request['descripcion']
        ]);

        // se modifica al estado 2 - pendiente
        $cotizacion = \App\Cotizacion::find($id);
        $cotizacion->estado = 2;
        $cotizacion->save();

        // se modifica al estado 2 - en espera
        $publicacion = \App\Publicacion::find($cotizacion->publicacion_id);
        $publicacion->estado = 2;
        $publicacion->save();



        /*
        $cotizacion = \App\Cotizacion::find($id);
        // se cambia el estado a 1 - pagada
        $cotizacion->estado = 1;
        $cotizacion->save();

        // se cambia el estado de la publicacion para que no aparezca en la seccion de noticias
        $publicacion = \App\Publicacion::find($cotizacion->publicacion_id);
        // se cambia el estado de la publicacion a 2 - espera de entrega
        $publicacion->estado = 2;
        $publicacion->save();

        $entrega = \App\Entrega::create([
            'cotizacion_id' => $id,
            'user_id' => $cotizacion->user_id,
            'ruta' => '',
            'calificacion' => 0,
            'descripcion' => ''
        ]);
        */


        /* notificar al tutor del pago */

        return redirect()->to('/');

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
            'descripcion' => $request['descripcion']
        ]);
        // se modifica el estado de la publicacion
        $publicacion = \App\Publicacion::find($request['publicacion_id']);
        $publicacion->estado = 1;
        $publicacion->save();

        /* se debe notificar por correo al publicador y agregar la notificacion*/

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
        // se valida que el estado de la publicacion sea 0 - aceptada
        if($cotizacion->estado == 0){
            $cotizacion = \App\Cotizacion::find($id);
            $cotizacion->fill($request->all());
            $cotizacion->save();
            return redirect('cotizacion')->with([
                'mensaje' => 'Cotización editada correctamente',
                'tipo'  => 'success'
            ]);
        } else {
            return redirect('cotizacion')->with([
                'mensaje' => 'No es posible editar esta publicación',
                'tipo' => 'danger'
            ]);
        }
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
