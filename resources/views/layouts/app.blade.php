<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    @yield('script')
</head>

<body>
    <div id="app" class="h-screen">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      <form class="form-inline" action="{{route('vehicle.search')}}">
                        <input class="form-control mr-sm-2" type="text" name="arg" placeholder="Ingrese la placa del vehículo">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                      </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))<!--Si no se ha registrado o logeado-->
                        <li class="nav-item">
                        </li>
                        @endif
                        @else
                        @if (Auth::user()->rol == 'Mecanico')
                          <li  class="nav-item">
                            <a
                              class="nav-link"
                              href="{{route('mechanical.index')}}">
                              Mis tareas
                            </a>
                          </li>
                        @else
                        <li  class="nav-item">
                          <a
                            class="nav-link"
                            href="{{route('userManagment')}}">
                            Gestion de usuarios
                          </a>
                        </li>
                        <li  class="nav-item">
                          <a
                            class="nav-link"
                            href="{{route('vehicle.history')}}" >
                            Historial de vehículos
                          </a>
                        </li>
                        <li  class="nav-item">
                          <a
                            class="nav-link"
                            href="{{route('worksheet.index')}}" >
                            Hojas de trabajo
                          </a>
                        </li>
                        <li  class="nav-item">
                          <a
                            class="nav-link"
                            href="{{route('balance.index')}}" >
                            Clientes
                          </a>
                        </li>

                      @endif
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @include('partials/_session-status')
            @include('partials/_session-error')
            @guest
            @else
              @if (Auth::user()->rol == 'Mecanico')
                <div class="fixed-action-btn">
                  <a href="{{route('mechanical.index')}}" class="btn-floating btn-large red">
                    <img
                    class="large material-icons"
                    src="{{asset('img/my-task.png')}}"
                    alt="task"
                    style="margin-left: 15px; margin-top: 15px">
                  </a>
                </div>
              @else
                <div class="fixed-action-btn">
                  <a
                    href="{{route('client.index')}}"
                    class="btn-floating btn-large red">
                    <img
                    class="large material-icons"
                    src="{{asset('img/plus-white.png')}}"
                    alt="plus"
                    style="margin-left: 15px; margin-top: 15px">
                  </a>
                </div>
              @endif

            @endguest

            @yield('content')
        </main>
    </div>

    <footer class="page-footer font-small blue pt-4">
  </footer>
  @yield('scriptFooter')
</body>

</html>
