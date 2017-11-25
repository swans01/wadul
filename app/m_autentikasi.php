<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class m_autentikasi extends Model implements Authenticatable
{
    protected $table = 'users';
    public $timestamps = false;
    use \Illuminate\Auth\Authenticatable;
}
