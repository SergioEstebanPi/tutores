<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Areas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('areas', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_area')->unsigned();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::table('areas', function(Blueprint $table){
            $table->foreign('id_area')
                    ->references('id')
                    ->on('areas');
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
        Schema::drop('areas');
    }
}
