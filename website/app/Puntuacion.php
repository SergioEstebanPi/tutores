<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    //
	protected $table = 'puntuaciones';

    protected $fillable = ['user_id', 'valoracion_id'];
}
