<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableHistorafour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){


        schema::table('historia', function (Blueprint $table){

            $table->foreign('usuario')->references('id')->on('users');

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
