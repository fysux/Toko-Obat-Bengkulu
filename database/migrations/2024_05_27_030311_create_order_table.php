<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id('orderID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('productID');
            $table->integer('qty');
            $table->float('total');
            $table->string('jasakirim');
            $table->enum('status', ['pending', 'success']);
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('user');
            $table->foreign('productID')->references('productID')->on('product')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
