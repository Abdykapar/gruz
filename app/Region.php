<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $table = 'region';

    protected $fillable = ['name'];

    public function load_table1(){
        return $this->hasMany('App\Load','region_otkuda');
    }
    public function load_table2(){
        return $this->hasMany('App\Load','region_kuda');
    }
}
