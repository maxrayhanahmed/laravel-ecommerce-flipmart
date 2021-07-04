<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_infos', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('clientName');
            $table->string('clientPhone');
            $table->string('clientEmail');
            $table->string('clientDomain');
            $table->integer('package_id');
            $table->string('clientImage');
            $table->date('startingDate');
            $table->string('lastDate');
            $table->text('clientAddress');
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
        Schema::dropIfExists('client_infos');
    }
}
