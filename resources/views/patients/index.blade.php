@extends('layout')

@section('content')
  <h1>Lista pacjentów</h1>

  <table class="table">
    <thead>
      <tr>
        <th>Imię i nazwisko</th>
        <th>Email</th>
        <th>Telefon</th>
      </tr>
  </thead>
  <tbody>
    @foreach($patients as $patient)
      <tr>
        <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
        <td>{{ $patient->user->email }}</td>
        <td>{{ $patient->phone }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection
