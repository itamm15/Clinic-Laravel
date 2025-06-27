<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::with('doctor', 'patient')->get();

        return view('visits.index', compact('visits'));
    }
}
