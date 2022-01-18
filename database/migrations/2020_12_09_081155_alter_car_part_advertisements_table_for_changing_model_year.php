<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarPartAdvertisementsTableForChangingModelYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_part_advertisements', function (Blueprint $table) {
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
        Schema::table('car_part_advertisements', function (Blueprint $table) {
            //
        });
    }
}
