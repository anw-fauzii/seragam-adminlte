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
        Schema::create('seragam_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seragam_id');
            $table->string('ukuran');
            $table->integer('stok');
            $table->integer('harga')->nullable();
            $table->timestamps();

            $table->foreign('seragam_id')->references('id')->on('seragam');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seragam_detail');
    }
};
