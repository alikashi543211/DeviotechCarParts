<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarPartAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `car_part_advertisements` CHANGE `car_make` `car_make_id` INT(8) NOT NULL;");

        DB::statement("ALTER TABLE `car_part_advertisements` CHANGE `model_year` `model_year_id` INT(8) NOT NULL;");

        DB::statement("ALTER TABLE `car_part_advertisements` CHANGE `car_trim` `car_trim_id` INT(8) NOT NULL;");
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
