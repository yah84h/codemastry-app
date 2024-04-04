@extends('layouts.app')

@section('content')

    <section class="section bg-info-subtle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="row mt-3">
                        <div class="col text-center">
                            <img src="/assets/images/logo.png" width="100px"/>
                            <h1 class="text-primary">أكاديمية CODE MASTERY </h1>
                            <h4 class="mt-3">أفضل موقع عربي لتعلم البرمجة</h4>
                            <p class="fs-5 mt-5">
                                نسعى لإثراء مكتبة الدروس والمقالات والمشاريع الجديدة بهدف مواكبة كل ما هو جديد وتزويدكم بكافة الموارد التي تحتاجونها لدراستكم وتأهيلكم لسوق العمل    
                            </p>
                            <div class="mt-4">
                                <a href="#start" class="btn btn-primary mt-2 ">لنبدأ معاً</a>
                                <a href="{{ route('aboutus') }}" class="btn btn-outline-primary mt-2 me-2">عن الأكاديمية</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                    <img src="/assets/images/home.svg" alt="">
                </div>
            </div>
        </div>
    </section>
    
    <section class="section">
        <div class="container mt-4 mb-5">
        <div class="col-lg-12 col-md-12 text-center">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                    <div class="row align-items-center">
                        
                        <div class="row justify-content-center">
                            <div class="col-12" id="start">
                                <div class="section-title text-center mt-4 pb-2">
                                    <h1 class="title mb-4">ماذا تريد أن تتعلم ؟</h1>
                                    <p class="text-muted para-desc mb-4 mx-auto fs-5">
                                        <span class="fs-5 text-primary">CODE MASTERY</span>
                                        تضع لك خطة تعلم متميزة
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-12 pe-md-0">
                            <a href="{{route('show_programs',['section_id'=>1])}}" class="btn">
                            <div class="card card-body bg-warning text-center shadow rounded border-0 ">
                                <div class="card-body py-3">
                                    <img src="/assets/images/web.svg" class="w-50" alt="">
                                    <h6 class="title fs-1 name fw-bold text-uppercase mt-4 text-white">برمجة صفحات الويب</h6>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 pt-4ps-md-0 pe-md-0">
                            <a href="{{route('show_programs',['section_id'=>2])}}" class="btn">
                            <div class="card text-center shadow rounded border-0 bg-info btn">
                                <div class="card-body py-3">
                                    <img src="/assets/images/app.svg" class="w-50" alt="">
                                    <h6 class="title fs-1 name fw-bold text-uppercase mt-4 text-white">برمجة التطبيقات الذكية</h6>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-12 pt-4ps-md-0 pe-md-0">
                            <a href="{{route('show_programs',['section_id'=>3])}}" class="btn">
                            <div class="card text-center shadow rounded border-0 bg-primary btn">
                                <div class="card-body py-3">
                                    <img src="/assets/images/win.svg" class="w-50" alt="">
                                    <h6 class="title fs-1 name fw-bold text-uppercase mt-4 text-white">برمجة أنظمة التشغيل</h6>
                                </div>
                            </div>
                            </a>
                        </div>           
                       
                    </div>
                </div>
            </div>
            </section>
       

    <section class="section bg-info-subtle">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="section-title text-center mt-5 pb-2">
                        <h1 class="title mb-4">أشهر الدورات التدريبية</h1>
                        <p class="text-muted para-desc mb-4 mx-auto">
                            لا تدع الفرصة تفوتك وابدأ الآن رحلة التعلم
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
               
                    @foreach ($program_details_top as $items)
                    <div class="col-lg-4 col-md-6 col-12 mb-5 pt-2">
                    <div class="card blog blog-primary rounded border-0 shadow overflow-hidden">
                    <div class="position-relative">
                        <img src="/assets/images/{{$items->url_image}}" class="card-img-top" alt="...">
                        <div class="overlay"></div>    
                    </div>
                    <div class="card-body content">
                        <a href="#" class="title link-underline-light text-dark h3 "> {{$items->program_name}} </a>
                        <p class="text-muted mt-2 text-truncate">
                            {{$items->description}}  
                        </p>
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-primary mt-2 me-2"><i class="uil uil-envelope"></i>انضم للبرنامج</a></div>
                            <div class="col mt-auto text-start ms-2">السعر: {{$items->price}}  ريال</li></div>
                        </div>
                        <ul class="list-unstyled d-flex justify-content-between border-top mt-3 pt-3 mb-0">
                            <li class="text-muted small"><i class="uil uil-book-open text-info"></i> {{$items->lesson}}  درس </li>
                            <li class="text-muted small ms-3"><i class="uil uil-clock text-warning"></i>المدة:  {{$items->duration}} </li>
                            <li class="text-muted small ms-3"><i class="uil uil-eye text-primary"></i> {{$items->purch}}  متدرب</li>
                        </ul>
                    </div>
                </div>
            </div>

            @endforeach
                </div>
             
           
                

       </section>


            <section class="section">
        <div class="container mt-4 mb-4">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="section-title mb-4 mt-4 pb-2">
                        <h4 class="title mb-4">إنجازاتنا تتحدث <span class="text-primary">CODE MASTERY</span></h4>
                        <p class="text-muted para-desc mx-auto mb-0">
                            نهدف دوما لخلق بيئة تعليمية متميزة في كل المعايير بتطبيق طرائق تعليمية حديثة 
                        </p>
                    </div>
                </div>
            </div>

            <div class="row" id="counter">
                <div class="col-md-3 col-6 mt-4 pt-2">
                    <div class="counter-box text-center">
                        <img src="/assets/images/ico1.svg" alt="" width="75">
                        <h2 class="mb-0 mt-4"><span class="counter-value" data-target="97">97</span>%</h2>
                        <h6 class="counter-head text-muted">الاعتمادية</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6 mt-4 pt-2">
                    <div class="counter-box text-center">
                        <img src="/assets/images/ico2.svg" width="75" alt="">
                        <h2 class="mb-0 mt-4"><span class="counter-value" data-target="15">15</span>+</h2>
                        <h6 class="counter-head text-muted">الجوائز</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6 mt-4 pt-2">
                    <div class="counter-box text-center">
                        <img src="/assets/images/ico3.svg" width="75" alt="">
                        <h2 class="mb-0 mt-4"><span class="counter-value" data-target="2">2</span>K</h2>
                        <h6 class="counter-head text-muted">الشهادات</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6 mt-4 pt-2">
                    <div class="counter-box text-center">
                        <img src="/assets/images/ico4.svg" width="75" alt="">
                        <h2 class="mb-0 mt-4"><span class="counter-value" data-target="345">345</span></h2>
                        <h6 class="counter-head text-muted">الدروس</h6>
                    </div>
                </div>
            </div>
        </div>

       </section>


  





@endsection