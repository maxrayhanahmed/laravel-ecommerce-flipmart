<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cus_email');
            $table->string('cus_name');
            $table->string('cus_phone');
            $table->string('cus_pass');
            $table->text('cus_address');
            $table->timestamps();
        });
    }

    /**
        $request->cus_email,
    $request->cus_name,
    $request->cus_phone,
    $request->cus_address,
    $request->cus_pass,
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
