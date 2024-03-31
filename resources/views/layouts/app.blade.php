<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code Mastery</title>
    <link rel="icon" type="image/x-icon" href="/assets/images/logo.png">
   

    <title>{{ config('app.name', 'CODE-MASTERY') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="resources/css/app.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="text/javascript" src="resources/js/script.js"></script>

   <style>
    body{
        font-family: cairo
    }
   </style>
</head>
<body>
    <div id="app">
        <nav class="navbar bg-dark navbar-expand-md navbar-light shadow-sm p-4" data-bs-theme="dark">
            <div class=" container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="images/logo.png" width="32px"/>
                    <!--{{ config('app.name', 'CODE-MASTERY') }}-->
                    <span class="me-2">C O D E  &nbsp;&nbsp;  M A S T E R Y</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav me-auto">

                      </ul>
  
                    <ul class="navbar-nav  my-lg-0 navbar-nav-scroll w-100" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">الرئيسية</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  الدورات التدريبية
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <li><a class="dropdown-item" href="#">برمجة الويب</a></li>
                                    <li><a class="dropdown-item" href="#">برمجة التطبيقات الذكية</a></li>
                                    <li><a class="dropdown-item" href="#">برمجة أنظمة التشغيل</a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">عن الأكاديمية</a>
                              </li>
                           

                            <li class="col-sm-1 col-md-3 col-lg-4 col-xl-7">----</li>
                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <div class="card">
                                        <a class="nav-link btn btn-outline-primary text-white" href="{{ route('login') }}">{{ __('دخول') }}</a>
                                    </div>
                                </li>
                            @endif
                            <li class="m-2"></li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <div class="card">
                                        <a class="nav-link btn btn-outline-primary text-white" href="{{ route('register') }}">{{ __('تسجيل') }}</a>
                                    </div>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('index') }}"
                                       >
                                        {{ __('لوحة التحكم') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                        <li class="nav-item me-4">
                            <a href="" aria-label="0 items in cart" class="text-decoration-none">
                                <div id="nav-cart-count-container">
                                    <span class=" bi bi-cart fs-2 text-white"></span>
                                    <span class="text-white">
                                      ( 0 )
                                    </span>
                                </div>
                                <div id="nav-cart-text-container" class=" nav-progressive-attribute">
                                  <span aria-hidden="true" class="nav-line-1">
                                    
                                  </span>
                                 
                                  </span>
                                </div>
                              </a>
                        </li>
                    </ul>
                
                  
                  </div>

             
            </div>
        </nav>

        <main class="min-vh-100">
            @yield('content')
        </main>
        
        <footer class="py-3 bg-dark text-center">
            <div class="row w-100">
                <div class="col-lg-4 col-md-12 mt-2">
                    <ul class="nav justify-content-center pb-3">
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">الرئيسية</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">البرامج التدريبية</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">عن الأكاديمية</a></li>
                        
                    </ul>

                </div>
                <div class="col mt-2">
                    <img src="/assets/images/logo.png" width="42px"/>  <span class="me-2 text-white">C O D E  &nbsp;&nbsp;  M A S T E R Y</span>
                </div>
                <div class="col-lg-4 col-md-12 mt-2">
                    <p class="text-center text-white mt-3">&copy; 2024 - جميع الحقوق محفوظة</p>

                </div>
            </div>
            
          </footer>
    </div>
</body>
</html>
