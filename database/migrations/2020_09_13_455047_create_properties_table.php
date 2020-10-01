<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.4 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.4 | https://it.phpanonymous.com]
class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longtext('des');
            $table->string('photo');
            $table->bigInteger('rooms')->nullable();
            $table->bigInteger('wc')->nullable();
            $table->string('space')->nullable();
            $table->string('address')->nullable();
            $table->enum('type', ['Rental', 'Sale', 'Poth']);
            $table->bigInteger('place_id')->unsigned()->nullable();
            // $table->foreign('place_id')->references('id')->on('places');
            $table->string('badge')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
