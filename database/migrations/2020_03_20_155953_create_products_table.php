<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('category_id')->nullable();
            $table->string('tag')->nullable();
            $table->float('price')->nullable();
            $table->text('description')->nullable();
            $table->integer('quantity');
            $table->string('type')->nullable();
            $table->integer('brand_id')->default('1');
            $table->unsignedInteger('views')->default('0');
            $table->boolean('publication_status');
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
        Schema::dropIfExists('products');
    }
}
