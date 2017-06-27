<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 29/05/2017
  *
  */
class Cotizacion extends Model
{
    //    
    protected $table = 'cotizaciones';

    protected $fillable = ['publicacion_id'
              					 , 'user_id'
                         , 'precio'
              					 , 'estado'
              					 , 'fin'
          			         , 'descripcion'
			              ];

    public function publicacion(){
       return $this->belongsTo('App\Publicacion', 'publicacion_id');
    }

    public function user(){
       return $this->belongsTo('App\User', 'user_id');
    }
}
