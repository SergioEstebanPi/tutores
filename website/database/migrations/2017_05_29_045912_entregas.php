<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Entregas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('entregas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('cotizacion_id')->unsigned();
            $table->foreign('cotizacion_id')
                ->references('id')
                ->on('cotizaciones');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->string('ruta');
            $table->integer('calificacion');
            $table->text('descripcion');
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
        Schema::drop('entregas');
    }
}
