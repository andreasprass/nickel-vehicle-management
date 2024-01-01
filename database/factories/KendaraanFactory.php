<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kendaraan>
 */
class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama_kendaraan' => 'Mercedes',
            'jenis_kendaraan' => 'Angkutan Barang',
            'nomor_polisi' => 'AG4455KBI',
            'tahun_pembuatan'=> 2009,
            'tanggal_beli_sewa'=> fake()->dateTime('+10 years'),
            'status_kendaraan'=> rand(1,2),

        ];
    }
}
