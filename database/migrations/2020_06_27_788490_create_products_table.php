<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.4 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.4 | https://it.phpanonymous.com]
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('img')->nullable();
            $table->longtext('min_des')->nullable();
            $table->longtext('note')->nullable();
            $table->longtext('des')->nullable();
            $table->longtext('pdf_files')->nullable();
            $table->bigInteger('piece_price');
            $table->enum('type',['online','shipping']);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('features_workplace_img')->nullable();
            $table->longtext('features_workplace_des')->nullable();
            $table->longtext('examine_memorable_pdf')->nullable();
            $table->longtext('examine_memorable_des')->nullable();
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
        Schema::dropIfExists('products');
    }
}