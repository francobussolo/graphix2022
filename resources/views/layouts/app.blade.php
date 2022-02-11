<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@stack('css')    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@stack('js')

</head>

<body class="d-flex flex-column h-100 bg-pantone-2020">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="home" viewBox="0 0 16 16">
          <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
          <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
          <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
          <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
          <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
        </symbol>
      </svg>    
      <header class="fixed-top">
            <div class="px-3 py-2 bg-header-graphix text-white">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                        <a href="/"
                            class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                            <img src="{{url('/image/logo2.png')}}"  height="45" alt="logo">
                        </a>

                        @guest
                            @if (Route::has('login'))
                                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                                    <li>
                                        <a href="#" class="nav-link text-secondary">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                <use xlink:href="#home" /></svg>
                                            Home
                                        </a>
                                    </li>
                                </ul>
                            @endif
                            @else
                                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                                    <li>
                                        <a href="#" class="nav-link text-secondary">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                <use xlink:href="#home" /></svg>
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link text-white">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                <use xlink:href="#speedometer2" /></svg>
                                            {{ __('Dashboard') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link text-white dropdown-toggle" id="MenuOS" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                    <use xlink:href="#grid" /></svg>                                        
                                            {{ __('Order of Service') }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="MenuOS">
                                            <li><a class="dropdown-item" href="#">{{ __('New') }}</a></li>
                                            <li><a class="dropdown-item" href="#">{{ __('Search') }}</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><h6 class="dropdown-header">{{ __('Reports') }}</h6></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>                                        
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link text-white dropdown-toggle" id="MenuClient" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                <use xlink:href="#people-circle" /></svg>                                    
                                            {{ __('Clients') }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="MenuClient">
                                            <li><a class="dropdown-item" href="{{ route('client.create') }}">{{ __('New') }}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('client.index') }}">{{ __('Search') }}</a></li>
                                        </ul>                                           
                                    </li>
                                    <li>
                                        <a href="#" class="nav-link text-white dropdown-toggle" id="MenuPrice" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                                <use xlink:href="#table" /></svg>
                                            {{ __('Values') }}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="MenuPrice">
                                            <li><a class="dropdown-item" href="{{ route('price.create') }}">{{ __('New') }}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('price.index') }}">{{ __('Search') }}</a></li>
                                        </ul>                                         
                                    </li>
                                </ul>
                            @endguest
                    </div>
                </div>
            </div>
            <div class="px-3 py-2 border-bottom mb-3 bg-header2-graphix">
                <div class="container d-flex flex-wrap justify-content-end">
                    <div class="text-end">
                        @guest
                        @if (Route::has('login'))
                        <a class="nav-link btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif
                        @else
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </header>
      <main class="py-0 flex-shrink-0" >
 
    
        @yield('content')
    </main>
    <footer class="footer mt-auto py-2 bg-header2-graphix fixed-botton">
  <div class="container">
    <span class="text-white">Place sticky footer content here.</span>
  </div>
</footer>
</body>

</html>
