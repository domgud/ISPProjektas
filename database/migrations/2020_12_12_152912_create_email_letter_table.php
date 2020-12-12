<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('el_laiskas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('sukurimo_data');
            $table->string('tekstas');
            $table->string('adresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('el_laiskas');
    }
}
