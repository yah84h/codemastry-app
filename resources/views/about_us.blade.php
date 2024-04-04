@extends('layouts.app')
@section('content')
<section class="section bg-info-subtle">
    <div class="container mb-5">
    <div class="col-lg-12 col-md-12 text-center">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="Month" role="tabpanel" aria-labelledby="Monthly">
                <div class="row align-items-center">
                    
                    <div class="row justify-content-center">
                        <div class="col-12" id="start">
                            <div class="section-title text-center mt-4 pb-2">
                               
                                    <img src="/assets/images/logo.png" alt="" width="300">
                               
                                <p class="mb-4 mx-auto fs-1 text-primary"> 
                                   CODE MASTERY
                                </p>
                                <p class="text-muted para-desc mb-4 mx-auto fs-3"> 
                                     منصة تفاعلية تتيح لك تعلم مختلف لغات البرمجة مثل جافا واندرويد وبرمجة تطبيقات الايفون والمواقع
                                </p>

                            </div>
                        </div>
                    </div>
                    
                 
                  
                   
                </div>
            </div>
        </div>
        </section>

        <section class="section pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center features feature-primary feature">
                            <div class="icons text-center mx-auto">
                                <i class="bi bi-telephone-fill rounded h3 mb-0 fs-1"></i>
                            </div>
                            <div class="content mt-4">
                                <h5 class="fw-bold">الجوال</h5>
                                <p class="text-muted">نسعد بالرد على استفساركم على الرقم التالي</p>
                                <a href="tel:+152534-468-854" class="read-more">+152 534-468-854</a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-primary feature-clean">
                            <div class="icons text-center mx-auto">
                                <i class="bi bi-envelope-fill rounded h3 mb-0 fs-1"></i>
                            </div>
                            <div class="content mt-4">
                                <h5 class="fw-bold">البريد الالكتروني</h5>
                                <p class="text-muted">يمكنك التواصل معنا عبر البريد الالكتروني</p>
                                <a href="mailto:contact@example.com" class="read-more">contact@example.com</a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-primary feature-clean">
                            <div class="icons text-center mx-auto">
                                <i class="bi bi-geo-alt-fill rounded h3 mb-0 fs-1"></i>
                            </div>
                            <div class="content mt-4">
                                <h5 class="fw-bold">موقعنا</h5>
                                <p class="text-muted">جدة, المنطقة الغربية, المملكة العربية السعودية</p>
                                <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                    data-type="iframe" class="video-play-icon read-more lightbox">عرض على الخريطة</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mx-auto m-5">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="card shadow rounded border-0">
                            <div class="card-body py-5">
                                <h2 class="card-title mx-auto mb-5">نسعد بتواصلك معنا</h2>
                                <div class="custom-form mt-3">
                                    <form action="{{route('create-messages')}}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">اسمك<span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input name="sender_name" type="text" class="form-control ps-5" placeholder="Name :" required>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">بريدك الالكتروني <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input name="sender_email" type="email" class="form-control ps-5" placeholder="Email :" required>
                                                    </div>
                                                </div> 
                                            </div><!--end col-->
        
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">عنوان الرسالة</label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="book" class="fea icon-sm icons"></i>
                                                        <input name="msg_title" class="form-control ps-5" placeholder="subject :" required>
                                                    </div>
                                                </div>
                                            </div><!--end col-->
        
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نص الرسالة <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                        <textarea name="msg_content" rows="4" class="form-control ps-5" placeholder="Message :" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="submit" name="send" class="btn btn-primary">ارسل</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div><!--end custom-form-->
                            </div>
                        </div>
                    </div><!--end col-->

                  
                </div><!--end row-->
            </div><!--end container-->

            
        </section><!--end section-->
@endsection