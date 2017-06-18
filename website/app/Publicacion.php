<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Publicacion extends Model
{
    //    
    protected $table = 'publicaciones';

    protected $fillable = ['id_user'
               , 'id_categoria'
               , 'id_tipo'
               , 'id_area'
    					 , 'titulo'
    					 , 'estado'
    					 , 'entrega'
    					 , 'ruta'
               , 'descripcion'
               ];

    public function cotizacion(){
      return $this->hasMany('App\Cotizacion');
    }
}
