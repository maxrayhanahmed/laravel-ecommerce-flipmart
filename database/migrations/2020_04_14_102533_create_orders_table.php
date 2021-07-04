<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
           

            $table->unsignedInteger('user_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->unsignedInteger('payment_id')->nullable();
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('name');
            $table->text('shipping_address')->nullable();
            $table->string('reference_id')->nullable();
            $table->float('shipping_cost')->default(0);
            $table->float('discount')->default(0);
            
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
