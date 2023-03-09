<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Maisonneuve - @yield('title')</title>

  {{-- Icones --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/d9c8cf8b0b.js" crossorigin="anonymous"></script>
  {{-- Fonts --}}
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  {{-- Style --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('scss/app.css') }}">
  {{-- ne laisser que le CSS dans resources! --}}
</head>

<body class="bg-dark">
  <header>
    <nav class="navbar navbar-expand-md bg-secondary navbar-light">
      <div class="container">
        <a href="{{ route('welcome') }}" class="navbar-brand"><img src="{{ asset('img/maisonneuve_logo.png') }}" height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="{{ route('etudiant.index') }}" class="nav-link {{ request()->routeIs('etudiant.index') ? 'active' : '' }}">Nos étudiants</a></li>
            <li class="nav-item"><a href="{{ route('etudiant.create') }}" class="nav-link {{ request()->routeIs('etudiant.create') ? 'active' : '' }}">Admission</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center pt-4">
        <h1 class="display-7">
          @yield('header')
        </h1>
      </div>
    </div>

    <div class="row justify-content-center mt-4">


  @yield('content')
  </div>   <!--/row justify-content-center mt-4-->
  </div>   <!--/container-->
  <footer>

  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</html>
