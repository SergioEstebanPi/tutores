<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    //
	protected $table = 'puntuaciones';

    protected $fillable = ['user_id', 'valoracion_id', 'valor'];

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function valoracion(){
    	return $this->belongsTo('App\Valoracion', 'valoracion_id');
    }
}
