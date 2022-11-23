@extends('panel.layout.master')


@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')


<!-- Content Row -->
<div class="row">

    <div class="col-xl-12 col-md-12 mb-4 p-md-5 bg-white">
        <div class="d-flex justify-content-between mb-4">
            <h5 class="font-weight-bold">لیست ویژگی ها ({{ $attributes->count() }})</h5>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('attribute.create') }}">
                <i class="fa fa-plus"></i>
                ایجاد ویژگی
            </a>
        </div>

        <div>
            <table class="table table-bordered table-striped text-center" id="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attributes as $key => $brand)
                    <tr>
                        <th>
                            {{ $loop->index+1 }}
                        </th>
                        <th>
                            {{ $brand->name }}
                        </th>
                        <th>
                            <a class="btn btn-sm btn-success mr-3" href="{{ route('brand.edit', ['brand' => $brand->id]) }}">ویرایش</a>
                            <a class="btn btn-sm btn-danger" href="#" data-itemID="{{$brand->id}}">حذف</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const tabale = document.querySelector('#table');
    const token = document.querySelector('meta[name="csrf-token"]').content;

    table.addEventListener('click', function(event) {
        event.preventDefault();

        if (event.target.hasAttribute('data-itemID')) {
            if (confirm('آیا مطمئن هستید؟')) {

                let route = "{{ route('brand.destroy',['brand'=>':id']) }}";
                route = route.replace(':id', event.target.getAttribute('data-itemID'));

                const xhr = new XMLHttpRequest();
                xhr.open('DELETE', route);
                xhr.setRequestHeader('X-CSRF-TOKEN', token);

                xhr.send();

                xhr.addEventListener("load", function(xhrEvent) {
                    event.target.parentElement.parentElement.remove();
                });
            }
        }

    });
</script>
@endsection
