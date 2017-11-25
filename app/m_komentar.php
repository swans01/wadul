<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_komentar extends Model
{
    public function selectKomentar($post_id){
        $post = m_postingan::where('id', $post_id)->first();
        $komentars = m_komentar::where('postingan_id', $post_id)->get();
        return [$komentars, $post];
    }

    public function insertKomentar($request, $post_id){
        $user_id = auth()->user()->id;

        $komentar = new m_komentar();
        $komentar->komentar = $request['komentar'];
        $komentar->user_id = $user_id;
        $komentar->postingan_id = $post_id;
        $komentar->save();
    }

    public function updateKomentar($request, $komentar_id){
        $komentar = m_komentar::where('id', $komentar_id)->first();
        $komentar->komentar = $request['komentar'];
        $komentar->update();
        return $komentar->postingan_id;
    }

    public function deleteKomentar($komentar_id){
        $komentar = m_komentar::where('id', $komentar_id)->first();
        $komentar->delete();
    }

    protected $table = 'komentar';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\m_user');
    }

  
}
