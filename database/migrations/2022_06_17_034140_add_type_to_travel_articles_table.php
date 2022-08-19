<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToTravelArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travel_articles', function (Blueprint $table) {
            $table->integer('type')->default(1)->comment('1:home, 2:booking, 3:culinary, 4:gian hang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travel_articles', function (Blueprint $table) {
            //
        });
    }
}
