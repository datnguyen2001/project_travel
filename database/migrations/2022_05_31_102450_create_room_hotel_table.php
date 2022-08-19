<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_hotel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('banner');
            $table->boolean('is_video')->default(1);
            $table->integer('hotel_id');
            $table->string('name_hotel');
            $table->integer('price');
            $table->integer('price_2');
            $table->boolean('elevator')->default(1);
            $table->boolean('balcony')->default(1);
            $table->boolean('smoking')->default(1);
            $table->boolean('air_conditional')->default(1);
            $table->boolean('garden')->default(1);
            $table->boolean('free_parking')->default(1);
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
        Schema::dropIfExists('room_hotel');
    }
}
