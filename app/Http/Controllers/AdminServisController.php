<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class AdminServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Servis::all();
        return view('servis',[
            'services' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kendaraans = Kendaraan::all();
        return view('servis_add',[
            'kendaraans' => $kendaraans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if(Servis::create($data)){
            return redirect('/service');
        }else{
            return back();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Servis $servis)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servis $service)
    {
        //
        $kendaraans = Kendaraan::select('id','nama_kendaraan')->get();
        $data = Servis::find($service->id);
        return view('servis_edit',[
            'service'=> $service,
            'kendaraans' => $kendaraans,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servis $service)
    {
        //
        $data = $request->except(['_token','_method']);
        Servis::where('id',$service->id)->update($data);
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servis $service)
    {
        //
        if(Servis::where('id',$service->id)->delete()){
            return redirect()->route('service.index')->with('success', 'The data has been deleted');
        }else{
            return back();
        }
    }
}
