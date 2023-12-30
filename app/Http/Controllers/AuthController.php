<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(){
        return view('auth.login');
    }

    public function loginValidation(Request $request){
        $data = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            return back()->withErrors([
                'email' => 'Identitas yang anda masukan tidak sesuai dengan data kami.',
            ])->onlyInput('email');
        }
    }

    public function register(Request $request){
        return view('auth.register');
    }

    public function registerValidation(Request $request){
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if(User::create($data)){
            return redirect('/login');
        }else{
            return back();
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
