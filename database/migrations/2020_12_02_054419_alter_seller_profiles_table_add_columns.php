<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSellerProfilesTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_profiles', function (Blueprint $table) {
            $table->string('phone', 16)->nullable();
            $table->string('picture')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('address', 255)->nullable();
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
            $table->dropColumn('phone');
            $table->dropColumn('picture');
            $table->dropColumn('gender');
            $table->dropColumn('address');

        });
    }
}
