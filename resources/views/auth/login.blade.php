@extends('layouts.app')
@section('content')
<div class=" container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card login-page shadow rounded border-0">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ __('تسجيل دخول') }}</h4>  
                    <form class="login-form mt-4" method="POST" action="{{ route('login') }}">
                            @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('البريد الالكتروني:') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon position-relative">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                                <div class="d-flex justify-content-between">
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="flexCheckDefault">{{ __('ذكرني!') }}</label>
                                        </div>
                                    </div>
                                    <p class="forgot-pass mb-0">
                                        @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark fw-bold" href="{{ route('password.request') }}">
                                            {{ __('هل نسيت كلمة المرور؟') }}
                                        </a>
                                    @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('دخول') }}
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <p class="mb-0 mt-3"><small class="text-dark me-2">لست تملك حساباً ؟</small> <a href="{{ route('register') }}" class="text-dark fw-bold">تسجيل جديد</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
