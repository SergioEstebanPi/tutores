<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Estudiantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('estudiantes', function(Blueprint $table){
            $table->integer('id')->unsigned();
            $table->foreign('id')
                    ->references('id')
                    ->on('users');
            $table->string('nombre1_estudiante');
            $table->string('nombre2_estudiante');
            $table->string('apellido1_estudiante');
            $table->string('apellido2_estudiante');
            $table->string('telefono1_estudiante');
            $table->string('telefono2_estudiante');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('estudiantes');
    }
}
