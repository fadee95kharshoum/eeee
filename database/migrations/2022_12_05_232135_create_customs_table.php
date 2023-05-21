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
        Schema::create('customs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->foreign('card_id')->references('id')->on('cards');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            //القيمة المدخلة من قبل الزبون التي سوف تضرب في سعر المخصص في النوع
            $table->float('value');
            //السعر دائما يضرب في سعر ال custom
            $table->float('price');

            //paypal
            $table->string('link')->nullable();
            $table->string('email')->nullable();

            //Payyer And USDT
            $table->string('path')->nullable();
            $table->string('transaction_number')->nullable();

            $table->enum('status', ['Pendding', 'Approved', 'Rejected', 'Selected'])->default('Pendding');

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
        Schema::dropIfExists('customs');
    }
};
