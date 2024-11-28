<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']) -> name('app');
//Пути пользователя

Route::get('/services', [ServiceController::class, 'index']) -> name('services');
Route::get('/services/{id}', [ServiceController::class, 'show']) -> name('service.show');
Route::get('/appointment', [AppointController::class, 'index']) -> name('appointment');

//Формы пользователя

Route::post('/store', [AppointController::class, 'store']) -> name('store');


//Пути админа

Route::get('/admin', [AdminController::class, 'index']) -> name('admin');
Route::get('/admin/service', [AdminController::class, 'service']) -> name('service');
Route::get('/admin/doctors', [AdminController::class, 'doctors']) -> name('doctors');

//Route::get('/api/dates/{serviceId}/{data}', [AppointController::class, 'getAllDatesInMonth']);
Route::get('/api/get-available-times ', [AppointController::class, 'getAvailableTimes']) -> name ('getTimeIntervals');

//Формы админа

Route::post('/admin/store', [ServiceController::class, 'store']) -> name('service.store');
Route::post('/admin/doctor', [DoctorController::class, 'store']) -> name('doctor.store');