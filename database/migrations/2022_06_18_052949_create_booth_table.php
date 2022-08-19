<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoothTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booth', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('content');
            $table->string('banner');
            $table->text('description');
            $table->string('video_review')->nullable();
            $table->string('menu')->nullable();
            $table->integer('category_booth')->nullable();
            $table->string('name_category')->nullable();
            $table->integer('video_active')->default(0);
            $table->integer('is_active')->default(1);
            $table->integer('price');
            $table->integer('price_2');
            $table->float('ratings');
            $table->integer('created_by');
            $table->integer('type')->default(1)->comment('1: Top dac san; 2: An gi');
            $table->string('address');
            $table->string('map')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::dropIfExists('booth');
    }
}
