<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointController;
use App\Http\Controllers\ServeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('app');


Route::get('/services', [ServeController::class, 'index']) -> name('services');
Route::get('/appointment', [AppointController::class, 'index']) -> name('appointment');
Route::get('/store', [AppointController::class, 'store']) -> name('store');
Route::get('/admin', [AdminController::class, 'index']) -> name('admin');