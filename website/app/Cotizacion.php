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

    protected $fillable = ['id_publicacion'
              					 , 'id_user'
                         , 'precio'
              					 , 'estado'
              					 , 'inicio'
              					 , 'fin'
          			         , 'descripcion'
			              ];

    public function publicacion(){
       return $this->belongsTo('App\Publicacion', 'id_publicacion');
    }
}
