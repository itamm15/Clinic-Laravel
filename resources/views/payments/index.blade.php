@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Płatności</h2>
    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Dodaj płatność</a>
  </div>
    <ul>
        @foreach ($payments as $payment)
            <li>
                {{ $payment->paid_at }} – {{ $payment->amount }} zł – {{ $payment->description }}
            </li>
        @endforeach
    </ul>
@endsection
