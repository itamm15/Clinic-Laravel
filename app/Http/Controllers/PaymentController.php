<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Patient;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = auth()->user()->patient->payments ?? [];
        return view('payments.index', compact('payments'));
    }
}
