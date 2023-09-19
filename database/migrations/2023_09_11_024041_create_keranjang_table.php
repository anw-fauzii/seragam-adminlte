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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seragam_detail_id');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->string('catatan')->nullable();
            $table->string('ip_pelanggan');
            $table->timestamps();

            $table->foreign('seragam_detail_id')->references('id')->on('seragam_detail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keranjang');
    }
};
