<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    //
    public function index(){
        //need fixing

        $pemesanans = new Pemesanan();
        // 0 = Menunggu, 1 = Peminjaman, 2 = Selesai, 3 = Ditolak
        $menunggu_persetujuan = $pemesanans->where('status_pemesanan',0)->get();
        $peminjaman = $pemesanans->where('status_pemesanan',1)->get();
        $pemesanan_selesai = $pemesanans->where('status_pemesanan',2)->get();
        $pemesanan_ditolak = $pemesanans->where('status_pemesanan',3)->get();
        return view('dashboard',[
            'peminjaman' => $peminjaman->count(),
            'pemesanan_selesai' => $pemesanan_selesai->count(),
            'menunggu_persetujuan' => $menunggu_persetujuan->count(),
            'pemesanan_ditolak' => $pemesanan_ditolak->count(),
        ]);
    }

    
}
