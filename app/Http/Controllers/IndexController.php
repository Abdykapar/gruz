<?php

namespace App\Http\Controllers;

use App\Category1;
use App\Load;
use App\Region;
use App\TypeTable;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Matcher\Type;
use PhpParser\Node\Expr\New_;

class IndexController extends Controller
{
    protected $data;

    public function __construct()
    {
        $cat1 = Category1::all();
        $type = TypeTable::all();
        $region = Region::all();
        $last = Load::all()->sortByDesc('created_at')->take(3);
        $this->data = [
            'cat1' => $cat1,
            'type' => $type,
            'reg' => $region,
            'last' => $last
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->data;
        return view('pages/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cat1 = Category1::all();
        $type = TypeTable::where('machine_id','=',$id)->get();
        $region = Region::all();
        $data = [
            'cat1' => $cat1,
            'type' => $type,
            'region' => $region
        ];
        return view('pages/add_item',compact('data','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $validator = validator($request->all(),[
           'type' => 'required',
            'volume' => 'required|min:0',
            'otkuda' => 'required',
            'kuda' => 'required',
            'data' => 'required',
            'telephone' => 'required|numeric|min:10',
            'title' => 'required|max:255',
            'description' => 'required'
        ],
            [
                'type.required' => 'Введите тип',
                'volume.required' => 'Введите вес',
                'otkuda.required' => 'Введите адрес',
                'kuda.required' => 'Введите адрес',
                'data.required' => 'Введите дату',
                'telephone.required' => 'Введите телефон номер',
                'telephone.numeric' => 'Номер должен состоять из цифр',
                'title.required' => 'Введите тему',
                'description.required' => 'Введите описание'
            ],[
                'type','volume','otkuda','kuda','data','telephone','title','description'
            ]
            );
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        else {
            $load = new Load();
            $load->region_otkuda = $request['otkuda'];
            $load->region_kuda = $request['kuda'];
            $load->data = $request['data'];
            $load->telefon = $request['telephone'];
            $load->title = $request['title'];
            $load->latitude = $request['lat'];
            $load->longitude = $request['lon'];
            $load->description = $request['description'];
            $load->type_id = $request['type'];
            $load->volume = $request['volume'];
            $load->machine_id = $id;
            $load->user_id = auth()->guard('my_user')->user()->id;
            $load->save();
            Session::flash('status','Добавлено!');
        return redirect(route('add_item',$id));
        }
    }

    public function search_load($request){
        $load = [];
        $load1 = new Load();
        $name = [];
        $value = [];
        $load = collect();
        if (isset($request['type']) && $request['type'] != ''){
            $name[] = 'type_id';
            $value[] = $request['type'];
        }
        if (isset($request['volume']) && $request['volume'] != ''){
            $name[] = 'volume';
            $value[] = $request['volume'];
        }
        if (isset($request['otkuda']) && $request['otkuda'] != ''){
            $name[] = 'region_otkuda';
            $value[] = $request['otkuda'];
        }
        if (isset($request['kuda']) && $request['kuda'] != ''){
            $name[] = 'region_kuda';
            $value[] = $request['kuda'];
        }
        if (isset($request['data']) && $request['data'] != ''){
            $name[8] = 'data';
            $value[8] = $request['data'];
        }
        $load['name'] = $name;
        $load['value'] = $value;
        $load1 = $load1->main_search($load);
        return $load1;
    }

    /**
     * @param $id
     */
    public function search_id($id){
        $load = Category1::findOrFail($id);
        return $this->map($load->loads);
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function search(Request $request){
       $load = $this->search_load($request);
        if ($request['map'] != ''){
            return $this->map($load);
        }
        $cat1 = Category1::all();
        $region = Region::all();
        $data = [
            'cat1' => $cat1,
            'reg' => $region
        ];
        $view = '';
        return view('pages/category_grid',compact('data','load','category1','view'));
    }

    public function freight($id){
        $load = Category1::findOrFail($id);
        $load = $load->loads;
        $cat1 = Category1::all();
        $region = Region::all();
        $data = [
            'cat1' => $cat1,
            'reg' => $region
        ];
        $view = 'map';
        $active = $id;
        return view('pages/category_grid',compact('data','load','id','view','active'));
    }

    public function map($address){
        $region = Region::all();
        $cat1 = Category1::all();
        $type = TypeTable::all();
        $data = [
            'cat1' =>$cat1,
            'reg' => $region,
            'type' => $type
        ];
        return view('pages/map',compact('data','address'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat1 = Category1::all();
        $region = Region::all();
        $data = [
            'cat1' => $cat1,
            'reg' => $region
        ];
        $item = Load::findOrFail($id);
        $item->view_site++;
        $item->save();
        return view('pages/item_detail',compact('item','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function api_category($id){
        $data = TypeTable::where('machine_id','=',$id)->get();
        return $data;
    }

    public function api_category_all(){
        $data = TypeTable::all();
        return $data;
    }
}
