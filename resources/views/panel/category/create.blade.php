@extends('panel.layout.master')

@section('content')

<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="mb-4">
            <h5 class="font-weight-bold">ایجاد دسته بندی</h5>
        </div>
        <hr>

        @include('panel.sections.errors')

        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">نام</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="slug">نام انگلیسی</label>
                    <input class="form-control" id="slug" name="slug" type="text" value="{{ old('slug') }}">
                </div>

                <div class="form-group col-md-3">
                    <label for="parent_id">والد</label>
                    <select class="form-control" id="parent_id" name="parent_id">
                        <option value="">بدون والد</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" selected>فعال</option>
                        <option value="0">غیرفعال</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="attribute_ids">ویژگی</label>
                    <select id="attributeSelect" name="attribute_ids[]" class="form-control" multiple data-live-search="true" data-title="انتخاب ویژگی">
                        @foreach ($attributes as $attribute)
                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="attribute_is_filter_ids">انتخاب ویژگی های قابل فیلتر</label>
                    <select id="attributeIsFilterSelect" name="attribute_is_filter_ids[]" class="form-control" data-title="انتخاب ویژگی های فیلتر" multiple data-live-search="true">
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="attribute_is_filter_ids">انتخاب ویژگی متغیر</label>
                    <select id="variationSelect" name="variation_id" class="form-control" data-title="انتخاب ویژگی های متغیر" data-live-search="true">
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="icon">آیکون</label>
                    <input class="form-control" id="icon" name="icon" type="text" value="{{ old('icon') }}">
                </div>

                <div class="form-group col-md-12">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                </div>

            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>
@endsection

@section('script')
<script>
    let attributes = JSON.parse('@json($attributes)');

    $('#attributeSelect').selectpicker();
    $('#attributeIsFilterSelect').selectpicker();
    $('#variationSelect').selectpicker();

    $('#attributeSelect').on('changed.bs.select', function() {
        var filterAttributes = "";
        for (attribute in attributes) {
            if ($(this).val().includes(attributes[attribute].id.toString())) {
                filterAttributes += `<option value="${attributes[attribute].id}">${attributes[attribute].name}</option>`;
            }
        }
        $('#attributeIsFilterSelect').html(filterAttributes);
        $('#attributeIsFilterSelect').selectpicker('refresh');
    });


    $('#attributeIsFilterSelect').on('changed.bs.select', function() {
        var variationAttributes = "";
        for (attribute in attributes) {
            if (!$(this).val().includes(attributes[attribute].id.toString())) {
                variationAttributes += `<option value="${attributes[attribute].id}">${attributes[attribute].name}</option>`;
            }
        }
        $('#variationSelect').html(variationAttributes);
        $('#variationSelect').selectpicker('refresh');
    });


</script>
@endsection
