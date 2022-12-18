@extends('panel.layout.master')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="mb-4">
            <h5 class="font-weight-bold">ایجاد محصول</h5>
        </div>
        <hr>

        @include('panel.sections.errors')

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">نام</label>
                    <input class="form-control" id="name" name="name" type="text" {{ old('name') }}>
                </div>

                <div class="form-group col-md-3">
                    <label for="brand_id">برند</label>
                    <select id="brandSelect" name="brand_id" class="form-control" data-live-search="true">
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                    <label for="tag_ids">تگ</label>
                    <select id="tagSelect" name="tag_ids[]" class="form-control" multiple>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                </div>

                {{-- Product Image Section --}}
                <div class="col-md-12">
                    <hr>
                    <p>تصاویر محصول : </p>
                </div>

                <div class="form-group col-md-3">
                    <label for="primary_image"> انتخاب تصویر اصلی </label>
                    <div class="custom-file">
                        <input type="file" name="primary_image" class="custom-file-input" id="primary_image">
                        <label class="custom-file-label" for="primary_image"> انتخاب فایل </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="images"> انتخاب تصاویر </label>
                    <div class="custom-file">
                        <input type="file" name="images[]" multiple class="custom-file-input" id="images">
                        <label class="custom-file-label" for="images"> انتخاب فایل ها </label>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="images"> تصویر اصلی </label>
                    <div class="custom-file" id="mainUploadedFiles">

                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label for="images"> تصاویر آپلود شده </label>
                    <div class="custom-file" id="nameOfUploadedFiles">

                    </div>
                </div>

                {{-- Category&Attributes Section --}}
                <div class="col-md-12">
                    <hr>
                    <p>دسته بندی و ویژگی ها : </p>
                </div>

                <div class="col-md-12">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-3">
                            <label for="category_id">دسته بندی</label>
                            <select id="categorySelect" name="category_id" class="form-control" data-live-search="true">
                                <option value="" disabled selected>انتخاب دسته بندی</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }} -
                                    {{ $category->parent->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div id="attributesContainer" class="col-md-12 ">
                    <div class="col-md-12">
                        <hr>
                        <p>افزودن ویژگی ها <span class="font-weight-bold" id="variationName"></span> :</p>
                        <div id="attributes" class="row">

                        </div>
                    </div>
                </div>

                <div id="variationsContainer" class="col-md-12">
                    <div class="col-md-12">
                        <hr>
                        <p>افزودن ویژگی های متغیر <span class="font-weight-bold" id="variationName"></span> :</p>
                        <div id="variations" class="row">

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <hr>
                    <p>هزینه ارسال : </p>
                </div>

                <div class="form-group col-md-3">
                    <label for="delivery_amount">هزینه ارسال</label>
                    <input class="form-control" id="delivery_amount" name="delivery_amount" type="text" {{ old('delivery_amount') }}>
                </div>

                <div class="form-group col-md-3">
                    <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
                    <input class="form-control" id="delivery_amount_per_product" name="delivery_amount_per_product" type="text" {{ old('delivery_amount_per_product') }}>
                </div>

            </div>

            <button class="btn btn-outline-primary mt-5" type="submit">ثبت</button>
            <a href="{{ route('product.index') }}" class="btn btn-dark mt-5 mr-3">بازگشت</a>
        </form>
    </div>

</div>
@endsection

@section('script')
<script>
    const categorySelect = document.querySelector("#categorySelect");
    const token = document.querySelector('meta[name="csrf-token"]').content;
    const attributes = document.querySelector('#attributes');
    const variations = document.querySelector('#variations');
    let variationsContainer = document.querySelector("#variationsContainer");
    let attributesContainer = document.querySelector("#attributesContainer");
    let nameOfUploadedFiles = document.querySelector("#nameOfUploadedFiles");
    let mainUploadedFiles = document.querySelector("#mainUploadedFiles");

    var jsonData;
    let index = 0;

    variationsContainer.classList.add('d-none');
    attributesContainer.classList.add('d-none');

    categorySelect.addEventListener('change', function(event) {

        variationsContainer.classList.remove('d-none');
        attributesContainer.classList.remove('d-none');

        const index = event.target.options[event.target.selectedIndex].value;
        let url = "{{ route('product.attributes', ['category' => ':index']) }}";
        url = url.replace(':index', index);

        const xhr = new XMLHttpRequest();
        xhr.open('post', url);
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.send();

        xhr.addEventListener("load", function() {

            let filter = "";
            let variation = "";
            jsonData = JSON.parse(xhr.responseText);

            for (data in jsonData.attributes) {
                if (jsonData.attributes[data].pivot.is_filter) {
                    filter += `
                            <label for="">${jsonData.attributes[data].name}</label>
                            <input type="text" class="form-control col-3"   name="filter[${jsonData.attributes[data].pivot.attribute_id}]" id="">
                        `
                } else {
                    variation +=
                        `<div style='color:green; font-weight:bolder' id='addVariationAttributes'>X</div>`
                }
            }
            attributes.innerHTML = filter;
            variations.innerHTML = variation;
        });
    });

    variations.addEventListener('click', function(event) {
        if (event.target.id == "addVariationAttributes") {
            let variation = "";

            for (data in jsonData.attributes) {
                if (jsonData.attributes[data].pivot.is_variation) {
                    variation = `
                        <br>
                        <div class='row'>
                            <label for="" class='ml-2'>${jsonData.attributes[data].name}</label>
                            <input type="text" class="form-control col-2 ml-2" name="variation[${index}][]" id="">
                            <label for="" class='ml-2'>قیمت</label>
                            <input type="text" class="form-control col-2 ml-2" name="variation[${index}][]" id="">
                            <label for="" class='ml-2'>تعداد</label>
                            <input type="text" class="form-control col-2 ml-2" name="variation[${index}][]" id="">
                            <label for="" class='ml-2'>SKU</label>
                            <input type="text" class="form-control col-2 ml-2" name="variation[${index}][]" id="">
                            <input type="hidden" name="variationid" value="${jsonData.attributes[data].pivot.attribute_id}">
                        </div>`
                    index += 1;
                }
            }
            addVariationAttributes.innerHTML += variation;
        }
    });

    // Show uploaded image's name
    images.addEventListener("change", function() {
        for (image in images.files) {
            if (Number.isInteger(Number(image))) {

                nameOfUploadedFiles.innerHTML += `
                    <div>
                        <span class='mr-5' style='color:red'>x</span>
                        <span style="direction:ltr;">${images.files[image].name}</span>
                    </div>
                `
            }
        }
    });

    primary_image.addEventListener("change", function() {
        mainUploadedFiles.innerHTML += `
                    <div>
                        <span class='mr-5' style='color:red'>x</span>
                        <span style="direction:ltr;">${primary_image.files[0].name}</span>

                    </div>
                `
    });
</script>
@endsection
