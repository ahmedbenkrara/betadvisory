<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echangeorder', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('etude_id');
            $table->unsignedInteger('user_id');
            $table->string('file');
            $table->string('status');
            $table->foreign('etude_id')->references('id')->on('etude')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('echangeorder');
    }
};
