@extends('index.layout.master')

@section('content')
<div class="login-register-area pt-100 pb-100" style="direction: rtl;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> ورود </h4>
                        </a>
                        <a data-toggle="tab" href="#lg2">
                            <h4> عضویت </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf()
                                        <input type="text" name="email" placeholder="ایمیل">
                                        @error('email')
                                        <span style="color:red; direction:rtl">خطا در نام ایمیل</span>
                                        @enderror
                                        <input type="password" name="password" placeholder="رمز عبور">
                                        <div class="button-box">
                                            <div class="login-toggle-btn d-flex justify-content-between">
                                                <div>
                                                    <input type="checkbox">
                                                    <label> مرا بخاطر بسپار </label>
                                                </div>
                                                <a href="register.html"> فراموشی رمز عبور ! </a>
                                            </div>
                                            <button type="submit">ورود</button>
                                            <a href="index.html" class="btn btn-google btn-block mt-4">
                                                <i class="sli sli-social-google"></i> ورود با حساب گوگل
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
