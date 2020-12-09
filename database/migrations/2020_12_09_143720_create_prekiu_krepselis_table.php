<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrekiuKrepselisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prekiu_krepselis', function (Blueprint $table) {
            $table->id();
            $table->float('suma');
            $table->integer('uzsakymo_nr');
            $table->bigInteger('naudotojo_id')->unsigned();
            $table->foreign('naudotojo_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prekiu_krepselis');
    }
}
