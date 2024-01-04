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
            $table->string('tempat_servis');
            $table->dateTime('tanggal_servis');
            $table->string('list_servis');
            //fitur biaya kedepan dapat ditambahkan detail biaya per list serivs
            $table->bigInteger('total_biaya_servis');
            //dapat ditambahkan fitur seperti gambar/foto nota biaya
            $table->foreignId('id_kendaraan');
            $table->bigInteger('km_servis_terakhir');
            $table->bigInteger('km_servis_selanjutnya');
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
