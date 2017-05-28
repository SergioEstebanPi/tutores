<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{

	use Authenticatable, CanResetPassword;
    //
    protected $table = 'estudiantes';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribut($valor){
    	if(!empty($valor)){
    		$this->attributes['password'] = \Hash::make($valor);
    	}
    }
}
