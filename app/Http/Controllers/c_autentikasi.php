<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\m_autentikasi;

class c_autentikasi extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']])){
            if ( Auth::check() && Auth::user()->nama == 'admin' )
            {
                return redirect()->intended('halamanAdmin');
            }else{
                return redirect()->intended('halamanUtama');
            }
        }else{
            return redirect('/login')->with(['message' => 'Login Gagal']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with(['message' => 'Berhasil logout']);
    }
}
