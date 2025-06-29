<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VisitRequest;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Visit;

class VisitController extends Controller
{
    public function index()
    {
        $visits = null;

        if (auth()->user()->patient)
        {
            $visits = Visit::with('doctor', 'patient')->where('patient_id', auth()->user()->patient->id)->get();
        } else
        {
            $visits = Visit::with('doctor', 'patient')->get();
        }

        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('visits.create', compact('doctors', 'patients'));
    }

    public function store(VisitRequest $request)
    {
        $validated = $request->validated();
        Visit::create($validated);
        return redirect()->route('visits.index');
    }

    public function edit(Visit $visit)
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('visits.edit', compact('visit', 'doctors', 'patients'));
    }

    public function update(VisitRequest $request, Visit $visit)
    {
        $validated = $request->validated();
        $visit->update($validated);
        return redirect()->route('visits.index');
    }

    public function delete(Visit $visit)
    {
        $visit->delete();
        return redirect()->route('visits.index');
    }

    public function cancel(Visit $visit)
    {
        $visit->update(['active' => 0]);

        return redirect()->route('visits.index');
    }
}
