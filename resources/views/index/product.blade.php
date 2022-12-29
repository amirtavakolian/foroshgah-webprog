@extends('index.layout.master')

@section('content')
<div class="product-details-area pt-100 pb-95">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 order-2 order-sm-2 order-md-1" style="direction: rtl;">
                <div class="product-details-content ml-30">
                    <h2 class="text-right">{{ $product->name }}</h2>
                    <div class="product-details-price">

                        @if($product->variations->first()->sale_price)
                        <span>
                            {{ $product->variations->first()->sale_price }}
                            تومان
                        </span>
                        <span class="old">
                            {{ $product->variations->first()->price }}
                            تومان
                        </span>
                        @else
                        <span>
                            {{ $product->variations->first()->price }}
                            تومان
                        </span>
                        @endif
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="pro-details-rating">
                            <i class="sli sli-star yellow"></i>
                            <i class="sli sli-star yellow"></i>
                            <i class="sli sli-star yellow"></i>
                            <i class="sli sli-star yellow"></i>
                            <i class="sli sli-star yellow"></i>
                        </div>
                        <span>
                            <a href="#">
                                3
                                دیدگاه
                            </a>
                        </span>
                    </div>
                    <p class="text-right">
                        {{ $product->description }}
                    </p>
                    <div class="pro-details-list text-right">
                        <ul>
                            @foreach ($product->attributes as $attribute)
                            <li>{{ $attribute->name }} : {{ $attribute->pivot->value }}</li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="pro-details-size-color">

                        <div class="pro-details-size text-right">
                            <div class="pro-details-size-content">
                                @foreach($product->category->attributes as $attribute)
                                @if($attribute->pivot->is_variation)
                                <span>{{ $attribute->name }}</span>
                                @endif
                                @endforeach

                                <ul>
                                    @foreach ($product->variations as $variation)
                                    <li><a href="#">{{ $variation->value }}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="pro-details-quality">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                        </div>
                        <div class="pro-details-cart btn-hover">
                            <a href="#"> افزودن به سبد خرید </a>
                        </div>
                        <div class="pro-details-wishlist">
                            <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                        </div>
                        <div class="pro-details-compare">
                            <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                        </div>
                    </div>
                    <div class="pro-details-meta">
                        <span> دسته بندی : </span>
                        <ul>
                            <li><a href="#">{{ $product->category->name }}</a></li>
                        </ul>
                    </div>
                    <div class="pro-details-meta">
                        <span> تگ : </span>
                        <ul>
                            @foreach($product->tags as $tag)
                            <li><a href="#">{{ $tag->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 order-1 order-sm-1 order-md-2">
                <div class="product-details-img">
                    <div class="zoompro-border zoompro-span">
                        <img class="zoompro" src="{{ asset('images/product/'.$product->primary_image) }}" data-zoom-image="{{ asset('images/product/'.$product->primary_image) }}" alt="" />
                    </div>

                    <div id="gallery" class="mt-20 product-dec-slider">
                        @foreach ($product->images as $image)
                        <a data-image="{{ asset('images/product/'.$image->image) }}" data-zoom-image="{{ asset('images/product/'.$image->image) }}">
                            <img src="{{ asset('images/product/'.$image->image) }}" alt="">
                        </a>
                        @endforeach
                        <a data-image="{{ asset('images/product/'.$product->primary_image) }}" data-zoom-image="{{ asset('images/product/'.$product->primary_image) }}">
                            <img src="{{ asset('images/product/'.$product->primary_image) }}" alt="">
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="description-review-area pb-95">
    <div class="container">
        <div class="row" style="direction: rtl;">
            <div class="col-lg-8 col-md-8">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav">
                        <a class="{{ ($errors->count() == 0) ? 'active' : '' }}" data-toggle="tab" href="#des-details1"> توضیحات </a>
                        <a data-toggle="tab" href="#des-details3"> اطلاعات بیشتر </a>
                        <a class="{{ ($errors->count() > 0) ? 'active' : '' }}" data-toggle="tab" href="#des-details2">
                            دیدگاه
                            (3)
                        </a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane {{ ($errors->count() == 0) ? 'active' : '' }}">
                            <div class="product-description-wrapper">
                                <p class="text-justify">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                    طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                    لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                    ابزارهای کاربردی می‌باشد.
                                </p>
                                <p class="text-justify">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                    طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                    لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود
                                    ابزارهای کاربردی می‌باشد.
                                </p>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="product-anotherinfo-wrapper text-right">
                                <ul>
                                    <li>
                                        <span> وزن : </span>
                                        400 g
                                    </li>
                                    <li><span> ابعاد : </span>10 x 10 x 15 cm </li>
                                    <li><span> مواد بکار رفته : </span> 60% cotton, 40% polyester</li>
                                    <li><span> اطلاعات دیگر : </span>
                                        لورم ایپسوم متن ساختگی با تولید سادگی
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="des-details2" class="tab-pane {{ ($errors->count() > 0) ? 'active' : '' }}">



                            @foreach ($comments->get() as $comment)
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/img/product-details/client-1.jpg" alt="">
                                    </div>
                                    @if(!$comment->approved)
                                    @if(auth()->user() && auth()->user()->id == $comment->user_id)
                                    <div class="review-content text-right">
                                        <p class="text-right">
                                            {{ $comment->text }}
                                        </p>
                                        <div class="review-top-wrap">
                                            <div class="review-name">
                                                <h4> {{ $comment->user->name }} |
                                                    <span style="color:red;">{{ "در انتظار تایید مدیر" }}</span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @elseif($comment->approved)
                                    <div class="review-content text-right">
                                        <p class="text-right">
                                            {{ $comment->text }}
                                        </p>
                                        <div class="review-top-wrap">
                                            <div class="review-name">
                                                <h4> {{ $comment->user->name }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                                <br>
                            </div>
                            @endforeach

                            <div class="ratting-form-wrapper text-right">
                                @auth
                                <div class="ratting-form">
                                    <form method="post" action="{{ route('comment.store', ['product'=>$product->id]) }}">
                                        @csrf()
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="rating-form-style mb-20">
                                                    <label> متن دیدگاه : </label>
                                                    <textarea name="review"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <input type="submit" value="ارسال">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                @else
                                <h6>برای نوشتن نظر لطفا <a href="#" style="color:blue">وارد</a> شوید </h6>
                                @endauth

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="pro-dec-banner">
                    <a href="#"><img src="assets/img/banner/banner-7.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-area pb-70">
    <div class="container">
        <div class="section-title text-center pb-60">
            <h2> محصولات مرتبط </h2>
            <p>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                چاپگرها و متون بلکه روزنامه و مجله
            </p>
        </div>
        <div class="arrivals-wrap scroll-zoom">
            <div class="ht-products product-slider-active owl-carousel">
                <!--Product Start-->
                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                    <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                            <a href="product-details.html" class="ht-product-image">
                                <img src="assets/img/product/product-1.svg" alt="Universal Product Style" />
                            </a>
                            <div class="ht-product-action">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip"> افزودن به
                                                علاقه مندی ها </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip"> مقایسه
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن به سبد
                                                خرید </span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ht-product-content">
                            <div class="ht-product-content-inner">
                                <div class="ht-product-categories">
                                    <a href="#">لورم</a>
                                </div>
                                <h4 class="ht-product-title text-right">
                                    <a href="product-details.html"> لورم ایپسوم </a>
                                </h4>
                                <div class="ht-product-price">
                                    <span class="new">
                                        55,000
                                        تومان
                                    </span>
                                    <span class="old">
                                        75,000
                                        تومان
                                    </span>
                                </div>
                                <div class="ht-product-ratting-wrap">
                                    <span class="ht-product-ratting">
                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </span>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Product End-->
                <!--Product Start-->
                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                    <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                            <a href="product-details.html" class="ht-product-image">
                                <img src="assets/img/product/product-2.svg" alt="Universal Product Style" />
                            </a>
                            <div class="ht-product-action">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip"> افزودن به
                                                علاقه مندی ها </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip"> مقایسه
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن به سبد
                                                خرید </span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ht-product-content">
                            <div class="ht-product-content-inner">
                                <div class="ht-product-categories">
                                    <a href="#">لورم </a>
                                </div>
                                <h4 class="ht-product-title text-right">
                                    <a href="product-details.html">لورم ایپسوم</a>
                                </h4>
                                <div class="ht-product-price">
                                    <span class="new">
                                        25,000
                                        تومان
                                    </span>
                                </div>
                                <div class="ht-product-ratting-wrap">
                                    <span class="ht-product-ratting">
                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </span>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Product End-->
                <!--Product Start-->
                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                    <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                            <a href="product-details.html" class="ht-product-image">
                                <img src="assets/img/product/product-3.svg" alt="Universal Product Style" />
                            </a>
                            <div class="ht-product-action">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip"> افزودن به
                                                علاقه مندی ها </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip"> مقایسه
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن به سبد
                                                خرید </span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ht-product-content">
                            <div class="ht-product-content-inner">
                                <div class="ht-product-categories">
                                    <a href="#">لورم</a>
                                </div>
                                <h4 class="ht-product-title text-right">
                                    <a href="product-details.html">لورم ایپسوم</a>
                                </h4>
                                <div class="ht-product-price">
                                    <span class="new">
                                        60,000
                                        تومان
                                    </span>
                                    <span class="old">
                                        90,000
                                        تومان
                                    </span>
                                </div>
                                <div class="ht-product-ratting-wrap">
                                    <span class="ht-product-ratting">
                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </span>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--Product End-->
                <!--Product Start-->
                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                    <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                            <a href="product-details.html" class="ht-product-image">
                                <img src="assets/img/product/product-4.svg" alt="Universal Product Style" />
                            </a>
                            <div class="ht-product-action">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip"> افزودن به
                                                علاقه مندی ها </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip"> مقایسه
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن به سبد
                                                خرید </span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ht-product-content">
                            <div class="ht-product-content-inner">
                                <div class="ht-product-categories">
                                    <a href="#">لورم</a>
                                </div>
                                <h4 class="ht-product-title text-right">
                                    <a href="product-details.html">لورم ایپسوم</a>
                                </h4>
                                <div class="ht-product-price">
                                    <span class="new">
                                        60,000
                                        تومان
                                    </span>
                                </div>
                                <div class="ht-product-ratting-wrap">
                                    <span class="ht-product-ratting">
                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </span>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Product End-->
                <!--Product Start-->
                <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                    <div class="ht-product-inner">
                        <div class="ht-product-image-wrap">
                            <a href="product-details.html" class="ht-product-image">
                                <img src="assets/img/product/product-2.svg" alt="Universal Product Style" />
                            </a>
                            <div class="ht-product-action">
                                <ul>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-heart"></i><span class="ht-product-action-tooltip"> افزودن به
                                                علاقه مندی ها </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-refresh"></i><span class="ht-product-action-tooltip"> مقایسه
                                            </span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="sli sli-bag"></i><span class="ht-product-action-tooltip"> افزودن به سبد
                                                خرید </span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="ht-product-content">
                            <div class="ht-product-content-inner">
                                <div class="ht-product-categories">
                                    <a href="#">لورم </a>
                                </div>
                                <h4 class="ht-product-title text-right">
                                    <a href="product-details.html">لورم ایپسوم</a>
                                </h4>
                                <div class="ht-product-price">
                                    <span class="new">
                                        60,000
                                        تومان
                                    </span>
                                </div>
                                <div class="ht-product-ratting-wrap">
                                    <span class="ht-product-ratting">
                                        <span class="ht-product-user-ratting" style="width: 100%;">
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                            <i class="sli sli-star"></i>
                                        </span>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                        <i class="sli sli-star"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Product End-->
            </div>
        </div>
    </div>
</div>

@endsection
