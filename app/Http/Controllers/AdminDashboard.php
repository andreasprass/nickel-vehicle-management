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
        $pemesanans_active = Pemesanan::where('status_pemesanan',1)->get();
        $pemesanan_active_count = $pemesanans_active->count();
        $pemesanan_perlu_persetujuan = Pemesanan::where('status_pemesanan',0)->count();
        $drivers = Driver::pluck('nama_driver');
        $kendaraansCount = Kendaraan::pluck('id')->count();
        $driversCount = $drivers->count();
        return view('dashboard',[
            'driversCount' => $driversCount,
            'kendaraanCount' => $kendaraansCount,
            'pemesanan_active_count' => $pemesanan_active_count,
            'pemesanan_perlu_persetujuan' => $pemesanan_perlu_persetujuan,
        ]);
    }

    
}
