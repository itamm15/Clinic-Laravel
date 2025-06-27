<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProcedureRequest;
use App\Models\Procedure;
use App\Models\Doctor;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::with('doctor')->get();

        return view('procedures.index', compact('procedures'));
    }

    public function create()
    {
        $doctors = Doctor::all();

        return view('procedures.create', compact('doctors'));
    }

    public function store(ProcedureRequest $request)
    {
        Procedure::create($request->validated());
        return redirect()->route('procedures.index');
    }
}
