<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableIntroduce extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_introduce', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
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
        Schema::dropIfExists('table_introduce');
    }
}
