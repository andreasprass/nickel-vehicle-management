<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Servis;
use App\Models\Kendaraan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Kendaraan::all();
        foreach ($data as $kendaraan) {
            $kendaraan->tanggal_beli_sewa = Carbon::parse($kendaraan->tanggal_beli_sewa)->format('l, d F Y'); // Adjust the date format as needed
        }
        return view('kendaraan',[
            'kendaraans' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('kendaraan_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if(Kendaraan::create($data)){
            return redirect('/kendaraan');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
        $penggunaan = Pemesanan::where('id_kendaraan',$kendaraan->id)->where('status_pemesanan',2)->orderBy('waktu_penggunaan','asc')->get();
        $lastPemesanan = Pemesanan::where('id_kendaraan',$kendaraan->id)->where('status_pemesanan',2)->orderBy('waktu_pengembalian','desc')->first();
        $lastServis = Servis::where('id_kendaraan',$kendaraan->id)->orderBy('tanggal_servis','desc')->first();

        // dd($lastServis);
        //Servis

        if($lastServis == null){
            $status_servis = 'Belum ada Pengecekan atau Servis';
            $status_servis_color = 'secondary';
        }
        elseif($lastPemesanan == null){
            $status_servis = 'Belum ada Perjalanan';
            $status_servis_color = 'secondary';
        }else{
            if($lastPemesanan->km_akhir >= $lastServis->km_servis_selanjutnya){
                $status_servis = 'Melewati Kilometer Servis';
                $status_servis_color = 'danger';
            }elseif($lastPemesanan->km_akhir >= $lastServis->km_servis_selanjutnya - ($lastServis->km_servis_selanjutnya * 5/100)){
                $status_servis = 'Mendekati Kilometer Servis';
                $status_servis_color = 'warning';
            }elseif($lastServis->km_servis_selanjutnya >= $lastPemesanan->km_akhir){
                $status_servis = 'Sudah Servis';
                $status_servis_color = 'success';
            }
        }

        //formatting date time using carbon
        $monthNames = [];
        foreach($penggunaan as $item){
            $monthNames[] = Carbon::parse($item->waktu_penggunaan)->format('F');
        }

        // Count the occurrences of each month
        $monthCounts = array_count_values($monthNames);
        $penggunaanLabel = array_keys($monthCounts);
        $penggunaanValue = array_values($monthCounts);

        $data = Kendaraan::find($kendaraan->id);
        $data['tanggal_beli_sewa'] = Carbon::parse($data['tanggal_beli_sewa'])->format('l, d F Y');
        return view('kendaraan_details',[
            'kendaraan' => $data,
            'jumlahPenggunaanPerMonth' => $penggunaanValue,
            'monthsPenggunaan' => $penggunaanLabel,
            'status_servis' => $status_servis,
            'status_servis_color' => $status_servis_color,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        //
        $kendaraan = Kendaraan::find($kendaraan->id);
        return view('kendaraan_edit',[
            'kendaraan' => $kendaraan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        //
        $data = $request->except(['_token','_method']);
        Kendaraan::where('id',$kendaraan->id)->update($data);
        return redirect()->route('kendaraan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        //
        if(Kendaraan::where('id',$kendaraan->id)->delete()){
            return redirect()->route('kendaraan.index')->with('success', 'The data has been deleted');
        }else{
            return back();
        }
    }
}
