<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    //
	protected $table = 'formaciones';

    protected $fillable = ['instituto_id', 'nombre', 'certificado'];

    public function user(){
      return $this->hasMany('App\User');
    }
}
