<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_review', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('content');
            $table->string('banner');
            $table->integer('is_video')->default(1)->comment('1: img; 2: video');
            $table->integer('category_id');
            $table->string('category_name');
            $table->integer('category')->default(1)->comment('1: du lich; 2: booking; 3:am thuc; 4: gian hang');
            $table->string('img_1')->nullable();
            $table->longText('content_1')->nullable();
            $table->string('img_2')->nullable();
            $table->longText('content_2')->nullable();
            $table->longText('description');
            $table->string('video')->nullable();
            $table->longText('content_video')->nullable();
            $table->string('author');
            $table->integer('display')->default(1);
            $table->float('rating');
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
        Schema::dropIfExists('articles_review');
    }
}
