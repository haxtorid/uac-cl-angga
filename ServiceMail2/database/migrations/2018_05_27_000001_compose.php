<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compose extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compose', function(Blueprint $table) {
            $table->increments('id');
            $table->string('Subject', 255);
            $table->text('Content');
            $table->dateTime('created_at');
        });

        Schema::table('compose', function(Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compose', function(Blueprint $table) {
            $table->dropForeign(['user_id']);   
        });
        Schema::dropIfExists('Compose');
    }
}
