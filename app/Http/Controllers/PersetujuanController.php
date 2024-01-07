<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id = auth::user()->id;
        $data = Pemesanan::where('penyetuju1',$id)->orWhere('penyetuju2',$id)->get();
        return view('persetujuan',[
            'persetujuans' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $persetujuan)
    {
        //
        $data = Pemesanan::find($persetujuan->id);
        return view('persetujuan_details',[
            'persetujuan' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $persetujuan)
    {
        //
        $data = Pemesanan::find($persetujuan->id);
        $id = auth::user()->id;

        if($data->penyetuju1 == $id){
            Pemesanan::where('id',$persetujuan->id)->update(['status_persetujuan1'=>1]);
        }elseif($data->penyetuju2 == $id){
            Pemesanan::where('id',$persetujuan->id)->update(['status_persetujuan2'=>1]);
        }

        if($data->status_persetujuan1 == 1 AND $data->status_persetujuan2 == 1){
            Pemesanan::where('id',$persetujuan->id)->update(['status_pemesanan'=>1]);
        }

        return redirect()->route('persetujuan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $persetujuan)
    {
        //
    }
}
