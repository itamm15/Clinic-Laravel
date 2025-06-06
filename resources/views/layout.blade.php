<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8">
  <title>Przychodnia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
              <a class="nav-link active">
                🏠 Strona główna
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('patients.index') }}">
                🩺 Pacjenci
              </a>
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
