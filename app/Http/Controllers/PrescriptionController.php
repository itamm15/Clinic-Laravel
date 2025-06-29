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
        $prescriptions = null;

        if (auth()->user()->patient)
        {
            $prescriptions = Prescription::with('patient', 'doctor', 'visit')->where('patient_id', auth()->user()->patient->id)->get();
        } else {
            $prescriptions = Prescription::with('patient', 'doctor', 'visit')->get();
        }

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

    public function edit(Prescription $prescription)
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $visits = Visit::all();

        return view('prescriptions.edit', compact('prescription', 'patients', 'doctors', 'visits'));
    }

    public function update(PrescriptionRequest $request, Prescription $prescription)
    {
        $validated = $request->validated();

        $prescription->update($validated);
        return redirect()->route('prescriptions.index');
    }

    public function delete(Prescription $prescription)
    {
        $prescription->delete();
        return redirect()->route('prescriptions.index');
    }
}
