<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTestimonialsTableForMoreFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('image');
            $table->string('designation');
            $table->string('rating');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testimonials', function (Blueprint $table) {
            //
        });
    }
}
