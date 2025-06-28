@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista płatności</h1>
    @if (auth()->user()->is_admin)
      <a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Dodaj płatność</a>
    @endif
  </div>

  <input type="text" placeholder="Podaj opis" class="form-control mb-3 w-50" id="searcher">

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
        <tr class="data-to-filter" data-text="{{ $payment->description }} ">
          <td>
            {{ $payment->patient->first_name ?? '-' }}
            {{ $payment->patient->last_name ?? '' }}
          </td>
          <td>{{ $payment->paid_at }}</td>
          <td>{{ $payment->amount }} zł</td>
          <td>{{ $payment->description ?: '-' }}</td>
          <td class="d-flex gap-2">
            @if (auth()->user()->is_admin)
              <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
              <form action="{{ route('payments.delete', $payment) }}" method="POST" onsubmit="return confirm('Na pewno usunąć tę płatność?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
              </form>
            @else
              Brak akcji
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
