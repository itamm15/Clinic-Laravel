<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProcedureController;
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
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{payment}', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payment}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete("/payments/{payment}", [PaymentController::class, 'delete'])->name('payments.delete');

    // visits
    Route::get('/visits', [VisitController::class, 'index'])->name('visits.index');
    Route::get('/visits/create', [VisitController::class, 'create'])->name('visits.create');
    Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');
    Route::get('/visits/{visit}', [VisitController::class, 'edit'])->name('visits.edit');
    Route::put('/visits/{visit}', [VisitController::class, 'update'])->name('visits.update');
    Route::delete("/visits/{visit}", [VisitController::class, 'delete'])->name('visits.delete');

    // documents
    Route::get("/documents", [DocumentController::class, 'index'])->name('documents.index');
    Route::get("/documents/create", [DocumentController::class, 'create'])->name('documents.create');
    Route::post("/documents", [DocumentController::class, 'store'])->name('documents.store');
    Route::get("/documents/{document}", [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put("/documents/{document}", [DocumentController::class, 'update'])->name('documents.update');
    Route::delete("/documents/{document}", [DocumentController::class, 'delete'])->name('documents.delete');

    // prescriptions
    Route::get("/prescriptions", [PrescriptionController::class, 'index'])->name('prescriptions.index');
    Route::get("/prescriptions/create", [PrescriptionController::class, 'create'])->name('prescriptions.create');
    Route::post("/prescriptions", [PrescriptionController::class, 'store'])->name('prescriptions.store');
    Route::get("/prescriptions/{prescription}", [PrescriptionController::class, 'edit'])->name('prescriptions.edit');
    Route::put("/prescriptions/{prescription}", [PrescriptionController::class, 'update'])->name('prescriptions.update');
    Route::delete("/prescriptions/{prescription}", [PrescriptionController::class, 'delete'])->name('prescriptions.delete');

    // procedures
    Route::get("/procedures", [ProcedureController::class, 'index'])->name('procedures.index');
    Route::get("/procedures/create", [ProcedureController::class, 'create'])->name('procedures.create');
    Route::post("/procedures", [ProcedureController::class, 'store'])->name('procedures.store');
    Route::get("/procedures/{procedure}", [ProcedureController::class, 'edit'])->name('procedures.edit');
    Route::put("/procedures/{procedure}", [ProcedureController::class, 'update'])->name('procedures.update');
    Route::delete("/procedures/{procedure}", [ProcedureController::class, 'delete'])->name('procedures.delete');
});

require __DIR__.'/auth.php';
