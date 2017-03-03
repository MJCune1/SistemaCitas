<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableCitasix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        schema::table('citas', function(Blueprint $table){
            $table->integer('historia_id')->unsigned()->default(1);
            $table->foreign('historia_id')->references('id')->on('historia');


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
