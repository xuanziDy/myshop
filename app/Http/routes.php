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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::delete('/task/{task}', 'TaskController@destory');




Route::group(['prefix' => 'GoodsCategory','middleware' =>'web'], function () {
    Route::get('/index','GoodsCategoryController@index');
    Route::get('/add/{name?}','GoodsCategoryController@add');
    Route::get('/edit/{id}','GoodsCategoryController@edit');
    Route::get('/del/{id}','GoodsCategoryController@del');
    Route::post('/save','GoodsCategoryController@save');
});

Route::group(['prefix' => 'GoodsBrand','middleware' =>'web'], function () {
    Route::get('/index','GoodsBrandController@index');
    Route::any('/create','GoodsBrandController@create');
    Route::post('/store','GoodsBrandController@store');
    Route::get('/edit/{id}','GoodsBrandController@edit');
    Route::get('/destroy/{id}','GoodsBrandController@destroy');
    Route::get('/upload','GoodsBrandController@upload');
});

Route::group(['prefix' => 'GoodsType','middleware' =>'web'], function () {
    Route::get('/index','GoodsTypeController@index');
    Route::any('/create','GoodsTypeController@create');
    Route::post('/store','GoodsTypeController@store');
    Route::get('/edit/{id}','GoodsTypeController@edit');
    Route::get('/destroy/{id}','GoodsTypeController@destroy');
    // Route::get('/upload','GoodsTypeController@upload');
});


