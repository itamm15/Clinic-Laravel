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
        <th>Akcje</th>
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
          <td>
            @if (!$user->is_admin)
              <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Na pewno usunąć?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
              </form>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
