<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->enum('subscription_type', ['1', '2', '3'])->comment('1. Car Parts advertisement 2. ScrapeYard Car Advertisement 3. Ultimate Advertisement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            //
        });
    }
}
