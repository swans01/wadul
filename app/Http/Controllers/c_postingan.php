<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_postingan;
use App\m_agree;

class c_postingan extends Controller
{

    public function addPostingan(Request $request){
        $post = new m_postingan;
        $post->insertPostingan($request);
        return redirect('halamanUtama')->with(['message' => 'Postingan Berhasil Dibuat']);
    }

    public function editPostingan(Request $request, $post_id){
        $post = new m_postingan;
        $post->updatePostingan($request, $post_id);
        return redirect()->route('profileUser', ['user_id' => auth()->user()->id])->with(['message' => 'Postingan Berhasil Diedit']);

    }

    public function tampilPostingan(){
        $posts = new m_postingan;
        $agree = new m_agree;
        return view('halamanPengguna', ['posts' => $posts->selectPostingan(), 'agree' => $agree]);
    }

    public function tampilAdmin(){
        $posts = new m_postingan;
        return view('halamanAdmin', ['posts' => $posts->selectPostingan()]);
    }

    public function deletePostingan($post_id){
        $post = new m_postingan;
        $post->deletePostingan($post_id);
        return redirect()->back()->with(['message' => 'Postingan Berhasil Dihapus']);

    }

    public function addStatus($post_id){
        $post = new m_postingan;
        $post->insertStatus($post_id);
        return redirect()->back();

    }

    public function showEditPostingan($post_id){
        $post = m_postingan::where('id', $post_id)->first();
        return view('editPostingan', ['post' => $post]);

    }

    
}
