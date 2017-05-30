<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    //
	protected $table = 'formaciones';

    protected $fillable = ['id_instituto', 'nombre', 'certificado'];
}
