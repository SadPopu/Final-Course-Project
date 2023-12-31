<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_sells', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transactionType');
            $table->timestamps();
            $table->bigInteger('transactionAmount');
            $table->bigInteger('productID')->unsigned();
            $table->foreign('productID')->references('id')->on('products');
            $table->bigInteger('userID')->unsigned();
            $table->foreign('userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_sells');
    }
};
