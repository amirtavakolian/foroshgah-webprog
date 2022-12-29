@extends('index.layout.master')

@section('content')
<div class="login-register-area pt-100 pb-100" style="direction: rtl;">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a data-toggle="tab" class="active" href="#lg2">
                            <h4> عضویت </h4>
                        </a>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="tab-content">
                        <div id="lg2">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf()
                                        <input name="name" placeholder="نام" type="text">
                                        <input name="email" placeholder="ایمیل" type="email">
                                        <input type="password" name="password" placeholder="رمز عبور">
                                        <input type="password" name="password_confirmation" placeholder="تکرار رمز عبور">
                                        <div class="button-box">
                                            <button type="submit">عضویت</button>
                                            <a href="index.html" class="btn btn-google btn-block mt-4">
                                                <i class="sli sli-social-google"></i>
                                                ایجاد اکانت با گوگل
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
