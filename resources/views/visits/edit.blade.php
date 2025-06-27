@extends('layout')

@section('content')
<div class="container">
  <h1>Edytuj wizytę</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('visits.update', $visit->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="doctor_id" class="form-label">Lekarz</label>
        <select name="doctor_id" id="doctor_id" class="form-select" required>
          <option value="">-- wybierz lekarza --</option>
          @foreach ($doctors as $doctor)
            <option value="{{ $doctor->id }}"
              {{ old('doctor_id', $visit->doctor_id) == $doctor->id ? 'selected' : '' }}>
              {{ $doctor->first_name }} {{ $doctor->last_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label for="patient_id" class="form-label">Pacjent</label>
        <select name="patient_id" id="patient_id" class="form-select" required>
          <option value="">-- wybierz pacjenta --</option>
          @foreach ($patients as $patient)
            <option value="{{ $patient->id }}"
              {{ old('patient_id', $visit->patient_id) == $patient->id ? 'selected' : '' }}>
              {{ $patient->first_name }} {{ $patient->last_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label for="datetime" class="form-label">Data i godzina</label>
        <input type="datetime-local" name="datetime" id="datetime" class="form-control"
          value="{{ old('datetime', \Carbon\Carbon::parse($visit->datetime)->format('Y-m-d\TH:i')) }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="active" class="form-label">Status</label>
        <select name="active" id="active" class="form-select" required>
          <option value="1" {{ old('active', $visit->active) == 1 ? 'selected' : '' }}>Aktywna</option>
          <option value="0" {{ old('active', $visit->active) == 0 ? 'selected' : '' }}>Nieaktywna</option>
        </select>
      </div>

      <div class="col-md-12 mb-3">
        <label for="description" class="form-label">Opis</label>
        <input type="text" name="description" id="description" class="form-control"
          value="{{ old('description', $visit->description) }}">
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Zapisz zmiany</button>
      <a href="{{ route('visits.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
  </form>
</div>
@endsection
