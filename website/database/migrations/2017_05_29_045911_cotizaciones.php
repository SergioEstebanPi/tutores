<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cotizaciones', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('publicacion_id')->unsigned();
            $table->foreign('publicacion_id')
                ->references('id')
                ->on('publicaciones');
            $table->integer('precio');
            $table->integer('estado');
            $table->text('descripcion')->nullable();
            $table->text('ruta_entrega')->nullable();
            $table->date('fecha_entrega');
            $table->integer('calificacion');
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
        Schema::drop('cotizaciones');
    }
}
