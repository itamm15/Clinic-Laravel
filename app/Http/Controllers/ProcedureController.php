<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Procedure;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::with('doctor')->get();

        return view('procedures.index', compact('procedures'));
    }
}
