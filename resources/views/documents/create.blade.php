@extends('layout')

@section('content')
<div class="container">
  <h1>Dodaj dokument</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('documents.store') }}" method="POST">
    @csrf

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="patient_id" class="form-label">Pacjent</label>
        <select name="patient_id" id="patient_id" class="form-select" required>
          <option value="">-- wybierz pacjenta --</option>
          @foreach ($patients as $patient)
            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
              {{ $patient->first_name }} {{ $patient->last_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label for="date" class="form-label">Data</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}" required>
      </div>

      <div class="col-md-12 mb-3">
        <label for="description" class="form-label">Opis</label>
        <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required>
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Zapisz</button>
      <a href="{{ route('documents.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
  </form>
</div>
@endsection
