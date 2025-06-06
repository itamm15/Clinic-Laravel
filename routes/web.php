<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;

Route::get('/', [HomeController::class, 'index']);
Route::get("/patients", [PatientController::class, 'index'])->name('patients.index');
