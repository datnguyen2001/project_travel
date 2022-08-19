<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_room', function (Blueprint $table) {
            $table->id();
            $table->string('name_customer');
            $table->string('phone_customer');
            $table->string('email_customer')->nullable();
            $table->integer('room_id')->nullable();
            $table->string('name_room')->nullable();
            $table->string('name_hotel');
            $table->string('phone_hotel');
            $table->integer('status')->default(0);
            $table->integer('type')->default(0);
            $table->longText('content')->nullable();
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
        Schema::dropIfExists('book_rom');
    }
}
