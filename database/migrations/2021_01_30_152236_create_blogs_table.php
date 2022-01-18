<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('image');
            $table->longText('description');
            $table->text('written_by')->nullable();
            $table->string('tags')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->enum('visibility', ['showed', 'hidden'])->default('showed')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}
