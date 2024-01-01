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
            $table->string('nomor_polisi');
            $table->bigInteger('tahun_pembuatan');
            $table->dateTime('tanggal_beli_sewa');
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
