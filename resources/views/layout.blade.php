<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Przychodnia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

  <div class="container-fluid">
    <div class="row min-vh-100">

      <!-- Sidebar -->
      <nav class="col-lg-2 bg-light">
        <div class="pt-3 px-3">
          <h4 class="mb-4">🏥 Przychodnia</h4>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="{{ route('home') }}">
                🏠 Strona główna
              </a>
            </li>
            <li class="nav-item">
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
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-danger">Wyloguj się</button>
              </form>
            </li>
          </ul>
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
