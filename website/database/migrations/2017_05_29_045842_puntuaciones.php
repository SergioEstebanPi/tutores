<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Puntuaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('puntuaciones', function(Blueprint $table){
            $table->integer('id_tutor')->unsigned();
            $table->foreign('id_tutor')
                ->references('id')
                ->on('tutores');
            $table->integer('id_valoracion')->unsigned();
            $table->foreign('id_valoracion')
                ->references('id')
                ->on('valoraciones');
            $table->date('fecha_puntuacion');
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
        Schema::drop('puntuaciones');
    }
}
