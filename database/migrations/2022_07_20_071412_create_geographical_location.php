<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeographicalLocation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geographical_location', function (Blueprint $table) {
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
        Schema::dropIfExists('geographical_location');
    }
}
