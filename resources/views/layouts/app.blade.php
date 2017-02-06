<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Zogan System</title>

  <!-- Styles -->
  <link href="{{asset('css/all.css')}} " rel="stylesheet">
  <link href="{{asset('fileinput/css/fileinput.min.css')}} " media="all" rel="stylesheet" type="text/css" />

  <link href="{{asset('css/vendor/estilos.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('css/alert.css')}}" >
  <link rel="stylesheet" href="{{asset('css/nprogress.css')}}" >

  <script  src="{{asset('js/vendor/jquery.js')}} "></script>
  <script  src="{{asset('js/all.js')}} "></script>
  <script  src="{{asset('fileinput/js/fileinput.js')}} " type="text/javascript"></script>
  <script  src="{{asset('fileinput/js/locales/es.js')}} " type="text/javascript"></script>
  <script  src="{{asset('js/alert.js')}} " type="text/javascript"></script>
  <script  src="{{asset('js/nprogress.js')}} " type="text/javascript"></script>
  
  <script src=""></script>
  <script>
    window.Laravel = {!! json_encode([
      'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top"  >
        <div class="container">
          <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class=" li-nav navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
              <span class="sr-only">Mostrar navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @if (Auth::guest())
            <a class="navbar-brand" href="{{ url('/') }}">
              <img alt="Brand" src="{{asset('/img/gandocam.png')}}" class="img-responsive" width="120px">
            </a>
            @else
            <a class="navbar-brand" href="{{ url('/') }}">
              <img alt="Brand" src="{{asset('/img/gandocam.png')}}" class="img-responsive" width="120px">
            </a>
            @endif
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
              &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
              <li class="li-nav"><a href="{{ url('/login') }}">Entrar</a></li> 
              <!-- <li><a href="{{ url('/register') }}">Registrarse</a></li> --> 
              @else
              <li class="dropdown li-nav">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    Cerrar sesión
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    @yield('content')
  </div>

  <!-- Scripts -->



</body>
</html>
