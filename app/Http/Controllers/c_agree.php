<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_agree;

class c_agree extends Controller
{
    public function addAgree($post_id){
        $agree = new m_agree;
        $agree->insertAgree($post_id);
        return redirect()->back();
    }

    public function deleteAgree($agree_id){
        $agree = new m_agree;
        $agree->deleteAgree($agree_id);
        return redirect()->back();
    }
}
