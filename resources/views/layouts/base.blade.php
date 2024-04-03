<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel-لوحة القيادة</title>
    <link rel="icon" type="image/x-icon" href="/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('/js/input_image.js') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body{
            font-family: cairo
        }
       </style>

</head>
<body>
    <header>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand mt-2 mt-lg-0" href="#">
          <img
            src="/assets/images/logo.png"
            height="42"
            alt="Code-Mastery Logo"
          />
        </a>
        <span class="me-2 text-white">C O D E  &nbsp;&nbsp;  M A S T E R Y</span>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item me-3">
            <a class="nav-link" href="/">زيارة الموقع CODE MASTERY</a>
          </li>
        </ul>
      </div>
      <div class="d-flex align-items-center">     
        
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell-fill text-white fs-5"></i>
            <span class="badge rounded-pill badge-notification bg-danger">1</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow  text-end" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">الرسائل</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">الطلبات</a></li>
          </ul>
        </div>

        <div class="dropdown me-4">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <!--<img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">-->
            <i class="bi bi-person-fill fs-4"></i>
            <strong class="m-2">{{Auth::user()->name}}</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow  text-end" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">ملفي الشخصي</a></li>
            <li><a class="dropdown-item" href="#">إعدادات الحساب</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">تسجيل خروج</a></li>
          </ul>
        </div>
      </div>
   
    </div>
  
  </nav>
  
    </header>
    
    <div class="row ">
      <div class="col-2 px-0 bg-dark">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
              <a href="/dashboard" class="text-center w-100 text-white text-decoration-none ">
                  <span class="fs-4 d-none d-sm-inline text-center text-warning">لوحة التحكم</span>
              </a>
              <hr/>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                      <a href="{{route('index')}}" class="nav-link align-middle px-0   text-white">
                          <i class="fs-4 bi-house ms-2"></i> <span class="ms-1 d-none d-sm-inline ">الرئيسية</span>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('programs')}}" class="nav-link align-middle px-0   text-white">
                      <i class="fs-4 bi-journal-code ms-2"></i> <span class="ms-1 d-none d-sm-inline ">إضافة برنامج</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('program_details')}}" class="nav-link align-middle px-0   text-white">
                      <i class="fs-4 bi-pencil-square ms-2"></i> <span class="ms-1 d-none d-sm-inline ">خيارات البرنامج</span>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{route('sections')}}" class="nav-link align-middle px-0   text-white">
                          <i class="fs-4 bi-bookmarks ms-2"></i> <span class="ms-1 d-none d-sm-inline ">تصنيفات البرامج</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link align-middle px-0   text-white">
                          <i class="fs-4 bi-cart ms-2"></i> <span class="ms-1 d-none d-sm-inline ">سلة المشتريات</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link align-middle px-0   text-white">
                          <i class="fs-4 bi-receipt ms-2"></i> <span class="ms-1 d-none d-sm-inline ">الفواتير</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link align-middle px-0   text-white">
                          <i class="fs-4 bi-people-fill ms-2"></i> <span class="ms-1 d-none d-sm-inline ">العملاء</span>
                      </a>
                  </li>
              </ul>  
          </div>    
      </div>
      
      <div class="col-10">
          @yield('content')
      </div>
  </div>      
    
  <footer class="py-3 bg-dark text-center">
    <div class="row w-100">
       
        <div class="col">
            <img src="/assets/images/logo.png" width="42px"/>
            <span class="me-2 text-white">C O D E  &nbsp;&nbsp;  M A S T E R Y</span>
            <p class=" text-white">&copy; 2024 - جميع الحقوق محفوظة</p>
        </div>
    </div>
    
  </footer>
</body>
</html>


