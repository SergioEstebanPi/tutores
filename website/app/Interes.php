<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interes extends Model
{
    //
	protected $table = 'intereses';

    protected $fillable = ['area_id', 'user_id', 'notificar'];
}
