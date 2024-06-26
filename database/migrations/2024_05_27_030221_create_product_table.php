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
        Schema::create('product', function (Blueprint $table) {
            $table->id('productID');
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->float('price');
            $table->integer('qty');
            $table->unsignedBigInteger('userMasterID');
            $table->timestamps();

            $table->foreign('userMasterID')->references('userMasterID')->on('usermaster')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
