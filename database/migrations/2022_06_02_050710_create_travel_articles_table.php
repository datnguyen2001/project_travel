<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('banner');
            $table->integer('category');
            $table->string('name_category');
            $table->integer('is_video')->default(0);
            $table->longText('content');
            $table->longText('content_img');
            $table->string('video_review');
            $table->longText('content_video');
            $table->float('rating')->nullable();
            $table->integer('layout')->default(1);
            $table->integer('created_by');
            $table->integer('index')->nullable();
            $table->integer('display')->default(1);
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
        Schema::dropIfExists('travel_articles');
    }
}
