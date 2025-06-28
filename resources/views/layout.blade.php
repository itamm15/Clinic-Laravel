<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Przychodnia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <!-- filter -->
  <script src="{{ asset('js/filter.js') }}"></script>
</head>

<body>

  <div class="container-fluid">
    <div class="row min-vh-100">

    <!-- Sidebar -->
    <nav class="col-lg-2 bg-light d-flex flex-column">
      <div class="pt-3 px-3 flex-grow-1">
        <h4 class="mb-4"><i class="bi bi-hospital"></i><span class="mx-2"> Świtalka</span></h4>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">
              <i class="bi bi-house-door"></i> Strona główna
            </a>
          </li>
          <li class="nav-item">
            @if(auth()->user()->is_admin)

              <a class="nav-link" href="{{ route('patients.index') }}">
                <i class="bi bi-person"></i><span class="mx-2">Pacjenci</span>
              </a>
              <a class="nav-link" href="{{ route('doctors.index') }}">
                <i class="bi bi-activity"></i><span class="mx-2">Lekarze</span>
              </a>
              <a class="nav-link" href="{{ route('payments.index') }}">
                <i class="bi bi-piggy-bank"></i><span class="mx-2">Platności</span>
              </a>
              <a class="nav-link" href="{{ route('visits.index') }}">
                <i class="bi bi-calendar-date"></i><span class="mx-2">Wizyty</span>
              </a>
              <a class="nav-link" href="{{ route('documents.index') }}">
                <i class="bi bi-file-earmark-text-fill"></i><span class="mx-2">Dokumenty</span>
              </a>
              <a class="nav-link" href="{{ route('prescriptions.index') }}">
                <i class="bi bi-prescription"></i><span class="mx-2">Recepty</span>
              </a>
              <a class="nav-link" href="{{ route('procedures.index') }}">
                <i class="bi bi-bandaid-fill"></i><span class="mx-2">Zabiegi</span>
              </a>
              <a class="nav-link" href="{{ route('users.index') }}">
                <i class="bi bi-people"></i><span class="mx-2">Uzytkownicy</span>
              </a>

            @elseif(auth()->user()->doctor)

              <a class="nav-link" href="{{ route('patients.index') }}">
                <i class="bi bi-person"></i><span class="mx-2">Pacjenci</span>
              </a>
              <a class="nav-link" href="{{ route('doctors.index') }}">
                <i class="bi bi-activity"></i><span class="mx-2">Lekarze</span>
              </a>
              <a class="nav-link" href="{{ route('payments.index') }}">
                <i class="bi bi-piggy-bank"></i><span class="mx-2">Platności</span>
              </a>
              <a class="nav-link" href="{{ route('visits.index') }}">
                <i class="bi bi-calendar-date"></i><span class="mx-2">Wizyty</span>
              </a>
              <a class="nav-link" href="{{ route('documents.index') }}">
                <i class="bi bi-file-earmark-text-fill"></i><span class="mx-2">Dokumenty</span>
              </a>
              <a class="nav-link" href="{{ route('prescriptions.index') }}">
                <i class="bi bi-prescription"></i><span class="mx-2">Recepty</span>
              </a>
              <a class="nav-link" href="{{ route('procedures.index') }}">
                <i class="bi bi-bandaid-fill"></i><span class="mx-2">Zabiegi</span>
              </a>

            @elseif(auth()->user()->patient)

              <a class="nav-link" href="{{ route('doctors.index') }}">
                <i class="bi bi-activity"></i><span class="mx-2">Lekarze</span>
              </a>
              <a class="nav-link" href="{{ route('payments.index') }}">
                <i class="bi bi-piggy-bank"></i><span class="mx-2">Platności</span>
              </a>
              <a class="nav-link" href="{{ route('visits.index') }}">
                <i class="bi bi-calendar-date"></i><span class="mx-2">Wizyty</span>
              </a>
              <a class="nav-link" href="{{ route('documents.index') }}">
                <i class="bi bi-file-earmark-text-fill"></i><span class="mx-2">Dokumenty</span>
              </a>
              <a class="nav-link" href="{{ route('prescriptions.index') }}">
                <i class="bi bi-prescription"></i><span class="mx-2">Recepty</span>
              </a>
              <a class="nav-link" href="{{ route('procedures.index') }}">
                <i class="bi bi-bandaid-fill"></i><span class="mx-2">Zabiegi</span>
              </a>

            @endif
          </li>
        </ul>
      </div>

      <div class="p-3 mt-auto border-top">
        <div class="d-flex align-items-center mb-3">
          <i class="bi bi-person-circle fs-3 text-secondary me-2"></i>
          <div>
            <strong>
              @if (Auth::user()->doctor)
                {{ Auth::user()->doctor->first_name }} {{ Auth::user()->doctor->last_name }}
              @elseif (Auth::user()->patient)
                {{ Auth::user()->patient->first_name }} {{ Auth::user()->patient->last_name }}
              @endif
            </strong>
            <div class="text-muted small">
              @if (Auth::user()->doctor)
                Doktor
              @elseif (Auth::user()->patient)
                Pacjent
              @else
                Admin
              @endif
            </div>
          </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-outline-danger btn-sm w-100">
            <i class="bi bi-box-arrow-right me-1"></i> Wyloguj się
          </button>
        </form>
      </div>
    </nav>

      <!-- Główna zawartość -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-4">
        @yield('content')
      </main>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
