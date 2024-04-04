@extends('layouts.app')
@section('content')

<section class=" secttion mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mt-5 pb-2">
                    <h1 class="title mb-4">دورات قسم: 
                       
                        <span>
                            {{$program_details->first()->section_name}}
                        </span>
                       
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @foreach ($program_details as $items)           
    <div class="container py-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    
                </div>
             <div class="row">     

                 <div class="col-sm-4">
                     <div class="crad">
                         <img src="/assets/images/{{$items->url_image}}" class=" rounded-2" width="400"/>
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
                 <div class="row"><p class="fs-6"><strong class="fs-5">وصف الدورة:</strong> {{$items->description}}  </p></div>
                
             </div>            
             <div class="col-sm-2">
                 <div class="row  ">السعر:
                    <span class="fs-2">{{$items->price}}  ريال</span>
                 </div>
              
                 <div class="row fs-6 mt-2 ">السعر السابق: {{$items->price}}  ريال</div>
                 <div class="row fs-6 mt-2">الخصم: {{$items->price}}  ٪</div>
                 
                <!-- Button trigger modal -->
                <div class="row mt-5"></div>
                <button type="button" class="btn btn-primary"> أضف للسلة</button>
             </div>
           </div>
         </div>
       </div>
    </div>
   @endforeach
</section>


   
@endsection