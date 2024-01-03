<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;

class AdminServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('servis');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('servis_add');
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
    public function show(Servis $servis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servis $servis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Servis $servis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Servis $servis)
    {
        //
    }
}
