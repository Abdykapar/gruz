<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTable extends Model
{
    public $table = 'type_table';
    protected $fillable = ['machine_id','name'];

    public function machine(){
        return $this->belongsTo('App\Category1','id');
    }
    public function ads(){
        return $this->hasMany('App\Load','type_id');
    }

}
