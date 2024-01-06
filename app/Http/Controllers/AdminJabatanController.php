<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class AdminJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Jabatan::all();
        return view('jabatan',[
            'jabatans' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('jabatan_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if(Jabatan::create($data)){
            return redirect('/jabatan');
        }else{
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Jabatan $jabatan)
    {
        //
        return view('jabatan_edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }

    public function pilih_kepala_pool(){
        $jabatans = Jabatan::all();
        $jabatan_pengelola_pool = $jabatans->where('kepala_pool',1)->first();
        return view('jabatan_pilih',[
            'jabatans'=>$jabatans,
            'jabatan_pengelola_pool'=>$jabatan_pengelola_pool,
        ]);
    }

    public function simpan_kepala_pool(Request $request){

        $id = $request->id;
        $check = Jabatan::where('kepala_pool',1)->count();
        // $data = [
        //     'kepala_pool' => 1,
        // ];
        if($check < 1){
            Jabatan::where('id',$id)->update(['kepala_pool'=>1]);
        }else{
            Jabatan::where('kepala_pool',1)->update(['kepala_pool'=>0]);
            Jabatan::where('id',$id)->update(['kepala_pool'=>1]);
        }

        return redirect()->route('jabatan.index');
    }
}
