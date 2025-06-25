<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;

Route::get('/', [HomeController::class, 'index']);

// doctors
Route::get("/doctors", [DoctorController::class, 'index'])->name('doctors.index');
Route::get("/doctors/create", [DoctorController::class, 'create'])->name('doctors.create');
Route::post("/doctors", [DoctorController::class, 'store'])->name('doctors.store');
Route::get("/doctors/{doctor}", [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put("/doctors/{doctor}", [DoctorController::class, 'update'])->name('doctors.update');
Route::delete("/doctors/{doctor}", [DoctorController::class, 'delete'])->name('doctors.delete');

// patients
Route::get("/patients", [PatientController::class, 'index'])->name('patients.index');
Route::get("/patients/create", [PatientController::class, 'create'])->name('patients.create');
Route::post("/patients", [PatientController::class, 'store'])->name('patients.store');
Route::get("/patients/{patient}", [PatientController::class, 'edit'])->name('patients.edit');
Route::put("/patients/{patient}", [PatientController::class, 'update'])->name('patients.update');
Route::delete("/patients/{patient}", [PatientController::class, 'delete'])->name('patients.delete');
