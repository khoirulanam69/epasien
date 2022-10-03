<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\FacilitiesController;

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

Route::get('/', [IndexController::class, 'index']);
Route::get('/search/{keyword_dokter}', [IndexController::class, 'search']);
Route::get('/facility', [FacilitiesController::class, 'index']);
Route::get('/facility/{keyword_facility}', [FacilitiesController::class, 'search']);
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/{keyword_dokter}', [DokterController::class, 'search']);
