<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreorderhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeorderhistory', function (Blueprint $table) {
            $table->id();
            $table->integer('orderid');
            $table->string('productname');
            $table->integer('price');
            $table->integer('total');
            $table->string('promotion');
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
        Schema::dropIfExists('storeorderhistory');
    }
}
