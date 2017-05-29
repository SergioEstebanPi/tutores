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
            $table->integer('id_publicacion')->unsigned();
            $table->foreign('id_publicacion')
                ->references('id')
                ->on('publicaciones');
            $table->integer('id_tutor')->unsigned();
            $table->foreign('id_tutor')
                ->references('id')
                ->on('tutores');
            $table->string('ruta_entrega');
            $table->date('fecha_entrega');
            $table->text('descripcion_entrega');
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
