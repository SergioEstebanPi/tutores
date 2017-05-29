<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Valoraciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('valoraciones', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre_valoracion');
            $table->integer('cantidad_valoracion');
            $table->string('descripcion_valoracion');
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
        Schema::drop('valoraciones');
    }
}
