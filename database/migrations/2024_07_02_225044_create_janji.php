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
        Schema::create('janjis', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('masalah');
            $table->BigInteger('nomor');
            $table->datetime('tanggal');
            $table->text('keterangan');
            $table->string('status_pembayaran')->default('unpaid');
            $table->string('status_jadwal')->default('aktif');
            $table->bigInteger('price')->default(200000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('janji');
    }
};