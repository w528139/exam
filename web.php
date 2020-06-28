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

Route::get('register','Admin@register');

Route::get('login','Admin@login');

Route::get('userinfo','Admin@userInfo');

Route::get('repass','Admin@repass');

Route::post('register/do','Admin@registerDo');

Route::post('userinfo/change','Admin@userInfoChange');

Route::post('repass/do','Admin@repassDo');

Route::post('repass/do','Admin@repassDo');