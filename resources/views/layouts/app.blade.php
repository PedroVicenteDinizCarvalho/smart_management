<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Preloader Style -->
    <style>
        #preloader{
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95vh;
        }
        .loading{
            font-family: 'Orbitron', sans-serif;
            font-size: 7px;
            animation: blink .9s ease-in-out infinite;
        }
        .triangle{
            stroke-dasharray: 17;
            animation: dash 2.5s cubic-bezier(0.35, 0.04, 0.63, 0.95) infinite;
        }
        @keyframes dash{
            to{
                stroke-dashoffset: 136;
            }
        }
        @keyframes blink{
            50%{
                opacity: 0;
            }
        }   
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
</head>
<body>
    <div id="preloader">
        <svg width="200" height="200" viewBox="0 0 40 60"> 
            <polygon class="triangle" fill="none" stroke="#fff" stroke-width="1" points="16,1 32,32 1,32" />
            <text class="loading" x="0" y="45" fill="#fff">Loading...</text>
        </svg>
    </div>
    <div id="app" style="display: none;">
        <top-component titulo="{{ config('app.name', 'Laravel') }}" url="{{ url('/') }}">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
        </top-component>
        
        <!-- Blade Templates -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
