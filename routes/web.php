<?php

use Illuminate\Support\Facades\Route;

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
Route::get('hocsinh', 'HocsinhController@index'); 
Route::get('hocsinh/create', 'HocsinhController@create');
Route::post('hocsinh/create', 'HocsinhController@store'); 
Route::get('hocsinh/{id}/edit', 'HocsinhController@edit'); 
Route::post('hocsinh/update', 'HocsinhController@update'); 
Route::get('hocsinh/{id}/delete', 'HocsinhController@destroy');