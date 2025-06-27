@extends('layout')

@section('content')
<div class="container">
  <h1>Dodaj zabieg</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('procedures.store') }}" method="POST">
    @csrf

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="doctor_id" class="form-label">Lekarz</label>
        <select name="doctor_id" id="doctor_id" class="form-select" required>
          <option value="">-- wybierz lekarza --</option>
          @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
              {{ $doctor->first_name }} {{ $doctor->last_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-12 mb-3">
        <label for="description" class="form-label">Opis zabiegu</label>
        <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Zapisz</button>
      <a href="{{ route('procedures.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
  </form>
</div>
@endsection
