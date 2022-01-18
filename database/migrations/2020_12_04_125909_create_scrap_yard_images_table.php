<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapYardImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrap_yard_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scrap_yard_advertisement_id')->references('id')->on('scrap_yard_advertisements')->constrained()->onDelete('cascade');
            $table->string('image');
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
        Schema::dropIfExists('scrap_yard_images');
    }
}
