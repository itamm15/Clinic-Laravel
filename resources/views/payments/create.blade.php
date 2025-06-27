@extends('layout')

@section('content')
<div class="container">
  <h1>Dodaj płatność</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('payments.store') }}" method="POST">
    @csrf

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="patient_id" class="form-label">Pacjent</label>
        <select name="patient_id" id="patient_id" class="form-select" required>
          <option value="">-- wybierz pacjenta --</option>
          @foreach($patients as $patient)
            <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
              {{ $patient->first_name }} {{ $patient->last_name }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="col-md-6 mb-3">
        <label for="amount" class="form-label">Kwota</label>
        <input type="number" step="0.01" name="amount" id="amount" class="form-control" value="{{ old('amount') }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label for="paid_at" class="form-label">Data płatności</label>
        <input type="date" name="paid_at" id="paid_at" class="form-control" value="{{ old('paid_at') }}" required>
      </div>

      <div class="col-md-12 mb-3">
        <label for="description" class="form-label">Opis</label>
        <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
      </div>
    </div>

    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-success">Zapisz</button>
      <a href="{{ route('payments.index') }}" class="btn btn-secondary">Anuluj</a>
    </div>
  </form>
</div>
@endsection
