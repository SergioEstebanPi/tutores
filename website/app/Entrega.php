<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    //
	protected $table = 'entregas';

    protected $fillable = ['id_user', 'id_publicacion', 'ruta', 'entrega', 'calificacion', 'descripcion'];
}
