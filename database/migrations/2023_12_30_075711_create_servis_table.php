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
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tanggal_servis');
            //dapat ditambahkan gambar/foto nota biaya
            $table->tinyInteger('biaya_servis');
            $table->tinyInteger('km_servis_terakhir');
            $table->tinyInteger('km_servis_selanjutnya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
