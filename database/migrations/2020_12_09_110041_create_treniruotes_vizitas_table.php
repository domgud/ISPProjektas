<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreniruotesVizitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treniruotes_vizitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('sukurimo_data');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('treniruote_id')->unsigned();
        });

        Schema::table('treniruotes_vizitas', function($table) {
            $table->foreign('client_id')->references('id')->on('client')->onDelete('cascade');
            $table->foreign('treniruote_id')->references('id')->on('treniruote')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treniruotes_vizitas');
    }
}
