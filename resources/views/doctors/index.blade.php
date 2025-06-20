@extends('layout')

@section('content')
  <h1>Lista lekarzy</h1>

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
