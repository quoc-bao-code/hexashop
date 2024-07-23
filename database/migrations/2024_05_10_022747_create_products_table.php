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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iddm');
            $table->string('name');
            $table->string('img')->nullable();
            $table->foreign('iddm')->references('id')->on('categories')->onDelete('cascade');
            $table->decimal('price',8,2);
            $table->tinyInteger('hide');
            $table->tinyInteger('dacbiet');
            $table->integer('view');
            $table->tinyInteger('bestseller');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
