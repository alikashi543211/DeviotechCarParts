<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSellerProfilesForAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_profiles', function (Blueprint $table) {
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip_code', 50)->nullable();
            $table->enum('terms_accept', ['0', '1'])->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_profiles', function (Blueprint $table) {
            //
        });
    }
}
