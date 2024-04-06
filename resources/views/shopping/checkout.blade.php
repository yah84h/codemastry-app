@extends('layouts.app')
@section('content')

<div class="container mb-5">
    <main>
      <div class="py-5 text-center">
        <img src="/assets/images/logo.png" width="100px"/>
        <h1 class="text-primary">أكاديمية CODE MASTERY </h1>
        <h1 class="mt-5 mb-3">فاتورة إتمام الشراء</h1>
        <p class="lead">فاتورة شراء بالدورات التدريبية التي تم وضعها في السلة وهنا يستكمل الدفع للشراء</p>
        <p class="lead text-danger bold fw-bold">ملحوظة هامة: المحتوى رقمي ويمكنك مشاهدته بشكل دائم عند الدخول على حسابك</p>
        <hr>
      </div>
  
      <div class="row g-3">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-body-secondary">سلة التسوق</span>
          </h4>
          <ul class="list-group mb-3">
            @foreach ($cart_item as $items)   
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div class="col-2">
                <img src="/assets/images/{{$items->url_image}}" class="img-fluid  rounded-2"/ width="40">    
            </div>  
            <div class="col-8">
                <h6 class="my-0">{{$items->program_name}}</h6>
                <small class="text-body-secondary">{{$items->section_name}}</small>
            </div>
            <div class="col-2">
                <span class="text-body-secondary">{{number_format($items->net, 2)}}</span>
            </div>
            </li>
            @endforeach
           
           
          
            <li class="list-group-item d-flex justify-content-between bg-dark-subtle">
            <div class="col-8">
                <span>مجموع سلة التسوق: </span>
            </div>  
            <div class="col-4 text-start">
                <strong>{{number_format($cart_sum, 2)}} ريال</strong>
            </div>
            </li>
          </ul>
  
          
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">عنوان الفوترة</h4>
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="firstName" class="form-label">الاسم الأول</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  يرجى إدخال اسم أول صحيح.
                </div>
              </div>
  
              <div class="col-sm-6">
                <label for="lastName" class="form-label">اسم العائلة</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  يرجى إدخال اسم عائلة صحيح.
                </div>
              </div>
  
              <div class="col-12">
                <label for="username" class="form-label">اسم المستخدم</label>
                <div class="input-group has-validation">
                  <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
                <div class="invalid-feedback">
                  اسم المستخدم الخاص بك مطلوب.
                  </div>
                </div>
              </div>
  
              <div class="col-12">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" value="{{Auth::user()->email}}" disabled>
              </div>

            </div>
  
  
            <hr class="my-4">
  
            <h4 class="mb-3">طريقة الدفع</h4>
  
            <div class="my-3">
              <div class="form-check">
                  <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                  <label class="form-check-label" for="credit">بطاقة ائتمان</label>
              </div>
              <div class="form-check">
                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                <label class="form-check-label" for="paypal">PayPal</label>
              </div>
            </div>
  
            <div class="row gy-3">
              <div class="col-md-6">
                <label for="cc-name" class="form-label">الاسم على البطاقة</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                <small class="text-body-secondary">الاسم الكامل كما هو معروض على البطاقة</small>
                <div class="invalid-feedback">
                  الاسم على البطاقة مطلوب
                </div>
              </div>
  
              <div class="col-md-6">
                <label for="cc-number" class="form-label">رقم البطاقة</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required>
                <div class="invalid-feedback">
                  رقم بطاقة الائتمان مطلوب
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="cc-expiration" class="form-label">تاريخ انتهاء الصلاحية</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                <div class="invalid-feedback">
                  تاريخ انتهاء الصلاحية مطلوب
                </div>
              </div>
  
              <div class="col-md-3">
                <label for="cc-cvv" class="form-label">الرمز الثلاثي (CVV)</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                <div class="invalid-feedback">
                  رمز الحماية مطلوب
                </div>
              </div>
            </div>
  
            <hr class="my-4">
  
            <button class="w-100 btn btn-primary btn-lg" type="submit">الاستمرار بالدفع</button>
          </form>
        </div>
      </div>
    </main>
  </div>
    
@endsection