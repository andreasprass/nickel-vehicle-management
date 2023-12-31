<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('user',[
            'users' => $users,
        ]);
    }

    public function create(){
        return view('user_add');
    }

    public function store(Request $request){
        $data = $request->all();
        if(User::create($data)){
            return redirect('/user');
        }else{
            return back();
        }
    }

    public function edit($id){
        $user = User::find($id);
        return view('user_edit',[
            'user'=> $user,
        ]);
    }

    public function destroy($id){
        if(User::where('id',$id)->delete()){
            return redirect()->route('user')->with('success', 'The data has been deleted');
        }else{
            return back();
        }
    }
}
