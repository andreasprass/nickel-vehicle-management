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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_driver');
            $table->foreignId('id_kendaraan');
            $table->string('keperluan');
            $table->dateTime('waktu_penggunaan');
            $table->dateTime('waktu_pengembalian')->nullable();
            $table->foreignId('penyetuju1');
            // 0 menunggu - 1 disetujui
            $table->tinyInteger('status_persetujuan1')->default(0);
            $table->foreignId('penyetuju2');
            // 0 menunggu - 1 disetujui
            $table->tinyInteger('status_persetujuan2')->default(0);
            $table->bigInteger('km_awal');
            $table->bigInteger('km_akhir')->nullable();
            $table->bigInteger('bbm')->nullable();
            $table->bigInteger('konsumsi_bbm')->nullable();
            $table->foreignId('id_user');
            // 0 peminjaman - 1 selesai
            $table->tinyInteger('status_pemesanan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
