<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Jabatan;
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
        $users = User::orderBy('nama_user')->get();
        $drivers = Driver::select('id','nama_driver')->orderBy('nama_driver')->get();
        $kendaraans = Kendaraan::select('id','nama_kendaraan')->orderBy('nama_kendaraan')->get();
        $pemesanans = Pemesanan::select('id', 'id_driver')->get();

        
        $kepala_pool = Jabatan::where('kepala_pool',1)->pluck('id');
        if($kepala_pool == null){
            $kepala_pool = 'Pilih Jabatan untuk Mengelola Pool';
        }else{
            $kepala_pool_user = User::where('id_jabatan', $kepala_pool)->first();
        }
        return view('pemesanan_add',[
            'kendaraans' => $kendaraans,
            'drivers' => $drivers,
            'users' => $users,
            'kepala_pool_user'=>$kepala_pool_user,
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

    public function cari_pemesanan(){
        $data = Pemesanan::where('status_pemesanan',2)->get();
        return view('cari_pemesanan',[
            'pemesanans' => $data,
        ]);
    }

    public function cari_data(Request $request){


        $dataFiltered = Pemesanan::where('waktu_penggunaan','>=',$request->waktu_penggunaan)
                ->Where('waktu_pengembalian','<=',$request->waktu_pengembalian)
                ->where('status_pemesanan',2)
                ->get();

        return view('cari_pemesanan',[
            'pemesanans'=>$dataFiltered,
            'waktu_penggunaan' => $request->waktu_penggunaan,
            'waktu_pengembalian' => $request->waktu_pengembalian,
        ]);

    }

    public function dikembalikan($id){
        $pemesanan = new Pemesanan();
        $get = $pemesanan->find($id);
        if($get->status_persetujuan1 == 0 || $get->status_persetujuan2 == 0){
            return back();
        }else{
            $pemesanan->where('id',$id)->update(['status_pemesanan'=>2]);
        }
        return back();

    }
}
