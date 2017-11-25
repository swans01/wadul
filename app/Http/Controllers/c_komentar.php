<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_komentar;
use App\m_postingan;
use App\m_agree;

class c_komentar extends Controller
{
    public function tampilKomentar($post_id){
        $komentars = new m_komentar;
        $data = $komentars->selectKomentar($post_id);
        $agree = new m_agree;
        return view('halamanKomentar', ['komentars' => $data[0], 'post' => $data[1], 'agree' => $agree]);
    }

    public function addKomentar(Request $request, $post_id){
        $komentar = new m_komentar;
        $komentar->insertKomentar($request, $post_id);
        return redirect()->back()->with(['message' => 'Komentar Berhasil Dibuat']);
    }

    public function showEditKomentar($komentar_id){
        $komentar = m_komentar::where('id', $komentar_id)->first();
        return view('editKomentar', ['komentar' => $komentar]);

    }

    public function editkomentar(Request $request, $komentar_id){
        $komentar = new m_komentar;
        return redirect()->route('tampilKomentar', ['user_id' => $komentar->updateKomentar($request, $komentar_id)])->with(['message' => 'Komentar Berhasil Diedit']);

    }

    public function deleteKomentar($komentar_id){
        $komentar = new m_komentar;
        $komentar->deleteKomentar($komentar_id);
        return redirect()->back()->with(['message' => 'Komentar Berhasil Dihapus']);

    }
}
