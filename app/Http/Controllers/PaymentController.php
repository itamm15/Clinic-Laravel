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
        $payments = null;
        if (auth()->user()->patient)
        {
            $payments = Payment::with('patient')->where('patient_id', auth()->user()->patient->id)->get();
        }
        else
        {
            $payments = Payment::with('patient')->get();
        }

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

    public function edit(Payment $payment)
    {
        $patients = Patient::all();
        return view('payments.edit', compact('payment', 'patients'));
    }

    public function update(PaymentRequest $request, Payment $payment)
    {
        $validated = $request->validated();
        $payment->update($validated);
        return redirect()->route('payments.index');
    }

    public function delete(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index');
    }
}
