@extends('layouts.app')
@section('content')

<section class=" secttion mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mt-5 pb-2">
                    <h1 class="title mb-4">دورات قسم: 
                       
                        @foreach ($sections as $items)
                        <span>{{ $items->section_name }}</span>
                        @endforeach
                       
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @foreach ($program_details as $items)           
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                </div>
             <div class="row">     

                 <div class="col-sm-4">
                     <div class="crad">
                         <img src="/assets/images/{{$items->url_image}}" class="img-fluid  rounded-2"/>
                     </div>
                 </div>
                 <div class="col-sm-6">
                     <div class="row"><p class="fs-2">{{$items->program_name}}</p></div>
                     <div class="row"><span class="fs-6"><strong class="fs-5">القسم:</strong> {{$program_details->first()->section_name}}</span></div>
                     <div class="row"><p class="fs-6"><strong class="fs-5">متدرب:</strong> {{$items->purch}}
                     <span class="fs-5 fa fa-star text-warning"></span>
                     <br />
                     <span class="badge rounded-pill bg-success">دورة احترافية</span>                    
                 </p></div>
                 <div class="row"><hr/></div>
                 <div class="row"><p class="fs-6"><strong class="fs-5">وصف الدورة:</strong> {!! $items->description !!} </p></div>
                
             </div>            
             <div class="col-sm-2">
                 <div class="row  ">السعر النهائي:
                     <span class="fs-2">{{number_format($items->net, 2)}} ريال</span>
                    </div>
                    <div class="row fs-6 mt-2 ">السعر بدون الضربية: {{$items->price}}  ريال</div>
                    <div class="row fs-6 mt-2 ">السعر مع الضريبة: {{$items->total}}  ريال</div>
                    <div class="row fs-6 mt-2">الضربية: {{$items->tax}}٪</div>
                    <div class="row fs-6 mt-2">الخصم: {{$items->discount}}٪</div>
                 
                <!-- Button trigger modal -->
                <div class="row mt-5"></div>
                
                @if(auth()->check())
                <a href="{{ route('add-to-cart', ['id' => $items->program_id]) }}" class="btn btn-primary">أضف للسلة</a>
                @else
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                    أضف للسلة
                </button>

                <!-- Modal -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h5 class="modal-title" id="loginModalLabel">تسجيل الدخول</h5>
                                <button type="button" class="btn-close m-auto float-end " data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                يرجى تسجيل الدخول لإضافة العنصر إلى السلة.
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('login') }}" class="btn btn-primary">تسجيل الدخول</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

             </div>
           </div>
         </div>
       </div>
    </div>
   @endforeach
   @if ($program_details->isEmpty())
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <p>لا توجد بيانات متاحة حالياً.</p>
            </div>
        </div>
    </div>
@endif
</section>


   
@endsection