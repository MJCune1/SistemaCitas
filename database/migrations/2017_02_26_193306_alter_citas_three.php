<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCitasThree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('citas', function (Blueprint $table){

            $table->dropColumn('status');

        });


        schema::table('citas', function (Blueprint $table){

            $table->enum('status',['vista','pendiente'])->default('pendiente');

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
