@extends('panel.layout.master')

@section('content')

<div class="row">
    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold">لیست محصولات ها </h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('product.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد محصول
            </a>
        </div>
        <div>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>نام برند</th>
                        <th>دسته بندی</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <th>{{ $loop->index+1 }}</th>
                        <th>{{ $product->name }}</th>
                        <th><a href="{{route('brand.show',['brand'=>$product->brand->id])}}">{{$product->brand->name }}</a></th>
                        <th>{{ $product->category->name }}</th>
                        <th>{!! $product->status !!}</th>
                        <th>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    عملیات
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('product.edit',['product'=>$product->id]) }}">ویرایش محصول</a>
                                </div>
                            </div>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
