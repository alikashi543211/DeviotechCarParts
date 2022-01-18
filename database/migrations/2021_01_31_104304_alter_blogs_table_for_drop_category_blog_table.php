<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBlogsTableForDropCategoryBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            Schema::dropIfExists('blog_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            //
        });
    }
}
