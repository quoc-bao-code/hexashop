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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->string('madh');
            $table->string('nguoidat_ten');
            $table->string('nguoidat_email');
            $table->string('nguoidat_tel');
            $table->string('nguoidat_diachi');
            $table->string('nguoinhan_ten');
            $table->string('nguoinhan_tel');
            $table->string('nguoinhan_diachi');
            $table->integer('total');
            $table->integer('ship');
            $table->integer('voucher');
            $table->integer('tongthanhtoan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
