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
            $table->integer('instituto_id')
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
