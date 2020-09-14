<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.4 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.4 | https://it.phpanonymous.com]
class CreateCoursesGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('price');
            $table->bigInteger('sessions');
            $table->bigInteger('duration_num');
            $table->enum('duration_dis',['week','day']);
            $table->dateTime('strat_at')->nullable();
            $table->bigInteger('attends');
            $table->string('time');
            $table->bigInteger('course_id')->unsigned()->nullable();
			$table->softDeletes();
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
        Schema::dropIfExists('courses_groups');
    }
}