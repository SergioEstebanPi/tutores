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
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
            $table->integer('id_publicacion')->unsigned();
            $table->foreign('id_publicacion')
                ->references('id')
                ->on('publicaciones');
            $table->integer('precio');
            $table->integer('estado');
            $table->date('inicio');
            $table->date('fin');
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
        Schema::drop('cotizaciones');
    }
}
