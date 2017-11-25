<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
Use Illuminate\Support\Facades\Storage;

class m_user extends Model
{

    public function selectUser(){
        $users = m_user::all();
        return $users;
    }
    
    public function insertUser($request){
        $user = new m_user();
        $user->username = $request['username'];
        $user->nama = $request['nama'];
        $user->password = bcrypt($request['password']);

        $user->save();
    }

    public function updateUser($request){
        $user = Auth::user();
        $user->nama = $request['nama'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['nama'] . '-' . $user->id . '.jpg';
        if($file){
            Storage::disk('local')->put($filename, File::get($file));
        }
    }

    public function deleteUser($user_id){
        $user = m_user::where('id', $user_id)->first();
        $user->delete();
    }


    protected $table = 'users';
    public $timestamps = false;
    
    public function posts(){
        return $this->hasMany('App\m_postingan');
    }
    
}
