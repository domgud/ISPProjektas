<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrekeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preke', function (Blueprint $table) {
            $table->id();
            $table->string('pavadinimas');
            $table->float('kaina');
            $table->date('galioja_iki_data')->nullable();
            $table->string('gamintojas');
            $table->string('aprasymas', 500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preke');
    }
}
