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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('scss/app.css') }}">
</head>

<body class="bg-dark">
  @php $locale = session()->get('locale'); @endphp

  <header>
    <nav class="navbar navbar-expand-md bg-secondary navbar-light">
      <div class="container">
        <a href="{{ route('welcome') }}" class="navbar-brand"><img src="{{ asset('img/maisonneuve_logo.png') }}"
            height="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
          <span class="navbar-toggler-icon"></span>
        </button>
        @if ($auth)
          <p>@lang('lang.hello'), {{ $auth->student->name }}!</p>
        @else
          <p>@lang('lang.hello'), @lang('lang.guest')!</p>
        @endif
        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="{{ route('student.index') }}"
                class="nav-link {{ request()->routeIs('student.index') ? 'active' : '' }}">@lang('lang.our_students')</a>
            </li>
            @if (!$auth)
              <li class="nav-item">
                <a href="{{ route('user.create') }}"
                  class="nav-link {{ request()->routeIs('user.create') ? 'active' : '' }}">@lang('lang.admission')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('login') }}"
                  class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">@lang('lang.login')</a>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ route('article.index') }}"
                  class="nav-link {{ request()->routeIs('article.index') ? 'active' : '' }}">@lang('lang.articles')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('article.userArticle') }}"
                  class="nav-link {{ request()->routeIs('article.userArticle') ? 'active' : '' }}">@lang('lang.my_articles')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('article.create') }}"
                class="nav-link {{ request()->routeIs('article.create') ? 'active' : '' }}">@lang('lang.write')</a>
              </li>
              <span class="border-end border-dark mx-3"></span>
              <li class="nav-item">
                <a href="{{ route('document.index') }}"
                  class="nav-link {{ request()->routeIs('document.index') ? 'active' : '' }}">@lang('lang.documents')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('document.userDocument') }}"
                  class="nav-link {{ request()->routeIs('document.userDocument') ? 'active' : '' }}">@lang('lang.my_documents')</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('document.create') }}"
                class="nav-link {{ request()->routeIs('document.create') ? 'active' : '' }}">@lang('lang.upload')</a>
              </li>
              <span class="border-end border-dark mx-3"></span>
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">@lang('lang.logout')</a>
              </li>
              <span class="border-end border-dark mx-3"></span>
            @endif
            <li class="nav-item">
              <a class="nav-link @if ($locale != 'fr') active @endif" href="/lang/en">EN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if ($locale == 'fr') active @endif" href="/lang/fr">FR</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="container">
    <div class="row">
      <div class="col-12 text-center pt-4">
        <h1 class="display-7 text-light">
          @yield('header')
        </h1>
      </div>
    </div>

    <div class="row justify-content-center mt-4">


      @yield('content')
    </div>
  </main>
  <footer class="container mb-3">
    <div class="text-secondary text-center">&copy; <i>@lang('lang.copyrights')rizorizo.art</i></div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</html>
