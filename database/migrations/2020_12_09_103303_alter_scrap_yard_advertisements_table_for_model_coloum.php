<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterScrapYardAdvertisementsTableForModelColoum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scrap_yard_advertisements', function (Blueprint $table) {
            $table->dropColumn('model_year_id');
            $table->integer('car_model_id');
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
