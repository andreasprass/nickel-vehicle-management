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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kendaraan');
            $table->string('jenis_kendaraan');
            $table->tinyInteger('nomor_polisi');
            $table->tinyInteger('tahun_pembuatan');
            $table->tinyInteger('tanggal_beli/sewa');
            // Hak milik / sewa
            $table->tinyInteger('status_kendaraan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
