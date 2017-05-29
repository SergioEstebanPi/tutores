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
    					 , 'titulo'
    					 , 'estado'
    					 , 'entrega'
    					 , 'ruta'
               , 'descripcion'
               ];
}
