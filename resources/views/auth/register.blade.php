@extends('layouts.app')

@section('content')
<div class=" container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card login-page shadow rounded border-0">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ __('تسجيل حساب جديد') }}</h4>  
                    <form class="login-form mt-4" method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('الاسم:') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('البريد الالكتروني:') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('رقم الجوال:') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input id="phone" type='text' class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('كلمة المرور:') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                      
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('تأكيد كلمة المرور:') }} <span class="text-danger">*</span></label>
                                   
                                    
                                    <div class="form-icon position-relative">
                                            
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-lg-12 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('تسجيل') }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <p class="mb-0 mt-3"><small class="text-dark me-2">أنت تملك حساباً بالفعل ؟</small> <a href="{{ route('login') }}" class="text-dark fw-bold">تسجيل دخول</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

