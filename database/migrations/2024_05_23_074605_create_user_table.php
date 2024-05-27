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
        Schema::create('user', function (Blueprint $table) {
            $table->id('userID');
            $table->string('foto')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->bigInteger('noHp')->unique()->nullable();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('usermaster', function (Blueprint $table) {
            $table->id('userMasterID');
            $table->enum('role', ['dokter', 'apoteker']);
            $table->string('name');
            $table->unsignedBigInteger('userID');
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('usermaster');
    }
};
