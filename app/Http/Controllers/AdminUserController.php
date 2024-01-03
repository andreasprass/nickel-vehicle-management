<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('nama_user')->get();
        return view('user',[
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('user_add');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if(User::create($data)){
            return redirect('/user');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $user = User::find($user->id);
        return view('user_edit',[
            'user'=> $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //o
        $data = $request->except(['_token','_method']);
        User::where('id',$user->id)->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if(User::where('id',$user->id)->delete()){
            return redirect()->route('user.index')->with('success', 'The data has been deleted');
        }else{
            return back();
        }
    }
}
