<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('myindex',function (){
    Mail::send('welcome',['name'=>'My name'],function($message){
       $message->from('abdykaparkamilov@gmail.com','Asan');
        $message->to('abdykaparkamilov@mail.ru','Kanat');
        $message->subject('dsmlsmv');
    });
   return 'message sent';
});
Route::get('test',function (){
   dispatch(new \App\Jobs\SendNotification());
});
Route::get('send/email',function (){
   dispatch(new \App\Jobs\SendEmailJob());
});
Route::get('event',function (){
   event(new \App\Events\MyEvent('Asan'));
    return view('welcome');
});
Route::get('api/category/',['uses'=>'IndexController@api_category_all']);
Route::get('api/category/{id}',['uses'=>'IndexController@api_category']);
Route::group(['middleware'=>'web'], function (){

    Route::get('sign_in',['uses'=>'AuthController@showLoginForm']);
    Route::post('sign_in',['uses'=>'AuthController@login']);
    Route::get('registration',['uses'=>'AuthController@showRegistrationForm']);
    Route::post('registration',['uses'=>'AuthController@register']);
    Route::get('sign_out',['as'=>'sign_out','uses'=>'AuthController@logout']);

    Route::get('index',['as'=>'index','uses'=>'IndexController@index']);
    Route::get('/',['as'=>'index','uses'=>'IndexController@index']);
    Route::get('add/{id}',['middleware'=>'my_user','as'=>'add_item','uses'=>'IndexController@create']);
    Route::post('store/{id}',['as'=>'store_item','uses'=>'IndexController@store']);
    Route::get('search',['as'=>'search','uses'=>'IndexController@search']);
    Route::post('search/{id}',['as'=>'search_id','uses'=>'IndexController@search_id']);
    Route::get('index/{id}',['as'=>'show','uses'=>'IndexController@show']);
    Route::get('freight/{id}',['as'=>'freight','uses'=>'IndexController@freight']);
    Route::get('map',['as'=>'map','uses'=>'IndexController@map']);
    Route::auth();
});
Route::group(['middleware'=>'auth','prefix'=>'administration'],function (){
    Route::get('/',['as'=>'admin.index','uses'=>'AdminController@index']);
    //region
    Route::group(['prefix'=>'region'],function (){
        Route::get('/',['as'=>'admin.region','uses'=>'AdminController@region']);
        Route::get('add',['as'=>'add_region_get','uses'=>'AdminController@add_region_get']);
        Route::post('add',['as'=>'add_region','uses'=>'AdminController@add_region']);
        Route::get('edit/{id}',['as'=>'edit_region','uses'=>'AdminController@edit_region']);
        Route::post('edit/{id}',['as'=>'edit_region_post','uses'=>'AdminController@edit_region_post']);
        Route::get('delete/{id}',['as'=>'delete_region','uses'=>'AdminController@delete_region']);
    });

    //category
    Route::group(['prefix'=>'shipment'],function (){
        Route::get('/',['as'=>'shipment','uses'=>'AdminController@category1']);
        Route::get('add',['as'=>'add_category1','uses'=>'AdminController@add_category1']);
        Route::post('add',['as'=>'add_category1','uses'=>'AdminController@add_category1_post']);
        Route::get('edit/{id}',['as'=>'edit_category1','uses'=>'AdminController@edit_category1']);
        Route::post('edit/{id}',['as'=>'edit_category1','uses'=>'AdminController@edit_category1_post']);
        Route::get('delete/{id}',['as'=>'delete_category1','uses'=>'AdminController@delete_category1']);
    });
    Route::group(['prefix'=>'type'],function (){
        Route::get('/',['as'=>'type','uses'=>'AdminController@type']);
        Route::get('add',['as'=>'add_type','uses'=>'AdminController@add_type']);
        Route::post('add',['as'=>'add_type','uses'=>'AdminController@add_type_post']);
        Route::get('edit/{id}',['as'=>'edit_type','uses'=>'AdminController@edit_type']);
        Route::post('edit/{id}',['as'=>'edit_type','uses'=>'AdminController@edit_type_post']);
        Route::get('delete/{id}',['as'=>'delete_type','uses'=>'AdminController@delete_type']);
    });
    Route::group(['prefix'=>'category2'],function (){
        Route::get('/',['as'=>'category2','uses'=>'AdminController@category2']);
        Route::get('add',['as'=>'add_category2','uses'=>'AdminController@add_category2']);
        Route::post('add',['as'=>'add_category2','uses'=>'AdminController@add_category2_post']);
        Route::get('edit/{id}',['as'=>'edit_category2','uses'=>'AdminController@edit_category2']);
        Route::post('edit/{id}',['as'=>'edit_category2','uses'=>'AdminController@edit_category2_post']);
        Route::get('delete/{id}',['as'=>'delete_category2','uses'=>'AdminController@delete_category2']);
    });
    Route::group(['prefix'=>'load'],function (){
        Route::get('/',['as'=>'load','uses'=>'AdminController@load']);
        Route::get('add',['as'=>'add_load','uses'=>'AdminController@create']);
        Route::post('add',['as'=>'add_load','uses'=>'AdminController@store']);
        Route::get('edit/{id}',['as'=>'edit_load','uses'=>'AdminController@edit']);
        Route::post('edit/{id}',['as'=>'edit_load','uses'=>'AdminController@update']);
        Route::get('delete/{id}',['as'=>'delete_load','uses'=>'AdminController@destroy']);
    });
});