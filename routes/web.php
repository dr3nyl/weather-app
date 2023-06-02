<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return Config::get('services.weather.endpoint')
    // .Config::get('services.weather.query')
    // .'tokyo,JP'
    // .Config::get('services.weather.additional_query')
    // .Config::get('services.weather.key');
});
