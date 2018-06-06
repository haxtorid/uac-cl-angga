<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSentBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sent_boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::table('sent_boxes', function (Blueprint $table) {
            $table->unsignedInteger('email_id');
            $table->unsignedInteger('user_id');
            $table->foreign('email_id')->references('id')->on('compose');
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
        Schema::table('sent_boxes', function (Blueprint $table) {
            $table->dropForeign(['email_id','user_id']);
        });
        Schema::dropIfExists('sent_boxes');
    }
}
