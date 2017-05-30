<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Formaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('formaciones', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_instituto')
                    ->unsigned()
                    ->nullable();
            $table->string('nombre');
            $table->boolean('certificado');
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
        Schema::drop('formaciones');
    }
}
