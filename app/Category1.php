<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category1 extends Model
{
    public $table = 'type_machine';

    protected $fillable = ['name'];

    public function loads()
    {
        return $this->hasMany('App\Load','machine_id');
    }
    public function typeTable(){
        return $this->hasMany('App\TypeTable','machine_id');
    }
}
