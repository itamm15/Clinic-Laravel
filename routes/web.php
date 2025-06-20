<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;

Route::get('/', [HomeController::class, 'index']);
Route::get("/patients", [PatientController::class, 'index'])->name('patients.index');
Route::get("/doctors", [DoctorController::class, 'index'])->name('doctors.index');
