<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // landing page
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

    // payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
});

require __DIR__.'/auth.php';
