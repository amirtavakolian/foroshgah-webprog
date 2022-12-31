@extends('index.layout.master')

@section('content')
    <div class="cart-main-area pt-95 pb-100 text-right" style="direction: rtl;">
        <div class="container">
            <h3 class="cart-page-title"> سبد خرید شما </h3>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">

                    <form action="{{ route('cart.update', ['cart' => '1']) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th> تصویر محصول </th>
                                        <th> نام محصول </th>
                                        <th> فی </th>
                                        <th> تعداد </th>
                                        <th> عملیات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (\Cart::getContent() as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img
                                                        src="{{ asset('images/product/' . $product->associatedModel->primary_image) }}"
                                                        alt="" style="width: 35%"></a>
                                            </td>
                                            <td class="product-name"><a href="#"> {{ $product->name }}</a></td>
                                            <td class="product-price-cart"><span class="amount">
                                                    @if ($product->attributes->sale_price)
                                                        @if ($product->attributes->date_on_sale_from <= \Carbon\Carbon::now() &&
                                                            $product->attributes->date_on_sale_to >= \Carbon\Carbon::now())
                                                            {{ number_format($product->attributes->sale_price) . ' تومان' }}
                                                            <strike
                                                                style="display: block; color:red;">{{ number_format($product->attributes->price) . ' تومان' }}</strike>
                                                        @else
                                                            {{ number_format($product->attributes->price) . ' تومان' }}
                                                        @endif
                                                    @else
                                                        {{ number_format($product->attributes->price) . ' تومان' }}
                                                    @endif
                                                </span></td>

                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text"
                                                        name="qtybutton[{{ $product->id }}]"
                                                        value="{{ $product->quantity }}">
                                                </div>
                                            </td>
                                            {{--   <td class="product-subtotal">
                                                40000
                                                تومان
                                            </td>
                                            <td class="product-remove">
                                                <a href="#"><i class="sli sli-close"
                                                        data-product-id="{{ $product->id }}"></i></a>
                                            </td>
                                            --}}
                                            <td class="product-remove">
                                                <a href="#"><i class="sli sli-close"
                                                        data-product-id="{{ $product->id }}"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart-shiping-update-wrapper">
                                    <div class="cart-shiping-update">
                                        <a href="#"> ادامه خرید </a>
                                    </div>
                                    <div class="cart-clear">
                                        <button> به روز رسانی سبد خرید </button>
                                        <a href="#"> پاک کردن سبد خرید </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-between">

                        <div class="col-lg-4 col-md-6">
                            <div class="discount-code-wrapper">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gray"> کد تخفیف </h4>
                                </div>
                                <div class="discount-code">
                                    <p> لورم ایپسوم متن ساختگی با تولید سادگی </p>
                                    <form method="POST" action="{{ route('coupen.calculate') }}">
                                        @csrf
                                        <input type="text" name="name">
                                        <button class="cart-btn-2" type="submit"> ثبت </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <div class="grand-totall">
                                <div class="title-wrap">
                                    <h4 class="cart-bottom-title section-bg-gary-cart"> مجموع سفارش </h4>
                                </div>
                                <h5>
                                    مبلغ سفارش :
                                    <span>
                                        {{ number_format(getTotalPrice()) }}

                                    </span>
                                </h5>
                                <div class="total-shipping">
                                    <h5>
                                        هزینه ارسال :
                                        <span>
                                            {{ getDeliveryPrice() . ' تومان' }}
                                        </span>
                                    </h5>

                                </div>
                                <h4 class="grand-totall-title">
                                    جمع کل:
                                    <span>
                                        {{ getSumOfTotalAndDeliveryPrice() }}
                                        تومان
                                    </span>
                                </h4>
                                <a href="./checkout.html"> ادامه فرآیند خرید </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container cart-empty-content" style="display: none;">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <i class="sli sli-basket"></i>
                    <h2 class="font-weight-bold my-4">سبد خرید خالی است.</h2>
                    <p class="mb-40">شما هیچ کالایی در سبد خرید خود ندارید.</p>
                    <a href="shop.html"> ادامه خرید </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const tbody = document.querySelector('tbody');
        tbody.addEventListener('click', tbodyClick);
        const token = document.querySelector('meta[name="csrf-token"]').content;

        function tbodyClick(event) {
            if (event.target.hasAttribute('data-product-id')) {
                let target = event.target;
                event.preventDefault();

                let productID = event.target.getAttribute('data-product-id');
                let route = "{{ route('cart.destroy', ['cart' => ':cart']) }}";
                route = route.replace(':cart', productID);

                if (confirm('آیا مطمئن هستید؟')) {
                    const xhr = ajaxRequest(route);
                    xhr.addEventListener("load", function(event) {
                        target.parentElement.parentElement.parentElement.remove();
                        location.reload();
                    })
                }
            }
        }

        function ajaxRequest(route) {
            const xhr = new XMLHttpRequest();
            xhr.open('DELETE', route);
            xhr.setRequestHeader('X-CSRF-TOKEN', token);
            xhr.send();
            return xhr;
        }
    </script>
@endsection
