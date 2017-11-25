<?php

namespace App\Http\Controllers;


use App\m_user;
use App\m_postingan;
use App\m_agree;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
Use Illuminate\Support\Facades\Storage;

class c_user extends Controller
{
    public function addUser(Request $request){
        $this->validate($request, [
            'username' => 'required|unique:users',
            'nama' => 'required|max:120',
            'password' => 'required|min:6'
        ]);
        $user = new m_user;
        $user->insertUser($request);
        return redirect()->route('login')->with(['message' => 'Data Pengguna Berhasil Disimpan']);
    }

    public function tampilProfile($user_id){
        $user = m_user::where('id', $user_id)->first();
        $posts = m_postingan::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        $agree = new m_agree;
        return view('halamanProfilPengguna', ['posts' => $posts, 'user' => $user, 'agree' => $agree]);
    }

    public function tampiluser(){
        $users = new m_user;
        return view('kelolaPengguna', ['users' => $users->selectUser()]);
    }

    public function editUser(Request $request){
        $user = new m_user;
        $user->updateUser($request);
        return redirect()->back();
    }

    public function deleteUser($user_id){
        $user = new m_user;
        $user->deleteUser($user_id);
        return redirect()->back()->with(['message' => 'Pengguna Berhasil Dihapus']);

    }

    public function getImage($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }
}
