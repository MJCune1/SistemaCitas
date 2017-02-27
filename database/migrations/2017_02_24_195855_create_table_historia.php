<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('historia', function(Blueprint $table){

            $table->increments('id');
            $table->integer('usuario')->unsigned();
            $table->foreign('usuario')->references('id')->on('users');
            $table->integer('medico')->unsigned();
            $table->foreign('medico')->references('id')->on('users');
            $table->integer('recipe')->unsigned();
            $table->foreign('recipe')->references('id')->on('recipe');



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
    }
}
