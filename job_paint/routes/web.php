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


Route::post('ws/create_new', 'car_paint@create_new');
Route::post('ws/update', 'car_paint@updateStatus');
Route::post('ws/allprogress', 'car_paint@allProgress');
Route::post('ws/allqueue', 'car_paint@allQueue');
Route::post('ws/allcarspainted', 'car_paint@allCarsPainted');

Route::get('/', function () {
    return view('homepage');
});
Route::get('paint_jobs', function () {
    return view('paint_jobs');
});
