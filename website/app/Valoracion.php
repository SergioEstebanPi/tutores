<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    //
	protected $table = 'valoraciones';

    protected $fillable = ['nombre', 'cantidad_min', 'cantidad_max', 'descripcion'];

    public function puntuacion(){
    	return $this->hasMany('App\Puntuacion');
    }
}
