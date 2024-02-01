<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama_kendaraan',
        'jenis_kendaraan',
        'nomor_polisi',
        'tahun_pembuatan',
        
        'status_kendaraan'
    ];
}
