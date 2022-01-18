<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterScrapYardAdvertisementsTableForTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scrap_yard_advertisements', function (Blueprint $table) {
            $table->string("title")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scrap_yard_advertisements', function (Blueprint $table) {
            //
        });
    }
}
