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
        Schema::create('project_technology', function (Blueprint $table) {

            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('technology_id');

            // creo le FOREIGN KEY
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
