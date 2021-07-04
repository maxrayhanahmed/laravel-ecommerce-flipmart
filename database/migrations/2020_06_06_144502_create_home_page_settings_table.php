<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomePageSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_slider');
            $table->integer('slider_limit');
            $table->boolean('is_new_product');
            $table->integer('new_product_limit');
            $table->boolean('is_featured_product');
            $table->integer('featured_product_limit');
            $table->boolean('is_bestSeller_product');
            $table->integer('bestSeller_product_limit');
            $table->boolean('is_blog_post');
            $table->integer('blog_post_limit');
            $table->boolean('is_newArrivals_product');
            $table->integer('newArrivals_product_limit');
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
        Schema::dropIfExists('home_page_settings');
    }
}
