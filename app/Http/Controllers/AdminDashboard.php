<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        
        // $jumalah_pemakaian_kendaraan = $pemesanans->where('id')

        
        $kendaraans = Kendaraan::get()->unique('jenis_kendaraan');
        foreach($kendaraans as $label_kend){
            $label_jenis_kendaraan[] = $label_kend->jenis_kendaraan;
        }

        $barang = [];
        $orang = [];
        foreach($pemesanan_selesai as $data){
            if($data->status_pemesanan == 0 || $data->status_pemesanan == 1 || $data->status_pemesanan == 3 ){
                $barang[] = null ;
                $orang[] = null;
            }elseif($data->kendaraans->jenis_kendaraan == 'Angkutan Barang'){
                if($data->id_kendaraan == null){
                    $barang = [];
                }else{
                    $barang[] = $data->id_kendaraan;
                }
            }else{
                if($data->id_kendaraan == null){
                    $orang = [];
                }else{
                    $orang[] = $data->id_kendaraan;
                }
            }
        }

        $data = [];
        $label_kendaraan = [];
        $data_kendaraan = $pemesanans->get()->unique('id_kendaraan');
        $kendaraan = $pemesanans->groupBy('id_kendaraan')->selectRaw('count(*) as total')->get();
        foreach($kendaraan as $kendaraan){
            $data[] = $kendaraan->total;
            
        };
        foreach($data_kendaraan as $data_kend){
            $label_kendaraan[] = $data_kend->kendaraans->nama_kendaraan;
        }
        $value = [count($barang),count($orang)];
        
        $id = auth::user()->id;
        $persetujuans = Pemesanan::where('penyetuju1',$id)->orWhere('penyetuju2',$id)->get();

        return view('dashboard',[
            'peminjaman' => $peminjaman->count(),
            'pemesanan_selesai' => $pemesanan_selesai->count(),
            'menunggu_persetujuan' => $menunggu_persetujuan->count(),
            'pemesanan_ditolak' => $pemesanan_ditolak->count(),
            'label_jenis_kendaraan' => $label_jenis_kendaraan,
            'value' => $value,
            'label_kendaraan' => $label_kendaraan,
            'data_kend' => $data,
            'persetujuans' => $persetujuans,

        ]);
    }

    
}
