@extends('panel.layout.master')


@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')


<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold">لیست کوپن ها ({{ $coupens->count() }})</h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('coupen.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد کوپن
            </a>
        </div>

        <div>
            <table class="table table-bordered table-striped text-center" id="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>کد تخفیف</th>
                        <th>نوع</th>
                        <th>تعداد</th>
                        <th>درصد</th>
                        <th>حداکثر درصد تخفیف</th>
                        <th>تاریخ انقضا</th>
                        <th>توضیحات</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupens as $key => $coupen)
                    <tr>
                        <th>
                            {{ $loop->index+1 }}
                        </th>
                        <th>{{ $coupen->name }}</th>
                        <th>{{ $coupen->code }}</th>
                        <th>{{ $coupen->type }}</th>
                        <th>{{ $coupen->amount }}</th>
                        <th>{{ $coupen->percentage }}</th>
                        <th>{{ $coupen->max_percentage_amount }}</th>
                        <th>{{ $coupen->expired_at }}</th>
                        <th>{{ $coupen->description }}</th>
                        <th>
                            <a class="btn btn-sm btn-success mr-3" href="{{ route('coupen.edit', ['coupen' => $coupen->id]) }}">ویرایش</a>
                            <a class="btn btn-sm btn-danger" href="#" data-itemID="{{$coupen->id}}">حذف</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

