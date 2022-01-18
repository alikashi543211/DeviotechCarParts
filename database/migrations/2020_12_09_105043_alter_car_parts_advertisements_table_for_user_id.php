<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCarPartsAdvertisementsTableForUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_part_advertisements', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
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
