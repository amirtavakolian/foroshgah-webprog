@extends('panel.layout.master')

@section('content')


<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="mb-4">
            <h5 class="font-weight-bold">ایجاد برند</h5>
        </div>
        <hr>

        @include('panel.sections.errors')

        <img src="{{ url('/images/banner/' . $banner->image) }}">
        <br><br>
        <form action="{{ route('banner.update', ['banner'=>$banner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر </label>
                    <input type="file" value="{{ $banner->image }}" name="image" id="primary_image">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">عنوان</label>
                    <input class="form-control" id="slug" value="{{ $banner->title }}" name="title" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">متن</label>
                    <input class="form-control" id="slug" value="{{ $banner->text }}" name="text" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">الویت</label>
                    <input class="form-control" id="slug" value="{{ $banner->priority }}" name="priority" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" value="{{ $banner->is_active }}" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="name">نوع بنر</label>
                    <input class="form-control" id="slug" value="{{ $banner->type }}" name="type" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">متن دکمه</label>
                    <input class="form-control" id="slug" value="{{ $banner->button_text }}" name="button_text" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">لینک دکمه</label>
                    <input class="form-control" id="slug" value="{{ $banner->button_link }}" name="button_link" type="text">
                </div>

                <div class="form-group col-md-3">
                    <label for="name">آیکون دکمه</label>
                    <input class="form-control" id="slug" value="{{ $banner->button_icon }}" name="button_icon" type="text">
                </div>
            </div>
            <button class="btn btn-success mt-5" type="submit">ثبت</button>
            <a href="{{ route('banner.index') }}" class="btn btn-danger mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>


@endsection
