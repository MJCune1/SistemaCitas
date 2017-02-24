<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRecipe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        schema::create('recipe', function (Blueprint $table){
            $table->increments('id');
            $table->integer('paciente')->unsigned();
            $table->foreign('paciente')->references('id')->on('users');
            $table->integer('doctor')->references('id')->on('users');
            $table->text('observaciones');
            $table->string('medicina_1')->nullable();
            $table->string('medicina_2')->nullable();
            $table->string('medicina_3')->nullable();



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
