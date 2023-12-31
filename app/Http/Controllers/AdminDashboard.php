<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    //
    public function index(){
        $drivers = Driver::pluck('nama_driver');
        $driversCount = $drivers->count();
        return view('dashboard',[
            'driversCount' => $driversCount,
        ]);
    }

    
}
