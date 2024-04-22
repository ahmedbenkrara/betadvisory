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
        Schema::create('formationstudent', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('formation_id');
            $table->unsignedInteger('user_id');
            $table->string('phone');
            $table->string('cin');
            $table->foreign('formation_id')->references('id')->on('formation')->onDelete('cascade');
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
        Schema::dropIfExists('formationstudent');
    }
};
