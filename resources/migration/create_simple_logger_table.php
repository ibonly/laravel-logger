<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimpleLoggerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('simple_logger'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('by');
            $table->text('description');
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->string('type')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop(config('laravelloger.table_name'));
    }
}