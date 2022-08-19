<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('category')->nullable();
            $table->string('name_category')->nullable();
            $table->longText('content');
            $table->string('banner');
            $table->integer('is_video')->default(0);
            $table->string('address');
            $table->string('map')->nullable();
            $table->integer('price');
            $table->integer('price_2');
            $table->float('rating')->default(0);
            $table->float('rating_address')->default(0);
            $table->float('rating_price')->default(0);
            $table->float('rating_service')->default(0);
            $table->float('rating_toilet')->default(0);
            $table->float('rating_convenient')->default(0);
            $table->longText('rating_content')->nullable();
            $table->integer('created_by');
            $table->integer('active')->default(1);
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
        Schema::dropIfExists('hotel');
    }
}
