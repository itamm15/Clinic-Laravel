@extends('layout')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Recepty</h2>
  @if (!auth()->user()->patient)
    <a href="{{ route('prescriptions.create') }}" class="btn btn-primary mb-3">Dodaj receptę</a>
  @endif
</div>

<input type="text" placeholder="Podaj opis" class="form-control mb-3 w-50" id="searcher">

<table class="table">
  <thead>
    <tr>
      <th>Pacjent</th>
      <th>Lekarz</th>
      <th>Wizyta</th>
      <th>Data</th>
      <th>Opis</th>
      <th>Akcje</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($prescriptions as $prescription)
      <tr class="data-to-filter" data-text="{{ $prescription->description }} ">
        <td>{{ $prescription->patient->first_name }} {{ $prescription->patient->last_name }}</td>
        <td>{{ $prescription->doctor->first_name }} {{ $prescription->doctor->last_name }}</td>
        <td>
          @if($prescription->visit)
            {{ $prescription->visit->datetime }}, {{ $prescription->visit->description }}
          @else
            brak
          @endif
        </td>
        <td>{{ $prescription->date }}</td>
        <td>{{ $prescription->description }}</td>
        <td class="d-flex gap-2">
          @if (!auth()->user()->patient)
            <a href="{{ route('prescriptions.edit', $prescription->id) }}" class="btn btn-primary btn-sm">Edytuj</a>
            <form action="{{ route('prescriptions.delete', $prescription->id) }}" method="POST" onsubmit="return confirm('Na pewno usunąć?')">
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
