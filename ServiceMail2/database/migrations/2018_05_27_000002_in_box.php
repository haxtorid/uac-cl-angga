<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InBox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox', function (Blueprint $table) {
            $table->increments('id');
            
        });

        Schema::table('inbox', function (Blueprint $table) {
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
        
        Schema::create('inbox', function (Blueprint $table) {
            $table->dropForeign(['email_id','user_id']);
        });
        Schema::dropIfExists('InBox');
        
    }
}
