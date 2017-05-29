<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Perfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('perfiles', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_areas')->unsigned();
            $table->foreign('id_areas')
                ->references('id')
                ->on('areas');
            $table->integer('id_formacion')->unsigned();
            $table->foreign('id_formacion')
                ->references('id')
                ->on('formaciones');
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
        Schema::drop('perfiles');
    }
}
