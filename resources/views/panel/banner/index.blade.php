@extends('panel.layout.master')

@section('content')
<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold">لیست بنرها</h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('banner.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد بنر
            </a>
        </div>

        <div>
            <table class="table table-bordered table-striped text-center">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>تصویر</th>
                        <th>عنوان</th>
                        <th>متن</th>
                        <th>الویت</th>
                        <th>وضعیت</th>
                        <th>نوع</th>
                        <th>متن دکمه</th>
                        <th>لینک دکمه</th>
                        <th>آیکون دکمه</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $key => $banner)
                    <tr>
                        <th>{{ $loop->index + 1 }}</th>
                        <th>{{ $banner->image }}</th>
                        <th>{{ $banner->title }}</th>
                        <th>{{ $banner->text }}</th>
                        <th>{{ $banner->priority }}</th>
                        <th>{!! $banner->status !!}</th>
                        <th>{{ $banner->type }}</th>
                        <th>{{ $banner->button_text }}</th>
                        <th>{{ $banner->button_link }}</th>
                        <th>{{ $banner->button_icon }}</th>
                        <th>
                            <a class="btn btn-sm btn-info mr-3" href="{{ route('banner.edit', ['banner' => $banner->id]) }}">ویرایش</a>
                            <a class="btn btn-sm btn-danger" href="#">حذف</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
