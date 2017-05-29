<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
  *  @CREATED_BY spina
  *  @DATE_CREATED 28/05/2017
  *
  */
class Trabajos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('trabajos', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')
                  ->references('id')
                  ->on('tipos');
            $table->integer('id_categoria')->unsigned();
            $table->foreign('id_categoria')
                  ->references('id')
                  ->on('categorias');
            $table->integer('id_area')->unsigned();
            $table->foreign('id_area')
                  ->references('id')
                  ->on('areas');
            $table->string('titulo_trabajo');
            $table->string('ruta_trabajo');
            $table->string('descripcion_trabajo');
            $table->integer('estado_trabajo');
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
        Schema::drop('trabajos');
    }
}
