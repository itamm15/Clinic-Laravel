@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista lekarzy</h1>

    @if (auth()->user()->is_admin)
      <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Dodaj lekarza</a>
    @endif
  </div>

  <input type="text" placeholder="Podaj imie lub nazwisko doktora" class="form-control mb-3 w-50" id="searcher">

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
      @foreach($doctors as $doctor)
        <tr class="data-to-filter" data-text="{{ $doctor->first_name }} {{ $doctor->last_name }}">
          <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
          <td>{{ $doctor->user->email }}</td>
          <td>{{ $doctor->phone }}</td>
          <td class="d-flex gap-2">
            @if (auth()->user()->is_admin)
              <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-primary btn-sm">Edytuj</a>

              <form action="{{ route('doctors.delete', $doctor) }}" method="POST" onsubmit="return confirm('Na pewno usunąć?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Usuń</button>
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
