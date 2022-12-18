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

        <form action="{{ route('product.update', ['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name">نام</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $product->name }}" {{ old('name') }}>
                </div>

                <div class="form-group col-md-3">
                    <label for="brand_id">برند</label>
                    <select id="brandSelect" name="brand_id" class="form-control" data-live-search="true">
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ $brand->brand_id ? "selected":"" }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="is_active">وضعیت</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <option value="1" {{ $product->is_active ? "selected":"" }}>فعال</option>
                        <option value="0" {{ $product->is_active ? "selected":"" }}>غیرفعال</option>
                    </select>
                </div>

                @php
                $selected="selected";
                @endphp

                <div class="form-group col-md-3">
                    <label for="tag_ids">تگ</label>
                    @php
                    $selectedTags = $product->tags()->pluck('id')->toArray();
                    @endphp
                    <select id="tagSelect" name="tag_ids[]" class="form-control" multiple>
                        @foreach ($tags as $key=>$tag)
                        <option value="{{ $tag->id }}" {{ in_array( $tag->id, $selectedTags) ? "selected" : "" }}>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-12">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
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
                        <div>
                            <span class="mr-5" style="color:red">x</span>
                            <span style="direction:ltr;">{{ $product->primary_image }}</span>
                        </div>
                    </div>
                </div>


                <div class="form-group col-md-3">
                    <label for="images"> تصاویر آپلود شده </label>
                    <div class="custom-file" id="nameOfUploadedFiles">
                        @foreach ($product->images as $productImage)
                        <div>
                            <span class="mr-5" style="color:red">x</span>
                            <span style="direction:ltr;">{{ $productImage->image }}</span>
                        </div>
                        @endforeach
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
                                <option value="{{ $product->category->id }}" selected>{{ $product->category->name }} | {{ $product->category->parent->name }} </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="attributesContainer" class="col-md-12 ">
                    <div class="col-md-12">
                        <hr>
                        <p>افزودن ویژگی ها <span class="font-weight-bold" id="variationName"></span> :</p>
                        <div id="attributes" class="row">
                            @foreach ($product->attributes as $attribute)
                            <label for="">{{ $attribute->name }}</label>
                            <input type="text" class="form-control col-3" name="filter[{{ $attribute->id }}]" value="{{ $attribute->pivot->value }}">
                            @endforeach
                        </div>
                    </div>
                </div>

                <div id="variationsContainer" class="col-md-12">
                    <div class="col-md-12">
                        <hr>
                        <p>افزودن ویژگی های متغیر <span class="font-weight-bold" id="variationName"></span> :</p>
                        <div id="variations" class="row">
                            <div style='color:green; font-weight:bolder' id='addVariationAttributes'>X</div>
                            @foreach ($product->variations as $key=>$variation)
                            <br>
                            <div class='row'>
                                <label for="" class='ml-2'>{{ $attribute->name }}</label>
                                <input type="text" class="form-control col-2 ml-2" value="{{ $variation->value }}" name="variation[{{$key}}][]" id="">
                                <label for="" class='ml-2'>قیمت</label>
                                <input type="text" class="form-control col-2 ml-2" value="{{ $variation->price }}" name="variation[{{$key}}][]" id="">
                                <label for="" class='ml-2'>تعداد</label>
                                <input type="text" class="form-control col-2 ml-2" value="{{ $variation->quantity }}" name="variation[{{$key}}][]" id="">
                                <label for="" class='ml-2'>SKU</label>
                                <input type="text" class="form-control col-2 ml-2" value="{{ $variation->sku }}" name="variation[{{$key}}][]" id="">
                                <input type="hidden" name="variationid" value="{{ $variation->attribute_id }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-md-12">
        <hr>
        <p>هزینه ارسال : </p>
    </div>

    <div class="form-group col-md-3">
        <label for="delivery_amount">هزینه ارسال</label>
        <input class="form-control" id="delivery_amount" value="{{ $product->delivery_amount }}" name="delivery_amount" type="text" {{ old('delivery_amount') }}>
    </div>

    <div class="form-group col-md-3">
        <label for="delivery_amount_per_product">هزینه ارسال به ازای محصول اضافی</label>
        <input class="form-control" id="delivery_amount_per_product" value="{{ $product->delivery_amount_per_product }}" name="delivery_amount_per_product" type="text" {{ old('delivery_amount_per_product') }}>
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
    let index = 0;


    const variations = document.querySelector('#variations');
    let jsonData = '{!! json_encode($product->category) !!}';
    jsonData = (JSON.parse(jsonData));

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
</script>
@endsection
