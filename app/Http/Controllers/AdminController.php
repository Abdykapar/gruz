<?php

namespace App\Http\Controllers;

use App\Category1;
use App\Category2;
use App\Load;
use App\Region;
use App\TypeTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $load = Load::all()->sortByDesc('created_at');

        return view('admin/index',compact('load'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function region(){
        $region  = Region::all();
        return view('admin/region/index',compact('region'));
    }

    public function edit_region($id){
            $region = Region::findOrFail($id);
        return view('admin/region/edit',compact('region'));
    }

    public function edit_region_post(Request $request, $id){
        $region = Region::findOrFail($id);
        $region->update([
            'name'=>$request->name
        ]);
        $region->save();
        return $this->region();
    }
    public function add_region_get(){
        return view('admin/region/create');
    }
    public function add_region(Request $request){
            $region = Region::create([
                'name' => $request->name
            ]);
            $region->save();
        return $this->region();
    }

    public function delete_region($id){
        $region = Region::findOrFail($id);
        $region->delete();
        return $this->region();
    }

    public function category1(){
        $category1 = Category1::findOrFail(3);
        return view('admin/category1/index',compact('category1'));
    }

    public function add_category1(){
        return view('admin/category1/create');
    }

    public function add_category1_post(Request $request){
        $category1 = TypeTable::create([
            'name' => $request->name,
            'machine_id' => 3
        ]);
        $category1->save();
        return $this->category1();
    }

    public function edit_category1($id){
        $category1 = TypeTable::findOrFail($id);
        return view('admin/category1/edit',compact('category1'));
    }

    public function edit_category1_post(Request $request,$id){
        $category1 = TypeTable::findOrFail($id);
        $category1->name = $request->name;
        $category1->save();
        return $this->category1();
    }

    public function delete_category1($id){
        $category1 = TypeTable::findOrFail($id);
        $category1->delete();
        return $this->category1();
    }

    public function category2(){
        $machine = Category1::findOrFail(4);
        $category2 = TypeTable::all()->sortByDesc('created_at');
        return view('admin/category2/index',compact('category2','machine'));
    }

    public function add_category2(){
        return view('admin/category2/create');
    }

    public function add_category2_post(Request $request){
        $category2 = TypeTable::create([
            'name' => $request->name,
            'machine_id' => 4
        ]);
        $category2->save();
        return $this->category2();
    }

    public function edit_category2($id){
        $category2 = TypeTable::findOrFail($id);
        return view('admin/category2/edit',compact('category2'));
    }

    public function edit_category2_post(Request $request,$id){
        $category2 = TypeTable::findOrFail($id);
        $category2->name = $request->name;
        $category2->save();
        return $this->category2();
    }

    public function delete_category2($id){
        $category2= TypeTable::findOrFail($id);
        $category2->delete();
        return $this->category2();
    }
    public function create()
    {
        $cat1 = Category1::all();
        $cat2 = TypeTable::all();
        $region = Region::all();
        $data = [
            'cat1' => $cat1,
            'cat2' => $cat2,
            'region' => $region
        ];
        return view('admin/create',compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $load = new Load();
        $load->type_id = $request['type_id'];
        $load->machine_id = $request['machine_id'];
        $load->region_otkuda = $request['otkuda'];
        $load->region_kuda = $request['kuda'];
        $load->data = $request['data'];
        $load->telefon = $request['telephone'];
        $load->volume = $request['volume'];
        $load->latitude = $request['lat'];
        $load->longitude = $request['lon'];
        $load->title = $request['title'];
        $load->description = $request['description'];
        $load->save();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat1 = Category1::all();
        $cat2 = TypeTable::all();
        $region = Region::all();
        $data = [
            'cat1' => $cat1,
            'cat2' => $cat2,
            'region' => $region
        ];
        $load = Load::findOrFail($id);
        return view('admin/edit',compact('load','data'));
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
        $load = Load::findOrFail($id);
        $load->type_id = $request['type_id'];
        $load->machine_id = $request['machine_id'];
        $load->region_otkuda = $request['otkuda'];
        $load->region_kuda = $request['kuda'];
        $load->data = $request['data'];
        $load->telefon = $request['telephone'];
        $load->volume = $request['volume'];
        $load->latitude = $request['lat'];
        $load->longitude = $request['lon'];
        $load->title = $request['title'];
        $load->description = $request['description'];
        $load->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Load::destroy($id);
        return $this->index();
    }
    public function type(){
        $category1 = Category1::all();
        return view('admin/type/index',compact('category1'));
    }

    public function add_type(){
        return view('admin/type/create');
    }

    public function add_type_post(Request $request){
        $category1 = Category1::create([
            'name' => $request->name
        ]);
        $category1->save();
        return $this->category1();
    }

    public function edit_type($id){
        $category1 = Category1::findOrFail($id);
        return view('admin/type/edit',compact('category1'));
    }

    public function edit_type_post(Request $request,$id){
        $category1 = Category1::findOrFail($id);
        $category1->name = $request->name;
        $category1->save();
        return $this->type();
    }

    public function delete_type($id){
        $category1 = Category1::findOrFail($id);
        $category1->delete();
        return $this->type();
    }

}
