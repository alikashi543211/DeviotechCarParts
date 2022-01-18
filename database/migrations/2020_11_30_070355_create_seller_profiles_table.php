<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->enum('subscription_type', ['1', '2', '3'])->comment('1. Car Parts advertisement 2. Scrapeyarded Car Advertisement 3. Ultimate Advertisement')->nullable();
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
        Schema::dropIfExists('seller_profiles');
    }
}
