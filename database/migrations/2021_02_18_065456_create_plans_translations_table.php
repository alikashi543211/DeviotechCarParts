<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale')->index();
            
            $table->string('name');
            $table->string('description');

            $table->unique(['plan_id', 'locale']);
            $table->foreignId('plan_id')->references('id')->on('plans')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('plans_translations');
    }
}
