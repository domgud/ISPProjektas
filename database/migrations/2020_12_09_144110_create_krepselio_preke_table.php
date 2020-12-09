<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrepselioPrekeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krepselio_preke', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('krepselio_id')->unsigned();
            $table->bigInteger('prekes_id')->unsigned();

            $table->foreign('krepselio_id')->references('id')->on('prekiu_krepselis')->onDelete('cascade');
            $table->foreign('prekes_id')->references('id')->on('preke')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('krepselio_preke');
    }
}
