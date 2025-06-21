@extends('layout')

@section('content')
<div class="container">
  <h1>Dodaj lekarza</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('doctors.store') }}" method="POST">
    @csrf

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="first_name" class="form-label">Imię</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="last_name" class="form-label">Nazwisko</label>
        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="phone" class="form-label">Telefon</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="date_of_birth" class="form-label">Data urodzenia</label>
        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="password" class="form-label">Hasło</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="password_confirmation" class="form-label">Potwierdź hasło</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Zapisz</button>
      <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
  </form>
</div>
@endsection
