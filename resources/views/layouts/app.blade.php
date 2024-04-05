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
    <link rel="stylesheet" href="resources/css/app.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script type="text/javascript" src="resources/js/script.js"></script>

   <style>
    body{
        font-family: cairo
    }
    .dropdown-menu-custom {
  min-width:500%;
}
   </style>
</head>
<body>
    <div id="app">
        <nav class="navbar bg-dark navbar-expand-md navbar-light shadow-sm p-4" data-bs-theme="dark">
            <div class=" container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/assets/images/logo.png" width="32px"/>
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
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">الرئيسية</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  الدورات التدريبية
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <li><a class="dropdown-item" href="{{route('show_programs',['section_id'=>1])}}">برمجة الويب</a></li>
                                    <li><a class="dropdown-item" href="{{route('show_programs',['section_id'=>2])}}">برمجة التطبيقات الذكية</a></li>
                                    <li><a class="dropdown-item" href="{{route('show_programs',['section_id'=>3])}}">برمجة أنظمة التشغيل</a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('aboutus') }}">عن الأكاديمية</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active text-warning" aria-current="page" href="{{ route('thanks') }}">شكر وتقدير</a>
                            </li>
                           

                            <li class="col-xl-5 col-lg-3">----</li>
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
                        <div class="dropdown">

                            <a href="" class="text-decoration-none" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div id="nav-cart-count-container">
                                    <span class=" bi bi-cart fs-2 text-white"></span>
                                    <span class="text-white">
                                      (&nbsp;{{Session::get('count')}}&nbsp;)
                                    </span>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-custom text-end px-4 py-3" aria-labelledby="dropdownMenuButton1" style="max-width: 100%;">
                                @foreach ($cart_item as $items)           
                                <li>
                                    <div class="row">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="col-3"><img src="/assets/images/{{$items->url_image}}" class="img-fluid  rounded-2"/ width="40"></td>
                                                    <td class="col-6">{{$items->program_name}}</td>
                                                    <td class="col-3">{{number_format($items->net, 2)}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                        
                                    </div>
                                </li>
                                @endforeach
                                        <hr class="text-white">
                                        <table class=" m-auto col-12 ">
                                            <tbody>
                                                <tr>
                                                    <td class="col-7 text-end" colspan="2">مجموع السلة: </td>
                                                    <td class="col-5 text-start">{{number_format($cart_sum, 2)}} ريال</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-grid gap-2 mt-3">
                                            <button type="button" class="btn btn-primary">صفحة الدفع</button>
                                        </div>
                            </ul>
                        </div>
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
                        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link px-2 text-white">الرئيسية</a></li>
                     
                        <li class="nav-item"><a href="{{ url('/aboutus') }}" class="nav-link px-2 text-white">عن الأكاديمية</a></li>
                        
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
