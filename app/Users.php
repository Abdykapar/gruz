<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{


    public $table = 'user';

    protected $fillable = ['name','email', 'phone','password'];

    protected $hidden = ['password', 'password_token'];

    public function ads(){
        return $this->hasMany('App\Load','user_id');
    }
}
