@extends('layouts.master')

@section('content')
<div class="Draiwal_login container h-100">
    <div class="d-flex justify-content-center h-100">
        <div class="user_card">
            <div class="d-flex justify-content-center">
                <div class="brand_logo_container">
                    <img src="{{asset('assets/images/car.png')}}" class="brand_logo" alt="Logo">
                </div>
            </div>
            @if (\Session::has('message'))
                <div class="alert alert-danger">
                    <li>{!! \Session::get('message') !!}</li>
                </div>
            @endif
            <div class="d-flex justify-content-center form_container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" value="{{$type}}" name="type">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="email" class="form-control input_user" value="" placeholder="اسم المستخدم">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control input_pass" value="" placeholder="كلمة المرور">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">تذكرني</label>
                        </div>
                    </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                 <button type="submit" name="button" class="btn login_btn">تسجيل الدخول</button>
               </div>
                </form>
            </div>
    
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    <a href="#">هل نسيت كلمة المرور ؟</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
