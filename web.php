<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('news/add','NewsController@newsAdd');

Route::post('news/update','NewsController@newsUpdate');

Route::get('news/del','NewsController@newsDel');

Route::get('news/get','NewsController@newsGet');