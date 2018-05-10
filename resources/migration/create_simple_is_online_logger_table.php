<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimpleIsOnlineLoggerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('simple_is_online_logger', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('simple_is_online_logger');
    }
}