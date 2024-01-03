<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public function drivers(){
        return $this->belongsTo(Driver::class,'id_driver','id');
    }
    public function kendaraans(){
        return $this->belongsTo(Kendaraan::class,'id_kendaraan','id');
    }
    public function users1(){
        return $this->belongsTo(User::class, 'penyetuju1','id');
    }
    public function users2(){
        return $this->belongsTo(User::class, 'penyetuju2','id');
    }
    public function admin(){
        return $this->belongsTo(User::class, 'id_user','id');
    }

    protected $fillable = [
        'id_driver',
        'id_user',
        'id_kendaraan',
        'keperluan',
        'waktu_penggunaan',
        'waktu_pengembalian',
        'penyetuju1',
        'status_persetujuan1',
        'penyetuju2',
        'status_persetujuan2',
        'km_awal',
        'km_akhir',
        'bbm',
        'konsumsi_bbm',
        'id_user',
    ];
}
