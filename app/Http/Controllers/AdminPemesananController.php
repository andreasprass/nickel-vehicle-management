<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Pemesanan::all();
        return view('pemesanan',[
            'pemesanans' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::select('id','nama_user','level')->orderBy('nama_user')->get();
        $drivers = Driver::select('id','nama_driver')->orderBy('nama_driver')->get();
        $kendaraans = Kendaraan::select('id','nama_kendaraan')->orderBy('nama_kendaraan')->get();
        $pemesanans = Pemesanan::select('id', 'id_driver')->get();

        return view('pemesanan_add',[
            'kendaraans' => $kendaraans,
            'drivers' => $drivers,
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if(Pemesanan::create($data)){
            return redirect('/pemesanan');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
        $data = Pemesanan::find($pemesanan->id);
        return view('pemesanan_details',[
            'pemesanan' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
        $users = User::select('id','nama_user','level')->orderBy('nama_user')->get();
        $drivers = Driver::select('id','nama_driver')->orderBy('nama_driver')->get();
        $kendaraans = Kendaraan::select('id','nama_kendaraan')->orderBy('nama_kendaraan')->get();
        $data = Pemesanan::find($pemesanan->id);
        return view('pemesanan_edit',[
            'pemesanan_edit' => $data,
            'kendaraans' => $kendaraans,
            'drivers' => $drivers,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
        $data = $request->except(['_token','_method']);
        Pemesanan::where('id',$pemesanan->id)->update($data);
        return redirect()->route('pemesanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
        if(Pemesanan::where('id',$pemesanan->id)->delete()){
            return redirect()->route('pemesanan.index')->with('success', 'The data has been deleted');
        }else{
            return back();
        }
    }
}
