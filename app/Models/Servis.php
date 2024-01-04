<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    public function kendaraans(){
        return $this->belongsTo(Kendaraan::class,'id_kendaraan','id');
    }

    protected $fillable = [
        'tempat_servis',
        'tanggal_servis',
        'id_kendaraan',
        'list_servis',
        'total_biaya_servis',
        'km_servis_terakhir',
        'km_servis_selanjutnya'
    ];
}
