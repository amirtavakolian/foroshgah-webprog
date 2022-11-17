
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
            <form action="{{ route('brand.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="name">نام</label>
                        <input class="form-control" id="name" name="name" type="text" {{ old('name') }}>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="is_active">وضعیت</label>
                        <select class="form-control" id="is_active" name="is_active">
                            <option value="1" selected>فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                    </div>
                </div>

                <button class="btn btn-success mt-5" type="submit">ثبت</button>
                <a href="{{ route('brand.index') }}" class="btn btn-danger mt-5 mr-3">بازگشت</a>
            </form>
        </div>

    </div>


@endsection
