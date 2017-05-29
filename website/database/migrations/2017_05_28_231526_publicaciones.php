<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Publicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('publicaciones', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_estudiante')->unsigned();
            $table->foreign('id_estudiante')
                    ->references('id')
                    ->on('estudiantes');
            $table->integer('id_trabajo')->unsigned();
            $table->foreign('id_trabajo')
                    ->references('id')
                    ->on('trabajos');
            $table->integer('estado_publicacion');
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_fin');
            $table->string('formato_solicitado');
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
        Schema::drop('publicaciones');
    }
}
