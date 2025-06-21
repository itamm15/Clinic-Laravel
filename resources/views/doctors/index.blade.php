@extends('layout')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista lekarzy</h1>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary mb-3">Dodaj lekarza</a>
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
      @foreach($doctors as $doctor)
        <tr>
          <td>{{ $doctor->first_name }} {{ $doctor->last_name }}</td>
          <td>{{ $doctor->user->email }}</td>
          <td>{{ $doctor->phone }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
