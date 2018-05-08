<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LifePlacing') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'LifePlacing') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                           <li>
                            <form method="POST" class="login-form" action="{{ url('/login') }}">                                
                            @csrf
                            <div class="form-inline">
                                <div class="form-group mx-sm-2 mb-1">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Digite seu E-mail"> 
                                </div>
                                <div class="form-group mx-sm-2 mb-1">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Digite sua Senha">
                                </div>
                                <div class="form-group mx-sm-1 mb-1">
                                    <button type="submit" class="btn btn-primary">{{ __('Entrar') }}</button>
                                </div>
                            </div>
                            <div class="form-inline d-flex flex-row-reverse ">
                                <div class="">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                    </a>
                                </div>
                            </div>

                            </form>
                            </li>

                        @else
                        
                            <li> 

                            @if (empty(Auth::user()->foto)) :
                            <img src="{{asset('uploads/avatars/images/perfil/user.jpg')}}" class="thumb-head rounded-circle">
                            @else :
                                <img src="{{ asset('uploads/avatars/'.Auth::user()->id.'/'.Auth::user()->foto ) }}" class="thumb-head rounded-circle">
                                
                            @endif                              
                        
                            </li>
                                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a href="{{ route('home') }}" class="dropdown-item">Home</a>

                                    <a href="{{ route('user.Perfil') }}" class="dropdown-item">Perfil</a>

                                    <a href="{{ route('trocaSenha')}}" class="dropdown-item">Mudar Senha</a>

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
                    </ul>
                </div>
            </div>
        </nav>

        
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
