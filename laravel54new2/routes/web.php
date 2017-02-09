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

Route::get('hello',function(){
    return 'Hello Laraa';
});

Route::get('hello1','HelloController@index');
Route::get('adminhospital','HelloController@adminhospital');
Route::get('newsall','HelloController@newsall');