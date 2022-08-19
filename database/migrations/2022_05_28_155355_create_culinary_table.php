<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulinaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('culinary', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('content');
            $table->string('banner');
            $table->text('description');
            $table->string('video_review')->nullable();
            $table->string('menu')->nullable();
            $table->integer('category_culinary')->nullable();
            $table->string('name_category')->nullable();
            $table->integer('video_active')->default(0);
            $table->integer('is_active')->default(1);
            $table->integer('price');
            $table->integer('price_2');
            $table->float('ratings');
            $table->integer('created_by');
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
        Schema::dropIfExists('culinary');
    }
}
