<!DOCTYPE html>
<html lang="cs-CZ" class="h-100 d-flex flex-column">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />  
  <meta name="author" content="Michal Vymazal" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>@yield('title', env('APP_NAME'))</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}"></script>  
</head>

<body class="d-flex flex-column" style="flex-grow:1;">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('') }}">{{ env('APP_NAME') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">                  
          @auth
            @if (auth()->user()->hasRole('admin'))
              <li class="nav-item ml-5 text-center">
                <a href="{{ route('admin') }}" class="nav-link text-white">Administrace</a>
              </li>
            @endif            
            <li class="nav-item ml-5 text-center">
              <a class="nav-link text-success">{{ auth()->user()->name }}</a>
            </li>
            <li class="nav-item">                            
              <a class="nav-link text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Odhlásit se</a>
              <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                @csrf
              </form>
            </li>
          @else
            <li class="nav-item ml-5">
              <a class="nav-link text-success" href="{{ route('login') }}">Přihlásit</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-primary" href="{{ route('register') }}">Registrace</a>
            </li>
          @endauth          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container" style="flex-grow:1;">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Michal Vymazal 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  @stack('scripts')
</body>

</html>
