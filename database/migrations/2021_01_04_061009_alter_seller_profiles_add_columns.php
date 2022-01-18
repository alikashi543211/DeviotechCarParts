<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSellerProfilesAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_profiles', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->string('street_address');
            $table->string('company_name')->nullable();
            $table->string('house_number');
            $table->string('extension')->nullable();
            $table->boolean('subscribe_newsletter')->default(false);
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
            $table->integer('address');
            Schema::dropIfExists('seller_profiles');
        });
    }
}
