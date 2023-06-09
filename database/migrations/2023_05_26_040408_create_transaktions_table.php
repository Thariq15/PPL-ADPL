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
        Schema::create('transaktions', function (Blueprint $table) {
            $table->id();
            $table->string('buyer');
            $table->enum('status', ['deliver', 'done', 'proccess', 'cancel'])->default('proccess');
            $table->enum('status_rekap', ['sudah', 'belum'])->default('belum');
            $table->enum('role', ['Admin Kopi', 'Admin Caffe']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaktions');
    }
};
