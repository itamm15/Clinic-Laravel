<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrescriptionRequest;
use App\Models\Prescription;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Visit;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('patient', 'doctor', 'visit')->get();

        return view('prescriptions.index', compact('prescriptions'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $visits = Visit::all();

        return view('prescriptions.create', compact('patients', 'doctors', 'visits'));
    }

    public function store(PrescriptionRequest $request)
    {
        $validated = $request->validated();

        $prescription = Prescription::create($validated);
        return redirect()->route('prescriptions.index');
    }
}
