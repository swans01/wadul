<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_postingan extends Model
{
    public function insertPostingan($request){
        $user_id = auth()->user()->id;

        $post = new m_postingan();
        $post->postingan = $request['postingan'];
        $post->user_id = $user_id;
        $post->status = "Belum Dikonfirmasi";
        $post->save();
        
    }

    public function updatePostingan($request, $post_id){
        $post = m_postingan::where('id', $post_id)->first();
        $post->postingan = $request['postingan'];
        $post->update();
    }

    public function insertStatus($post_id){
        $post = m_postingan::where('id', $post_id)->first();
        $post->status = 'Sudah Disampaikan';
        $post->update();
    }

    public function selectPostingan(){
        $posts = m_postingan::orderBy('created_at', 'desc')->get();
        return $posts;
    }

    public function deletePostingan($post_id){
        $post = m_postingan::where('id', $post_id)->first();
        $post->delete();
    }

    protected $table = 'postingan';

    public function user(){
        return $this->belongsTo('App\m_user');
    }


    
}
