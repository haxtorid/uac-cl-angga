<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link', 255);
            $table->string('filename', 255);
            $table->timestamps();
        });

        
        Schema::table('attachments', function (Blueprint $table) {
            $table->unsignedInteger('email_id');
            $table->foreign('email_id')->references('id')->on('compose');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('attachments', function(Blueprint $table) {
            $table->dropForeign(['email_id']);
        });
        
        Schema::dropIfExists('attachments');
    }
}
