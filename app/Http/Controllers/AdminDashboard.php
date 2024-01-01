<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    //
    public function index(){
        $drivers = Driver::pluck('nama_driver');
        $kendaraansCount = Kendaraan::pluck('id')->count();
        $driversCount = $drivers->count();
        return view('dashboard',[
            'driversCount' => $driversCount,
            'kendaraanCount' => $kendaraansCount,
        ]);
    }

    
}
