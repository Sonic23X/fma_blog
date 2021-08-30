<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin FMA') }}</title>

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Red+Hat+Display" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="hold-transition sidebar-mini sidebar-collapse">
        <div class="wrapper">

            <nav class="main-header navbar navbar-expand navbar-dark bg-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            ¡Bienvenido, {{ Auth::user()->name }}!
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Salir') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-gradient-primary">
                <a href="{{ url('home') }}" class="brand-link text-center">
                    <img src="{{ asset('favicon.png') }}" alt="Logo" class="brand-image">
                    <span class="brand-text font-weight-light">{{ config('app.name', 'Cortes Urbo') }}</span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-header">Inicio</li>
                            <li class="nav-item">
                                <a href="{{ url( '/home') }}" class="nav-link text-light @if($menu == 'home') active @endif">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light @if($menu == 'users') active @endif">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Entradas</li>
                            <li class="nav-item">
                                <a href="{{ url( '/blog') }}" class="nav-link text-light @if($menu == 'blogs') active @endif">
                                    <i class="nav-icon fas fa-feather-alt"></i>
                                    <p>
                                        Blog
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Suscripciones</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light @if($menu == 'companies') active @endif">
                                    <i class="nav-icon fas fa-building"></i>
                                    <p>
                                        Empresas
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light @if($menu == 'assets') active @endif">
                                    <i class="nav-icon fas fa-boxes"></i>
                                    <p>
                                        Activos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-header">Información</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light @if($menu == 'bugs') active @endif">
                                    <i class="nav-icon fas fa-inbox"></i>
                                    <p>
                                        Movimientos
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-light @if($menu == 'bugs') active @endif">
                                    <i class="nav-icon fas fa-bug"></i>
                                    <p>
                                        Errores
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">

                @yield('content')
                
            </div>
        </div>
        
        @yield('script')
    </body>
</html>
