<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class AdminDriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $drivers = Driver::all();
        return view('driver',[
            'drivers' => $drivers,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('driver_add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if(Driver::create($data)){
            return redirect('/driver');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
        $driver = Driver::find($driver->id);
        return view('driver_edit',[
            'driver'=> $driver,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {

        $data = $request->except(['_token','_method']);
        Driver::where('id',$driver->id)->update($data);
        return redirect()->route('driver.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
        if(Driver::destroy($driver->id)){
            return redirect()->route('user')->with('success', 'The data has been deleted');
        }else{
            return back();
        }
    }
}
