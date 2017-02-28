<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRecipeThree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('recipe', function(Blueprint $table){

            $table->dropColumn('status');

        });

        schema::table('recipe', function(Blueprint $table){

            $table->enum('status',['pendiente','entregado'])->default('pendiente');

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
