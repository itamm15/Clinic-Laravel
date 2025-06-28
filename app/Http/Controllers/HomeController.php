<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Prescription;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Procedure;

class HomeController extends Controller
{
    public function index() {
        $doctorsNumber = Doctor::count();
        $patientsNumber = Patient::count();
        $proceduresNumber = Procedure::count();
        $prescriptionsNumber = 0;
        $visitsNumber = 0;

        if (auth()->user()->patient)
        {
            $visitsNumber = Visit::where('patient_id', auth()->user()->patient->id)->count();
            $prescriptionsNumber = Prescription::where('patient_id', auth()->user()->patient->id)->count();
        } else if (auth()->user()->doctor)
        {
            $visitsNumber = Visit::where('doctor_id', auth()->user()->doctor->id)->count();
            $prescriptionsNumber = Prescription::where('doctor_id', auth()->user()->doctor->id)->count();
        } else if (auth()->user()->is_admin)
        {
            $visitsNumber = Visit::count();
            $prescriptionsNumber = Prescription::count();
        }

        return view('home', compact('doctorsNumber', 'patientsNumber', 'proceduresNumber', 'prescriptionsNumber', 'visitsNumber'));
    }
}
