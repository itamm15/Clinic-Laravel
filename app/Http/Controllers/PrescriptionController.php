<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::with('patient', 'doctor', 'visit')->get();

        return view('prescriptions.index', compact('prescriptions'));
    }
}
