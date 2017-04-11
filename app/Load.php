<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    public $table = 'ads';

    protected $fillable = ['region_otkuda','region_kuda','data','telefon','title',
                            'volume','view_id','latitude','longitude','description','type_id','machine_id'];

    public function region1(){
        return $this->belongsTo('App\Region','region_otkuda','id');
    }
    public function region2(){
        return $this->belongsTo('App\Region','region_kuda','id');
    }
    public function type_table(){
        return $this->belongsTo('App\TypeTable','type_id','id');
    }
    public function machine(){
        return $this->belongsTo('App\Category1','machine_id','id');
    }

    public function user(){
        return $this->belongsTo('App\Users','user_id','id');
    }

    public function search5($request){
        $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]],
                    [$request['name'][1],'=',$request['value'][1]],
                    [$request['name'][2],'=',$request['value'][2]],
                    [$request['name'][3],'=',$request['value'][3]],
                    [$request['name'][8],'>=',date($request['value'][8])]
                ]
        )->paginate(5)->sortByDesc('created_at');
        return $b;
    }

    public function search4($request){
        if (isset($request['name'][8]) && $request['name'][8] > ''){
            $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]],
                    [$request['name'][1],'=',$request['value'][1]],
                    [$request['name'][2],'=',$request['value'][2]],
                    [$request['name'][8],'>=',date($request['value'][8])]
                ]
            )
            ->paginate(5)->sortByDesc('created_at');
                    }
        else {
            $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]],
                    [$request['name'][1],'=',$request['value'][1]],
                    [$request['name'][2],'=',$request['value'][2]],
                    [$request['name'][3],'=',$request['value'][3]]
                ]
            )->paginate(5)->sortByDesc('created_at');
        }

        return $b;
    }
    public function search3($request){
        if (isset($request['name'][8]) && $request['name'][8] > ''){
            $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]],
                    [$request['name'][1],'=',$request['value'][1]],
                    [$request['name'][8],'>=',date($request['value'][8])]
                ]
            )->get();
        }
        else {
            $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]],
                    [$request['name'][1],'=',$request['value'][1]],
                    [$request['name'][2],'=',$request['value'][2]]
                ]
            )->get();
        }
        return $b;
    }
    public function search2($request){
        if (isset($request['name'][8]) && $request['name'][8] > ''){
            $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]],
                    [$request['name'][8],'>=',date($request['value'][8])]
                ]
            )->paginate(5)->sortByDesc('created_at');
        }
        else {
        $b = $this->where(
            [
                [$request['name'][0],'=',$request['value'][0]],
                [$request['name'][1],'=',$request['value'][1]]
            ]
        )->paginate(5)->sortByDesc('created_at');
        }
        return $b;
    }
    public function search1($request){
        if (isset($request['name'][8]) && $request['name'][8] > ''){
            $b = $this->where(
                [
                    [$request['name'][8],'>=',date($request['value'][8])]
                ]
            )->paginate(5)->sortByDesc('created_at');
        }
        else {
            $b = $this->where(
                [
                    [$request['name'][0],'=',$request['value'][0]]
                ]
            )->paginate(5)->sortByDesc('created_at');
        }
        return $b;
    }
    //main
    public function main_search($request){
        $load = new Load();
        $load1 = '';
        if (count($request['name']) == 5){
            $load1 = $load->search5($request);
        }
        else if (count($request['name']) == 4){
            $load1 = $load->search4($request);
        }
        else if (count($request['name']) == 3){
            $load1 = $load->search3($request);
        }
        else if (count($request['name']) == 2){
            $load1 = $load->search2($request);
        }

        else if (count($request['name']) == 1){
            $load1 = $load->search1($request);
        }
       return $load1;
    }
    public function allInOne($items){
        $load = [];
        foreach ($items as $item){
            foreach ($item->ads->sortByDesc('craeted_at') as $value){
                $load[] = $value;
            }
        }
        return $load;
    }
}
