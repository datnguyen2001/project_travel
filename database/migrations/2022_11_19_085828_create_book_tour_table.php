<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tour', function (Blueprint $table) {
            $table->id();
            $table->string('name_customer');
            $table->string('phone_customer');
            $table->string('email_customer')->nullable();
            $table->integer('tour_id')->nullable();
            $table->string('name_tour')->nullable();
            $table->string('phone_tour');
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
        Schema::dropIfExists('book_tour');
    }
}
