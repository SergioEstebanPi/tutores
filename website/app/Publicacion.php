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

    protected $fillable = ['user_id'
               , 'categoria_id'
               , 'tipo_id'
               , 'area_id'
    					 , 'titulo'
    					 , 'estado'
    					 , 'entrega'
    					 , 'ruta'
               , 'descripcion'
               ];

    public function cotizacion(){
      return $this->hasMany('App\Cotizacion');
    }

    public function user(){
       return $this->belongsTo('App\User', 'user_id');
    }
}
