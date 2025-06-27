@extends('layout')

@section('content')
  <h1>Lista uzytkowników</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Imię i nazwisko</th>
        <th>Typ</th>
        <th>Email</th>
        <th>Telefon</th>
      </tr>
    </thead>

    <tbody>
      @foreach($users as $user)
        <tr>
          <td>
            @if ($user->patient)
              {{ $user->patient->first_name }} {{ $user->patient->last_name }}
            @elseif ($user->doctor)
              {{ $user->doctor->first_name }} {{ $user->doctor->last_name }}
            @endif
          </td>
          <td>
            @if ($user->patient)
              Pacjent
            @elseif ($user->doctor)
              Doktor
            @endif
          </td>
          <td>{{ $user->email }}</td>
          <td>
            @if ($user->patient)
              {{ $user->patient->phone }}
            @elseif ($user->doctor)
              {{ $user->doctor->phone }}
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
