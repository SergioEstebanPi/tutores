<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Trabajo extends Model
{
    //
    protected $table = 'trabajos';

    protected $fillable = ['id_tipo', 'titulo_trabajo', 'ruta_trabajo', 'descripcion_trabajo', 'estado_trabajo'];

}
