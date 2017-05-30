<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    //
	protected $table = 'intereses';

    protected $fillable = ['id_area', 'id_user', 'notificar'];
}
