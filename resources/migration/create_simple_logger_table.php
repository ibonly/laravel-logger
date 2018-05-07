<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggerTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create(config('laravelSimpleLoger.table_name'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('by');
            $table->text('description');
            $table->integer('url')->nullable();
            $table->string('method')->nullable();
            $table->string('type')->nullable();
            $table->integer('ip')->nullable();
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