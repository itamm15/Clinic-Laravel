@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista pacjentów</h1>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Dodaj pacjenta</a>
  </div>

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
