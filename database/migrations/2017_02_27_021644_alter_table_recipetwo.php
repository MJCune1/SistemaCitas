<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableRecipetwo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('recipe', function (Blueprint $table){

            $table->timestamps();
            $table->integer('historia_id')->unsigned();
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
        schema::dropIfExists('recipe');
        schema::dropForeign('recipe_historia_foreign');
    }
}
