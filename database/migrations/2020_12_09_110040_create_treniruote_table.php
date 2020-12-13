<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreniruoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treniruotes_tipas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> string('tipas');
        });

        Schema::create('treniruote', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pavadinimas');
            $table->date('data');
            $table->dateTime('laikas_nuo');
            $table->dateTime('laikas_iki');
            $table->bigInteger('tipas')->unsigned();
            $table->bigInteger('sales_id')->unsigned();
            $table->bigInteger('treneris_id')->unsigned();
        });

        Schema::table('treniruote', function($table) {
            $table->foreign('sales_id')->references('id')->on('sale')->onDelete('cascade');
            $table->foreign('tipas')->references('id')->on('treniruotes_tipas')->onDelete('cascade');
            $table->foreign('treneris_id')->references('id')->on('trainer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treniruotes_tipas');
        Schema::dropIfExists('treniruote');
    }
}
