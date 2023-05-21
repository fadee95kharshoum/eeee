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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();

            $table->string('discount');
            $table->integer('price');

            // $table->unsignedBigInteger('payment_id');
            // $table->foreign('payment_id')->references('id')->on('payments')->cascadeOnDelete();

            $table->foreignId('payment_id')->constrained();
            $table->foreignId('for_sale_id')->constrained();
            // $table->unsignedBigInteger('for_sale_id');
            // $table->foreign('for_sale_id')->references('id')->on('for_sales')->constrai;

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
        Schema::dropIfExists('discounts');
    }
};
