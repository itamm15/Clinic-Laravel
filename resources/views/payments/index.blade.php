@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista płatności</h1>
    <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Dodaj płatność</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Pacjent</th>
        <th>Data płatności</th>
        <th>Kwota</th>
        <th>Opis</th>
        <th>Akcje</th>
      </tr>
    </thead>
    <tbody>
      @foreach($payments as $payment)
        <tr>
          <td>
            {{ $payment->patient->first_name ?? '-' }}
            {{ $payment->patient->last_name ?? '' }}
          </td>
          <td>{{ $payment->paid_at }}</td>
          <td>{{ $payment->amount }} zł</td>
          <td>{{ $payment->description ?: '-' }}</td>
          <td class="d-flex gap-2">
            <a href="#" class="btn btn-primary btn-sm">Edytuj</a>
            <form action="{{ route('payments.delete', $payment) }}" method="POST" onsubmit="return confirm('Na pewno usunąć tę płatność?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
