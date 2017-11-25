<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_agree extends Model
{

    public function insertAgree($post_id){
        $user_id = auth()->user()->id;

        $agree = new m_agree();
        $agree->user_id = $user_id;
        $agree->postingan_id = $post_id;
        $agree->agree = true;
        $agree->save();
    }

    public function selectAgree($post_id){
        $agree = m_agree::where('postingan_id', $post_id);
        return $agree;
    }

    public function deleteAgree($post_id){
        $user_id = auth()->user()->id;

        $agree = m_agree::where('postingan_id', $post_id)->where('user_id', $user_id)->first();
        $agree->delete();
    }

    public function checkAgree($post_id){
        $user_id = auth()->user()->id;
        $agree = m_agree::where('postingan_id', $post_id)->where('user_id', $user_id);
        return $agree;
    }

    protected $table = 'agree';
    public $timestamps = false;

}
