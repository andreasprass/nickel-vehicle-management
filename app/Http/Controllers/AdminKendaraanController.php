<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class AdminKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('kendaraan',[
            'kendaraans' => Kendaraan::all(),
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
