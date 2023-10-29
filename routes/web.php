<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerController;
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

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('home');
    });

Route::resource('cars', CarController::class);
Route::resource('workers', WorkerController::class);
Route::resource('services', ServiceController::class);
Route::resource('details', DetailController::class);