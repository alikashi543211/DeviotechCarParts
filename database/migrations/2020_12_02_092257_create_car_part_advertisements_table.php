<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarPartAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_part_advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('car_make');
            $table->string('model_year');
            $table->string('car_trim');
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->onDelete('cascade');
            $table->foreignId('sub_category_id')->references('id')->on('sub_categories')->constrained()->onDelete('cascade');
            $table->longText('description');
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
        Schema::dropIfExists('car_part_advertisements');
    }
}
