<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments("id");
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->string("photo_url")->nullable();

            $table->unsignedInteger("user_id");
            $table->unsignedInteger('region_id');
            $table->unsignedInteger('category_id');

            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("posts");
    }
}
