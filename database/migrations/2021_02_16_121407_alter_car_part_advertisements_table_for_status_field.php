<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarPartAdvertisementsTableForStatusField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_part_advertisements', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->enum('status',['1','2','3','4'])
                ->comment("1 For Pending , 2 For Active , 3 For Sold , 4 For Reserved")
                ->default('2');
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
