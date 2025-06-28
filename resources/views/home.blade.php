@extends('layout')

@section('content')
  <div class="row">
    <div class="col-md-3">
      <div class="card text-bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Wizyty</h5>
          <p class="card-text display-6">{{ $visitsNumber }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Lekarze</h5>
          <p class="card-text display-6">{{ $doctorsNumber }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Pacjenci</h5>
          <p class="card-text display-6">{{ $patientsNumber }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Recepty</h5>
          <p class="card-text display-6">{{ $prescriptionsNumber }}</p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card text-bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Zabiegi</h5>
          <p class="card-text display-6">{{ $proceduresNumber }}</p>
        </div>
      </div>
    </div>
  </div>

@endsection
