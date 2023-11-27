<?php

use App\Http\Controllers\Chart2Controller;
use App\Http\Controllers\ChartController;
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
    return view('chart');
});

Route::get('/chart2', function () {
    return view('chart2');
});

Route::get('/Production', [ChartController::class,'index']);
Route::get('/Timeline', [Chart2Controller::class,'index']);
