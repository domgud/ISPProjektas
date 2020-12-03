<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SpecificRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table-> string('name');

        });
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> date('work_start');
            $table -> date('end_work');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
        });
        Schema::table('admin', function($table) {
            $table->foreign('state_id')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('trainer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> dateTime('work_start');
            $table -> dateTime('end_work');
            $table->bigInteger('state_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('experience');
            $table->boolean('is_private');
        });
        Schema::table('trainer', function($table) {
            $table->foreign('state_id')->references('id')->on('state')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::create('client', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('created_date');
            $table->bigInteger('user_id')->unsigned();
        });
        Schema::table('client', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trainer', function($table) {
            $table-> dropForeign('trainer_state_id_foreign');
            $table-> dropForeign('trainer_user_id_foreign');

        });
        Schema::table('admin', function($table) {
            $table-> dropForeign('admin_state_id_foreign');
            $table-> dropForeign('admin_user_id_foreign');

        });
        Schema::table('client', function($table) {
            $table-> dropForeign('client_user_id_foreign');

        });
        Schema::dropIfExists('trainer');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('client');
    }
}
