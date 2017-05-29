<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tutores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tutores', function(Blueprint $table){
            $table->integer('id')->unsigned();
            $table->foreign('id')
                    ->references('id')
                    ->on('users');
            $table->integer('id_perfil')->unsigned();
            $table->foreign('id_perfil')
                ->references('id')
                ->on('perfiles');
            $table->integer('id_formacion')->unsigned();
            $table->foreign('id_formacion')
                ->references('id')
                ->on('formaciones');
            $table->string('nombre1_estudiante');
            $table->string('nombre2_estudiante');
            $table->string('apellido1_estudiante');
            $table->string('apellido2_estudiante');
            $table->string('telefono1_estudiante');
            $table->string('telefono2_estudiante');
            $table->string('foto_perfil');
            $table->string('descripcion_perfil');
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
        Schema::drop('tutores');
    }
}
