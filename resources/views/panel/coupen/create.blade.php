@extends('panel.layout.master')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
<link href="{{asset('css/panel/persian-datepicker.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-md-2 bg-white" id="mainDiv">
        <div class="mb-4">
            <h5 class="font-weight-bold">ایجاد ویژگی</h5>
        </div>
        <hr>
        @include('panel.sections.errors')
        <form action="{{ route('coupen.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="form-group col-md-3" id="createDiv">
                    <label for="name">نام</label>
                    <input class="form-control" id="name" name="name" type="text" {{ old('name') }}>
                </div>

                <div class="form-group col-md-3" id="createDiv">
                    <label for="discountCode">کد تخفیف</label>
                    <input class="form-control" name="code" type="text" {{ old('discountCode') }}>
                </div>

                <div class="form-group col-md-3" id="createDiv">
                    <label for="type">نوع کد تخفیف</label> &nbsp;&nbsp;&nbsp;<span style="color:red;">amount/percentage</span>
                    <input class="form-control" name="type" id="type" type="text" {{ old('type') }}>

                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-3" id="createDiv">
                    <label for="amount">مبلغ</label>
                    <input class="form-control" name="amount" type="text" {{ old('amount') }}>
                </div>

                <div class="form-group col-md-3" id="createDiv">
                    <label for="percentage">درصد</label>
                    <input class="form-control" name="percentage" id="percentage" type="text" {{ old('percentage') }} disabled>
                </div>

                <div class="form-group col-md-3" id="createDiv">
                    <label for="max_percentage_amount">حداکثر میزان تخفیف</label>
                    <input class="form-control" name="max_percentage_amount" id="max_percentage_amount" type="text" {{ old('max_percentage_amount') }} disabled>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-md-3" id="createDiv">
                    <label for="expired_at">تاریخ انقضا</label>
                    <input class="form-control example1" name="expired_at" type="text" {{ old('expired_at') }}>
                </div>

                <div class="form-group col-md-3" id="createDiv">
                    <label for="description">توضیحات</label>
                    <input class="form-control" name="description" type="text" {{ old('description') }}>
                </div>
            </div>

            <button class="btn btn-success mt-5" type="submit">ثبت</button>

            <a href="{{ route('coupen.index') }}" class="btn btn-danger mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>
@endsection

@section('script')
<script src="{{asset('js/panel/persian-date.min.js')}}"></script>

<script src="{{asset('js/panel/persian-datepicker.min.js')}}"></script>

<script>
    $('.example1').persianDatepicker({
        observer: true,
        format: 'YYYY/MM/DD'
    });
</script>

<script>
    const type = document.querySelector("#type");

    type.addEventListener("focusout", function() {
        if (this.value == "percentage") {
            const percentage = document.querySelector("#percentage");
            const max_percentage_amount = document.querySelector("#max_percentage_amount");
            percentage.removeAttribute('disabled');
            max_percentage_amount.removeAttribute('disabled');
        } else {
            percentage.setAttribute('disabled', '');
            max_percentage_amount.setAttribute('disabled', '');
        }
    });
</script>

@endsection
