<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\Patient;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with('patient')->get();
        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $patients = Patient::all();
        return view('payments.create', compact('patients'));
    }

    public function store(PaymentRequest $request)
    {
        $validated = $request->validated();
        Payment::create($validated);
        return redirect()->route('payments.index');
    }
}
