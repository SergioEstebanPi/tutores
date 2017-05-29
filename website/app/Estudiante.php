<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Estudiante extends Model
{

	use Authenticatable, CanResetPassword;
    //
    protected $table = 'estudiantes';

    protected $fillable = ['nombre1_estudiante', 'nombre2_estudiante', 'apellido1_estudiante', 'telefono1_estudiante', 'telefono2_estudiante'];

}
