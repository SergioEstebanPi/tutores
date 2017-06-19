<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    //
	protected $table = 'entregas';

    protected $fillable = ['user_id', 'publicacion_id', 'ruta', 'entrega', 'calificacion', 'descripcion'];
}
