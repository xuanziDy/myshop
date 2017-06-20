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

Route::group(['prefix' => 'GoodsCategory','middleware' =>'web'], function () {
    Route::get('/index','GoodsCategoryController@index')->name('GoodsCateIndex');
    Route::get('/add/{name?}','GoodsCategoryController@add')->name('GoodsCateAdd');
    Route::get('/edit/{id}','GoodsCategoryController@edit')->name('GoodsCateEdit');
    Route::get('/del/{id}','GoodsCategoryController@del')->name('GoodsCateDel');
    Route::post('/save','GoodsCategoryController@save')->name('GoodsCateSave');
});

Route::group(['prefix' => 'GoodsBrand','middleware' =>'web'], function () {
    Route::get('/index','GoodsBrandController@index');
    Route::any('/create','GoodsBrandController@create');
    Route::post('/store','GoodsBrandController@store');
    Route::get('/edit/{id}','GoodsBrandController@edit');
    Route::get('/del/{id}','GoodsBrandController@del');
    Route::get('/upload','GoodsBrandController@upload');
});


