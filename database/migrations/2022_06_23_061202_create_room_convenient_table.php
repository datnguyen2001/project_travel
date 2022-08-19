<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomConvenientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_convenient', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('convenient_id');
            $table->string('name_convenient');
            $table->string('icon_convenient');
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
        Schema::dropIfExists('room_convenient');
    }
}
