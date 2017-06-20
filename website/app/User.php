<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alias', 'foto', 'name', 'email', 'password', 'formacion_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function publicacion(){
      return $this->hasMany('App\Publicacion');
    }

    public function cotizacion(){
      return $this->hasMany('App\Cotizacion');
    }

    public function formacion(){
       return $this->belongsTo('App\Formacion', 'formacion_id');
    }

    public function puntuacion(){
        return $this->hasMany('App\Puntuacion');
    }
}
