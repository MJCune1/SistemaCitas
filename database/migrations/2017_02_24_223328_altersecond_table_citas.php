<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AltersecondTableCitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('citas', function (Blueprint $table){

        $table->dropColumn('medico');

    });


        schema::table('citas', function (Blueprint $table){

            $table->integer('medico')->unsigned();
            $table->foreign('medico')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        schema::dropifExists('citas');
    }
}
