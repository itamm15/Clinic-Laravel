@extends('layout')

@section('content')
    <h2>Płatności</h2>
    <a class="btn btn-primary mb-3">Dodaj płatność</a>
    <ul>
        @foreach ($payments as $payment)
            <li>
                {{ $payment->paid_at }} – {{ $payment->amount }} zł – {{ $payment->description }}
            </li>
        @endforeach
    </ul>
@endsection
