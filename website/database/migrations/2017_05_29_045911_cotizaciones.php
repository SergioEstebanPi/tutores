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
            $table->integer('id_tutor')->unsigned();
            $table->foreign('id_tutor')
                ->references('id')
                ->on('tutores');
            $table->integer('id_publicacion')->unsigned();
            $table->foreign('id_publicacion')
                ->references('id')
                ->on('publicaciones');
            $table->integer('precio_cotizacion');
            $table->integer('estado_cotizacion');
            $table->date('inicio_cotizacion');
            $table->date('fin_cotizacion');
            $table->text('descripcion_cotizacion');
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
