<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Tipo extends Model
{
    //
    protected $table = 'tipos';

    protected $fillable = ['nombre', 'descripcion'];


    public function trabajo()
    {
        return $this->hasOne('App\Tipo');
    }
}
