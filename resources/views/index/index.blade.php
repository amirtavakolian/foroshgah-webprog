<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>WebProg- eCommerce</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/index/app.css')}}" />
    <!-- Modernizer JS -->
    <!-- <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script> -->
</head>

<body>
    <div class="wrapper">

        <header class="header-area sticky-bar">
            <div class="main-header-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo pt-40">
                                <a href="index.html">
                                    <h3 class="font-weight-bold">WebProg.ir</h3>
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu text-center">
                                <nav>
                                    <ul>
                                        <li class="angle-shape">
                                            <a href="about_us.html"> ارتباط با ما </a>
                                        </li>

                                        <li><a href="contact-us.html"> تماس با ما </a></li>

                                        <li class="angle-shape">
                                            <a href="shop.html"> فروشگاه </a>

                                            <ul class="mega-menu">

                                                @foreach ($categories as $category)
                                                <li>
                                                    <a class="menu-title" href="#">{{$category->name}}</a>
                                                    <ul>
                                                        @foreach ($category->children as $child)
                                                        <li><a href="{{url('/product/'.$child->slug)}}">{{ $child->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach

                                            </ul>
                                        </li>

                                        <li class="angle-shape">
                                            <a href="index.html"> صفحه اصلی </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3">
                            <div class="header-right-wrap pt-40">
                                <div class="header-search">
                                    <a class="search-active" href="#"><i class="sli sli-magnifier"></i></a>
                                </div>
                                <div class="cart-wrap">
                                    <button class="icon-cart-active">
                                        <span class="icon-cart">
                                            <i class="sli sli-bag"></i>
                                            <span class="count-style">02</span>
                                        </span>


                                        <span class="cart-price">
                                            500,000
                                        </span>
                                        <span>تومان</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <div class="shopping-cart-top">
                                            <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                            <h4>سبد خرید</h4>
                                        </div>
                                        <ul>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 90.00</span>
                                                </div>

                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{ asset('images/cart/cart-1.svg')}}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 9,000</span>
                                                </div>
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{ asset('images/cart/cart-2.svg')}}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total d-flex justify-content-between align-items-center" style="direction: rtl;">
                                                <h4>
                                                    جمع کل :
                                                </h4>
                                                <span class="shop-total">
                                                    25,000 تومان
                                                </span>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover text-center">
                                                <a class="default-btn" href="checkout.html">
                                                    ثبت سفارش
                                                </a>
                                                <a class="default-btn" href="cart-page.html">
                                                    سبد خرید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="setting-wrap">
                                    <button class="setting-active">
                                        <i class="sli sli-settings"></i>
                                    </button>
                                    <div class="setting-content">
                                        <ul class="text-right">
                                            <li><a href="login.html">ورود</a></li>
                                            <li>
                                                <a href="register.html">ایجاد حساب</a>
                                            </li>
                                            <li><a href="my-account.html">پروفایل</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-search start -->
                <div class="main-search-active">
                    <div class="sidebar-search-icon">
                        <button class="search-close">
                            <span class="sli sli-close"></span>
                        </button>
                    </div>
                    <div class="sidebar-search-input">
                        <form>
                            <div class="form-search">
                                <input id="search" class="input-text" value="" placeholder=" ...جستجو " type="search" />
                                <button>
                                    <i class="sli sli-magnifier"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="header-small-mobile">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="mobile-logo">
                                <a href="index.html">
                                    <h4 class="font-weight-bold">WebProg.ir</h4>
                                </a>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="header-right-wrap">
                                <div class="cart-wrap">
                                    <button class="icon-cart-active">
                                        <span class="icon-cart">
                                            <i class="sli sli-bag"></i>
                                            <span class="count-style">02</span>
                                        </span>

                                        <span class="cart-price">
                                            500,000
                                        </span>
                                        <span>تومان</span>
                                    </button>
                                    <div class="shopping-cart-content">
                                        <div class="shopping-cart-top">
                                            <a class="cart-close" href="#"><i class="sli sli-close"></i></a>
                                            <h4>سبد خرید</h4>
                                        </div>
                                        <ul style="height: 400px;">
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 90.00</span>
                                                </div>

                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{ asset('images/cart/cart-1.svg')}}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="single-shopping-cart">
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#"> لورم ایپسوم </a></h4>
                                                    <span>1 x 9,000</span>
                                                </div>
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="" src="{{ asset('images/cart/cart-2.svg')}}" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total d-flex justify-content-between align-items-center" style="direction: rtl;">
                                                <h4>
                                                    جمع کل :
                                                </h4>
                                                <span class="shop-total">
                                                    25,000 تومان
                                                </span>
                                            </div>
                                            <div class="shopping-cart-btn btn-hover text-center">
                                                <a class="default-btn" href="checkout.html">
                                                    ثبت سفارش
                                                </a>
                                                <a class="default-btn" href="cart-page.html">
                                                    سبد خرید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-off-canvas">
                                    <a class="mobile-aside-button" href="#"><i class="sli sli-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="mobile-off-canvas-active">
            <a class="mobile-aside-close">
                <i class="sli sli-close"></i>
            </a>

            <div class="header-mobile-aside-wrap">
                <div class="mobile-search">
                    <form class="search-form" action="#">
                        <input type="text" placeholder=" ... جستجو " />
                        <button class="button-search">
                            <i class="sli sli-magnifier"></i>
                        </button>
                    </form>
                </div>

                <div class="mobile-menu-wrap">
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu text-right">
                                <li class="menu-item-has-children">
                                    <a href="index.html"> صفحه ای اصلی </a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="shop.html">فروشگاه</a>
                                    @foreach ($categories as $category)
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">{{ $category->name }}</a>
                                            <ul class="dropdown">
                                                @foreach($category->children as $child)
                                                <li><a href="shop.html"> {{ $child->name }} </a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    @endforeach
                                </li>

                                <li><a href="contact-us.html">تماس با ما</a></li>

                                <li><a href="about_us.html"> در باره ما</a></li>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                </div>

                <div class="mobile-curr-lang-wrap">
                    <div class="single-mobile-curr-lang">
                        <ul class="text-right">
                            <li class="my-3"><a href="login.html"> ورود </a></li>
                            <li class="my-3">
                                <a href="register.html"> ایجاد حساب </a>
                            </li>
                            <li class="my-3"><a href="my-account.html"> پروفایل </a></li>
                        </ul>
                    </div>
                </div>

                <div class="mobile-social-wrap text-center">
                    <a class="facebook" href="#"><i class="sli sli-social-facebook"></i></a>
                    <a class="twitter" href="#"><i class="sli sli-social-twitter"></i></a>
                    <a class="pinterest" href="#"><i class="sli sli-social-pinterest"></i></a>
                    <a class="instagram" href="#"><i class="sli sli-social-instagram"></i></a>
                    <a class="google" href="#"><i class="sli sli-social-google"></i></a>
                </div>
            </div>
        </div>

        <div class="slider-area section-padding-1">
            <div class="slider-active owl-carousel nav-style-1">

                @php
                $slider = clone $banners;
                @endphp

                @foreach ($slider->where('type','like', 'slider-%')->get() as $banner)

                <div class="single-slider slider-height-1 bg-paleturquoise">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6 text-right">
                                <div class="slider-content slider-animated-1">
                                    <h1 class="animated">{{ $banner->title }}</h1>
                                    <p class="animated">
                                        {{ $banner->text }}
                                    </p>
                                    <div class="slider-btn btn-hover">
                                        <a class="animated" href='{{url("$banner->button_link")}}'>
                                            <i class="sli sli-basket-loaded"></i>
                                            فروشگاه
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
                                <div class="slider-single-img slider-animated-1">
                                    <img class="animated" src="{{ asset('/images/banner/' . $banner->image )}}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>


        @php
        $indexTop = clone $banners;
        @endphp


        <div class="banner-area pt-100 pb-65">
            <div class="container">
                <div class="row">
                    @foreach ($indexTop->where('type','index-top')->get() as $banner)
                    <div class="col-lg-4 col-md-4">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="{{ url($banner->button_link) }}"><img class="animated" src="{{ asset('/images/banner/' . $banner->image )}}" alt="" /></a>
                            <div class="banner-content-2 banner-position-5">
                                <h4>{{ $banner->title }}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @php
                    $indexTopBottom = clone $banners;
                    @endphp

                    @foreach ($indexTopBottom->where('type','index-top-bottom')->get() as $banner)
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="{{ url($banner->button_link) }}">
                                <img class="animated" src="{{ asset('/images/banner/' . $banner->image )}}" alt="" />
                            </a>
                            <div class="banner-content banner-position-6 text-right">
                                <h3>{{ $banner->title }}</h3>
                                <a href="{{ url($banner->button_link) }}">فروشگاه</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="product-area pb-70">
            <div class="container">

                <div class="product-tab-list nav pb-60 text-center flex-row-reverse">
                    @foreach ($categories as $category)
                    <a href="#product-{{ $loop->index+1 }}" data-toggle="tab">
                        <h4>{{ $category->name }}</h4>
                    </a>
                    @endforeach
                </div>
                <div class="tab-content jump-2">

                    <div id="product-1" class="tab-pane active">
                        <div class="ht-products product-slider-active owl-carousel">
                            <!--Product Start-->
                            @foreach ($products as $product)
                            @if($product->category->parent->slug == "men")
                            <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                <div class="ht-product-inner">
                                    <div class="ht-product-image-wrap">
                                        <a href="product-details.html" class="ht-product-image">
                                            <img src="{{ asset( '/images/product/' . $product->primary_image )}}" alt="Universal Product Style" />

                                        </a>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i data-product-id="{{ $product->id }}" class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
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
                                                <a href="product-details.html"> {{ $product->name }} </a>
                                            </h4>
                                            <div class="ht-product-price">
                                                @isset($product->variations[0]->sale_price)

                                                @if(verta()->toCarbon()->gte($product->variations[0]->date_on_sale_from))
                                                @if(verta()->toCarbon()->lte($product->variations[0]->date_on_sale_to))
                                                <span class="new">

                                                    {{ $product->variations[0]->sale_price }}
                                                    تومان
                                                </span>
                                                <span class="old">
                                                    {{ $product->variations[0]->price }}
                                                    تومان
                                                </span>
                                                @endif
                                                @endif
                                                @else
                                                <span class="new">

                                                    {{ $product->variations[0]->price }}
                                                    تومان
                                                </span>
                                                @endisset
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
                            @endif
                            @endforeach
                        </div>

                    </div>

                    <div id="product-2" class="tab-pane">
                        <div class="ht-products product-slider-active owl-carousel">
                            <!--Product Start-->
                            @foreach ($products as $product)
                            @if($product->category->parent->slug == "women")
                            <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                <div class="ht-product-inner">
                                    <div class="ht-product-image-wrap">
                                        <a href="product-details.html" class="ht-product-image">
                                            <img src="{{ asset( '/images/product/' . $product->primary_image )}}" alt="Universal Product Style" />

                                        </a>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i data-product-id="{{ $product->id }}" class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
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
                                                <a href="product-details.html"> {{ $product->name }} </a>
                                            </h4>
                                            @if($product->quantityCheck == null)
                                            <h3>ناموجود</h3>
                                            @else
                                            <div class="ht-product-price">
                                                @if($product->saleCheck)
                                                <span class="new">
                                                    {{ $product->saleCheck->sale_price }}
                                                    تومان
                                                </span>
                                                <span class="old">
                                                    {{ $product->saleCheck->price }}
                                                    تومان
                                                </span>
                                                @else
                                                <span class="new">
                                                    {{ $product->variations->first()->price }}
                                                    تومان
                                                </span>
                                                @endif
                                            </div>

                                            @endif

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
                            @endif
                            @endforeach
                        </div>

                    </div>

                    <div id="product-3" class="tab-pane">
                        <div class="ht-products product-slider-active owl-carousel">
                            <!--Product Start-->
                            @foreach ($products as $product)
                            @if($product->category->parent->slug == "child")
                            <div class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                <div class="ht-product-inner">
                                    <div class="ht-product-image-wrap">
                                        <a href="product-details.html" class="ht-product-image">
                                            <img src="{{ asset( '/images/product/' . $product->primary_image )}}" alt="Universal Product Style" />
                                        </a>
                                        <div class="ht-product-action">
                                            <ul>
                                                <li>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i data-product-id="{{ $product->id }}" class="sli sli-magnifier"></i><span class="ht-product-action-tooltip"> مشاهده سریع
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
                                                <a href="product-details.html"> {{ $product->name }} </a>
                                            </h4>

                                            <div class="ht-product-price">
                                                <span class="new">
                                                    {{ $product->variations[0]->price }}
                                                    تومان
                                                </span>
                                                @if(isset($product->variation->sale_price))
                                                @if(verta()->toCarbon()->gte($product->variation[0]->date_on_sale_from))
                                                @if(verta()->toCarbon()->lte($product->variation[0]->date_on_sale_to))
                                                <span class="old">
                                                    {{ $product->variations[0]->sale_price }}
                                                    تومان
                                                </span>
                                                @endif
                                                @endif
                                                @endif
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
                            @endif
                            @endforeach
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="testimonial-area pt-80 pb-95 section-margin-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto">
                        <div class="testimonial-active owl-carousel nav-style-1">
                            <div class="single-testimonial text-center">
                                <img src="{{ asset('images/testimonial/testi-1.png')}}" alt="" />


                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                    متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و
                                    آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                                </p>
                                <div class="client-info">
                                    <img src="{{ asset('images/icon-img/testi.png')}}" alt="" />

                                    <h5>لورم ایپسوم</h5>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <img src="{{ asset('images/testimonial/testi-2.png')}}" alt="" />


                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                                    متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                                    کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و
                                    آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت
                                </p>
                                <div class="client-info">
                                    <img src="{{ asset('images/icon-img/testi.png')}}" alt="" />
                                    <h5>لورم ایپسوم</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="banner-area pb-120">
            <div class="container">
                <div class="row">

                    @php
                    $indexBottom = clone $banners;
                    @endphp

                    @foreach ($indexBottom->where('type','index-bottom')->get() as $banner)
                    <div class="col-lg-6 col-md-6 text-right">
                        <div class="single-banner mb-30 scroll-zoom">
                            <a href="{{ url($banner->button_link) }}"><img src="{{ asset('images/banner/' . $banner->image )}}" alt="" /></a>
                            <div class="banner-content banner-position-3">
                                <h2>{{ $banner->title }}</h2>
                                <a href="{{ url($banner->button_link) }}">{{ $banner->button_text }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="feature-area" style="direction: rtl;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-feature text-right mb-40">
                            <div class="feature-icon">
                                <img src="{{ asset('images/icon-img/free-shipping.png')}}" alt="" />

                            </div>
                            <div class="feature-content">
                                <h4>لورم ایپسوم</h4>
                                <p>لورم ایپسوم متن ساختگی</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-feature text-right mb-40 pl-50">
                            <div class="feature-icon">
                                <img src="{{ asset('images/icon-img/support.png')}}" alt="" />
                            </div>
                            <div class="feature-content">
                                <h4>لورم ایپسوم</h4>
                                <p>24x7 لورم ایپسوم</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-feature text-right mb-40">
                            <div class="feature-icon">
                                <img src="{{ asset('images/icon-img/security.png')}}" alt="" />

                            </div>
                            <div class="feature-content">
                                <h4>لورم ایپسوم</h4>
                                <p>لورم ایپسوم متن ساختگی</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer-area bg-paleturquoise" style="direction: rtl;">
            <div class="container">
                <div class="footer-top text-center pt-45 pb-45">
                    <nav>
                        <ul>
                            <li><a href="index.html">صفحه ای اصلی </a></li>
                            <li><a href="shop.html">فروشگاه </a></li>
                            <li><a href="contact-us.html">تماس با ما </a></li>
                            <li><a href="about-us.html">ارتباط با ما </a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="footer-bottom border-top-1 pt-20">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-5 col-12">
                            <div class="footer-social pb-20">
                                <a href="#">اینستاگرام</a>
                                <a href="#">تویتر</a>
                                <a href="#">فیسبوک</a>
                                <a href="#">لینکدین</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <div class="copyright text-center pb-20">
                                <p>Copyright © WebProg.ir</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <div class="payment-mathod pb-20">
                                <a href="#"><img src="{{ asset('images/icon-img/payment.png')}}" alt="" /></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="modalData">

                        </div>
                    </div>
                </div>
                <!-- Modal end -->
            </div>
            <script src="{{ asset('js/index/all.js') }}"></script>
</body>

<script>
    const modalListener = document.querySelector("div[class='tab-content jump-2']");
    const token = document.querySelector('meta[name="csrf-token"]').content;


    modalListener.addEventListener("click", function(e) {
        if (e.target.hasAttribute('data-product-id')) {
            modalData.innerHTML = `
                            <div class="col-md-7 col-sm-12 col-xs-12" style="direction: rtl;">
                                <div class="product-details-content quickview-content">
                                    <img src='/images/loading.gif'>
                                </div>
                            </div>`;

            const productID = e.target.getAttribute('data-product-id');
            let route = "{{ route('product.getProduct', ['product'=>':product']) }}";
            route = route.replace(':product', productID);

            let xhr = xhrRequest(route);

            xhr.addEventListener("progress", function(e) {
                modalData.innerHTML = ``;
            });

            xhr.addEventListener("load", function() {
                let response = JSON.parse(xhr.response);
                console.log(response);

                let viewCodes = `
                    <div class="col-md-7 col-sm-12 col-xs-12" style="direction: rtl;">
                        <div class="product-details-content quickview-content">
                            <h2 class="text-right mb-4">${response.name}</h2>
                            <div class="product-details-price" id="salePriceCheck">
                            </div>

                            <div class="pro-details-rating-wrap">
                                <div class="pro-details-rating">
                                    <i class="sli sli-star yellow"></i>
                                    <i class="sli sli-star yellow"></i>
                                    <i class="sli sli-star yellow"></i>
                                    <i class="sli sli-star"></i>
                                    <i class="sli sli-star"></i>
                                </div>
                                <span>3 دیدگاه</span>
                            </div>
                            <p class="text-right">
                                ${response.description}
                            </p>

                            <div class="pro-details-list text-right">
                                <ul class="text-right" id="attributes">

                                </ul>
                            </div>

                            <div class="pro-details-size-color text-right">
                                <div class="pro-details-size">
                                    <span>${response.variations[0].attribute.name}</span>
                                    <div class="pro-details-size-content">
                                        <ul id="variationAttribute">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2" />
                                </div>
                                <div class="pro-details-cart">
                                    <a href="#">افزودن به سبد خرید</a>
                                </div>
                                <div class="pro-details-wishlist">
                                    <a title="Add To Wishlist" href="#"><i class="sli sli-heart"></i></a>
                                </div>
                                <div class="pro-details-compare">
                                    <a title="Add To Compare" href="#"><i class="sli sli-refresh"></i></a>
                                </div>
                            </div>
                            <div class="pro-details-meta">
                                <span>دسته بندی :</span>
                                <ul>
                                    <li><a href="#">مردانه,</a></li>
                                    <li><a href="#">پالتو</a></li>
                                </ul>
                            </div>
                            <div class="pro-details-meta">
                                <span>تگ ها :</span>
                                <ul>
                                    <li><a href="#">لباس, </a></li>
                                    <li><a href="#">Furniture,</a></li>
                                    <li><a href="#">Electronic</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="tab-content quickview-big-img">
                            <div id="pro-1" class="tab-pane fade show active">
                                <img src="/images/product/${response.primary_image}" alt="" />
                            </div>
                        </div>
                        <!-- Thumbnail Large Image End -->
                        <!-- Thumbnail Image End -->
                        <div class="quickview-wrap mt-15">
                            <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                            </div>
                        </div>
                    </div>`;

                modalData.innerHTML = viewCodes;

                const salePriceCheck = document.querySelector("#salePriceCheck");
                const attributes = document.querySelector("#attributes");
                const variationAttribute = document.querySelector("#variationAttribute");
                const tablist = document.querySelector("div[role='tablist']");

                variationAttribute.addEventListener("click", function(event) {
                    event.preventDefault();
                    if (event.target.hasAttribute('data-variation-id')) {
                        let id = event.target.getAttribute('data-variation-id');

                        let route = "{{ route('product.getProductVariations', ['productvariation'=>':product']) }}";
                        route = route.replace(':product', id);
                        let xhr = xhrRequest(route);

                        xhr.addEventListener("load", function() {
                            const variationValue = JSON.parse(xhr.response);
                            if ("sale_price" in variationValue) {
                                salePriceCheck.innerHTML = `
                                    <span>
                                        ${variationValue.sale_price}
                                        تومان
                                    </span>
                                    <span class="old">
                                        ${variationValue.price}
                                        تومان
                                    </span>`
                            } else {
                                salePriceCheck.innerHTML = `
                                <span>
                                ${variationValue.price}
                                تومان`
                            }
                        });

                    }
                });

                setVariationPrice(response, salePriceCheck);

                response.attributes.map((value, key) => {
                    attributes.innerHTML += `<li>${ value.name } : ${ value.pivot.value }</li>`;
                });

                response.variations.map((value, key) => {
                    variationAttribute.innerHTML += `<li><a href="#" data-variation-id=${value.id}>${ value.value }</a></li>`;
                });

                response.images.map((value, key) => {
                    tablist.innerHTML += `<a class=${key == 0 ? "active" : ""} data-toggle="tab" href="#pro-${key+1}"><img src="/images/product/${value.image}" alt="" style="width:20%;" /></a>`;
                });
            });
        }
    });


    function xhrRequest(route) {
        const xhr = new XMLHttpRequest();
        xhr.open('post', route);
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.send();

        return xhr;
    }

    function setVariationPrice(response, salePriceCheck) {
        if (response.saleCheck != null) {
            salePriceCheck.innerHTML = `
        <span>
            ${response.saleCheck.sale_price}
            تومان
        </span>
        <span class="old">
            ${response.saleCheck.price}
            تومان
        </span>`
        } else {
            salePriceCheck.innerHTML = `
    <span>
    ${response.variations[0].price}
    تومان
    </span>`
        }
    }
</script>

</html>
