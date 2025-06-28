@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista pacjentów</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Dodaj pacjenta</a>
  </div>

  <input type="text" placeholder="Podaj imie lub nazwisko pacjenta" class="form-control mb-3 w-50" id="searcher">

  <table class="table">
    <thead>
      <tr>
        <th>Imię i nazwisko</th>
        <th>Email</th>
        <th>Telefon</th>
        <th>Akcje</th>
      </tr>
  </thead>
  <tbody>
    @foreach($patients as $patient)
      <tr class="data-to-filter" data-text="{{ $patient->first_name }} {{ $patient->last_name }}">
        <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
        <td>{{ $patient->user->email }}</td>
        <td>{{ $patient->phone }}</td>
        <td class="d-flex gap-2">
          <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-primary btn-sm">Edytuj</a>

          <form action="{{ route('patients.delete', $patient) }}" method="POST" onsubmit="return confirm('Na pewno usunąć?')">
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
