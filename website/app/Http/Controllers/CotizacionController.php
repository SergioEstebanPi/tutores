<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;
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
        $publicacion = \App\Publicacion::find($publicacion_id);
        return view('cotizaciones.index', [
            'cotizaciones' => $cotizaciones,
            'ruta' => 'por_publicacion',
            'publicacion' => $publicacion
        ]);
    }

    public function pagar_cotizacion($id){
        // se crea la entrega pendiente al tutor
        $cotizacion = \App\Cotizacion::find($id);
        if($cotizacion->estado == 0){
            // se modifica al estado 1 - aceptada/pagada
            $cotizacion->estado = 1;
            $cotizacion->save();

            // se modifica al estado 2 - en espera del trabajo
            $publicacion = \App\Publicacion::find($cotizacion->publicacion_id);
            $publicacion->estado = 2;
            $publicacion->save();
         
            return redirect('publicacion')->with([
                'mensaje' => 'Pago realizado correctamente',
                'tipo'  => 'success'
            ]);
        } else {
            return redirect('publicacion')->with([
                'mensaje' => 'No es posible realizar el pago a esta publicación',
                'tipo' => 'danger'
            ]);
        }

        /* notificar al tutor del pago */
        /* redirigir a la seccion "Mis Transacciones" */

        return redirect()->to('/transaccion');

    }

    public function crear_entrega(Request $request){
        // 
        $cotizacion = \App\Cotizacion::find($request['id']);
        if($cotizacion->estado == 1){

            //obtenemos el campo file definido en el formulario
            $file = $request->file('ruta_entrega');
            //obtenemos el nombre del archivo
            $nombre = $file->getClientOriginalName();
            //indicamos que queremos guardar un nuevo archivo en el disco local
            \Storage::disk('local')->put(Auth::user()->email . '/cotizaciones/' . $cotizacion->id . '/' . $nombre,  \File::get($file));
            // se modifica al estado 2 - trabajo entregado
            $cotizacion->estado = 2;
            $cotizacion->ruta_entrega = $nombre;
            $cotizacion->fecha_entrega = new \DateTime();
            $cotizacion->save();

            // se modifica al estado 3 - trabajo entregado
            $publicacion = \App\Publicacion::find($cotizacion->publicacion_id);
            $publicacion->estado = 3;
            $publicacion->save();


            //hacer pago al tutor 
         
            return redirect('cotizacion')->with([
                'mensaje' => 'Entrega realizada correctamente',
                'tipo'  => 'success'
            ]);
        } else {
            return redirect('cotizacion')->with([
                'mensaje' => 'No es posible entregar este trabajo no ha sido pagado',
                'tipo' => 'danger'
            ]);
        }

        /* notificar al estudiante del envio */
        /* puntuar al tutor y notificar */
        /* redirigir a la seccion "Mis Transacciones" */

        //return redirect()->to('/');

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

    public function conversor_monedas($moneda_origen,$moneda_destino,$cantidad) {
        $get = file_get_contents("https://www.google.com/finance/converter?a=$cantidad&from=$moneda_origen&to=$moneda_destino");
        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);  
        return preg_replace("/[^0-9\.]/", null, $get[0]);
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
            'tipo' => 'success',
            'publicacion' => $publicacion
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
        $extensioncotizacion = File::extension($cotizacion->ruta_entrega);
        $extensionpublicacion = File::extension($cotizacion->publicacion->ruta);
        return view('cotizaciones.show', [
          'cotizacion' => $cotizacion,
          'extensioncotizacion' => $extensioncotizacion,
          'extensionpublicacion' => $extensionpublicacion
        ]);
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
        $cotizacion = \App\Cotizacion::find($id);
        if($cotizacion->estado == 0){
            $cotizacion->fill($request->all());
            $cotizacion->save();
            return redirect('cotizacion')->with([
                'mensaje' => 'Cotización editada correctamente',
                'tipo'  => 'success',
                'publicacion' => $cotizacion->publicacion
            ]);
        } else {
            return redirect('cotizacion')->with([
                'mensaje' => 'No es posible editar esta publicación',
                'tipo' => 'danger',
                'publicacion' => $cotizacion->publicacion
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

    /* se descargan los archivos de entregas con la solución del trabajo solo 
      es visible para las dos partes del intercambio
    */
    public function download($id){
        //C:\Users\Usuario\Documents\TUTORES\tutores\website\storage\app\storage
        //return "";
        $cotizacion = \App\Cotizacion::find($id);
        $url = storage_path() . '/app/storage/' . $cotizacion->user->email . '/cotizaciones/' . $id . '/' . $cotizacion->ruta_entrega;
        //verificamos si el archivo existe y lo retornamos
        //dd($url);
        //return $url;

        //$cotizacion = \App\Cotizacion::find($id);
        $publicacion = \App\Publicacion::find($cotizacion->publicacion_id);

        // se verifica si la entrega la hizo el usuario con sesion abierta
        // o si el trabajo entregado lo compra el usuario con sesion abierta
        if ($cotizacion->user_id == Auth::user()->id 
            || $publicacion->user_id == Auth::user()->id) {

          if (file_exists($url)) { 
            return response()->download($url);
          }            

        }
        
        /*
        if (\Storage::exists($archivo))
        {
            $ext = pathinfo($url, PATHINFO_EXTENSION);
            return response()->download($url);
        }
        */
        //si no se encuentra lanzamos un error 404.
        abort(404);
    }
}
