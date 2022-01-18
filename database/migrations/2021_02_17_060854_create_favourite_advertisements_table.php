<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->foreignId('car_part_advertisement_id')->nullable()->references('id')->on('car_part_advertisements')->constrained()->onDelete('cascade');
            $table->foreignId('scrap_yard_advertisement_id')->nullable()->references('id')->on('scrap_yard_advertisements')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('favourite_advertisements');
    }
}
