@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista wizyt</h1>

    @if(auth()->user()->is_admin || auth()->user()->doctor)
      <a href="{{ route('visits.create') }}" class="btn btn-primary">Dodaj wizytę</a>
    @endif
  </div>

  <input type="text" placeholder="Podaj opis" class="form-control mb-3 w-50" id="searcher">

  <table class="table">
    <thead>
      <tr>
        <th>Lekarz</th>
        <th>Pacjent</th>
        <th>Data i godzina</th>
        <th>Opis</th>
        <th>Status</th>
        <th>Akcje</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($visits as $visit)
        <tr class="data-to-filter" data-text="{{ $visit->description }} ">
          <td>{{ $visit->doctor->first_name }} {{ $visit->doctor->last_name }}</td>
          <td>{{ $visit->patient->first_name }} {{ $visit->patient->last_name }}</td>
          <td>{{ $visit->datetime }}</td>
          <td>{{ $visit->description ?: '-' }}</td>
          <td>
            @if ($visit->active)
              <span class="badge bg-success">Aktywna</span>
            @else
              <span class="badge bg-secondary">Nieaktywna</span>
            @endif
          </td>
          <td class="d-flex gap-2">
            @if(auth()->user()->is_admin || auth()->user()->doctor)
              <a href="{{ route('visits.edit', $visit) }}" class="btn btn-primary btn-sm">Edytuj</a>

              <form action="{{ route('visits.cancel', $visit) }}" method="POST" onsubmit="return confirm('Na pewno odwołać wizytę?')">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger btn-sm">Odwołaj</button>
              </form>

              @if ($visit->active)
                <form action="{{ route('visits.delete', $visit) }}" method="POST" onsubmit="return confirm('Na pewno usunąć wizytę?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                </form>
              @endif
            @else
              @if ($visit->active)
                <form action="{{ route('visits.cancel', $visit) }}" method="POST" onsubmit="return confirm('Na pewno odwołać wizytę?')">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="btn btn-danger btn-sm">Odwołaj</button>
                </form>
              @else
                Brak akcji
              @endif
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
