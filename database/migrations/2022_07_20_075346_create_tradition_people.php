<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraditionPeople extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tradition_people', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->longText('posts');
            $table->string('src');
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->integer('display')->default('1');
            $table->integer('index');
            $table->string('author');
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
        Schema::dropIfExists('tradition_people');
    }
}
