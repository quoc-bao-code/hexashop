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
        Schema::create('bill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpro');
            $table->foreign('idpro')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('idorders');
            $table->foreign('idorders')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('price');
            $table->string('name');
            $table->string('img');
            $table->integer('soluong');
            $table->integer('thanhtien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill');
    }
};
