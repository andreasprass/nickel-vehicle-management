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
            $table->dateTime('waktu_penggunaan');
            $table->dateTime('waktu_pengembalian');
            $table->string('penyetuju1');
            $table->tinyInteger('status_persetujuan1');
            $table->string('penyetuju2');
            $table->tinyInteger('status_persetujuan2');
            $table->tinyInteger('km_awal');
            $table->tinyInteger('km_akhir');
            $table->tinyInteger('bbm');
            $table->tinyInteger('konsumsi_bbm');
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
