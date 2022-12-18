<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>WebProg.ir - Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="{{ asset('css/index/all.css') }}">
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
                                                @foreach ($categories as $allCategory)
                                                    <li>
                                                        @if ($allCategory->parent_id == null)
                                                            <a class="menu-title" href="#">
                                                                {{ $allCategory->name }}
                                                            </a>
                                                            <ul>
                                                                @foreach ($allCategory->children as $child)
                                                                    <li><a href="shop.html">{{ $child->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                @endforeach
                                        </li>
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
                                                    <a href="#"><img alt="" src="" /></a>
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
                                                    <a href="#"><img alt="" src="" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total d-flex justify-content-between align-items-center"
                                                style="direction: rtl;">
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
                                <input id="search" class="input-text" value="" placeholder=" ...جستجو "
                                    type="search" />
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
                                                    <a href="#"><img alt="" src="" /></a>
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
                                                    <a href="#"><img alt="" src="" /></a>
                                                    <div class="item-close">
                                                        <a href="#"><i class="sli sli-close"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="shopping-cart-bottom">
                                            <div class="shopping-cart-total d-flex justify-content-between align-items-center"
                                                style="direction: rtl;">
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
                                    <ul class="dropdown">
                                        <li class="menu-item-has-children">
                                            <a href="#">مردانه</a>
                                            <ul class="dropdown">
                                                <li><a href="shop.html"> پیراهن </a></li>
                                                <li>
                                                    <a href="#"> تی شرت </a>
                                                </li>
                                                <li>
                                                    <a href="#"> پالتو </a>
                                                </li>
                                                <li>
                                                    <a href="#"> لباس راحتی </a>
                                                </li>
                                                <li>
                                                    <a href="#">لباس زیر</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">زنانه</a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a href="product-details.html"> مانتو </a>
                                                </li>
                                                <li>
                                                    <a href="#"> شومیز </a>
                                                </li>
                                                <li>
                                                    <a href="#"> دامن </a>
                                                </li>
                                                <li>
                                                    <a href="#">پالتو </a>
                                                </li>
                                                <li>
                                                    <a href="#">لباس راحتی</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#"> بچه گانه </a>
                                            <ul class="dropdown">
                                                <li>
                                                    <a href="#"> ست لباس </a>
                                                </li>
                                                <li>
                                                    <a href="#"> شلوارک </a>
                                                </li>
                                                <li>
                                                    <a href="#"> ژاکت </a>
                                                </li>
                                                <li>
                                                    <a href="#"> ست نوزاد </a>
                                                </li>
                                                <li>
                                                    <a href="#"> پیراهن </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
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

        <div class="breadcrumb-area pt-35 pb-35 bg-gray" style="direction: rtl;">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.html">صفحه ای اصلی</a>
                        </li>
                        <li class="active">فروشگاه </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="shop-area pt-95 pb-100">
            <div class="container">
                <div class="row flex-row-reverse text-right">

                    <!-- sidebar -->
                    <div class="col-lg-3 order-2 order-sm-2 order-md-1">
                        <div class="sidebar-style mr-30">
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title">جستجو </h4>
                                <div class="pro-sidebar-search mb-50 mt-25">
                                    <form class="pro-sidebar-search-form" action="#">
                                        <input type="text" placeholder="... جستجو ">
                                        <button>
                                            <i class="sli sli-magnifier"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="sidebar-widget">
                                <h4 class="pro-sidebar-title"> دسته بندی </h4>
                                <div class="sidebar-widget-list mt-30">
                                    <ul>
                                        <li>
                                            {{ $category->parent->name }}
                                        </li>
                                        @foreach ($category->parent->children as $child)
                                            <li><a href="#"
                                                    style="{{ $category->name == $child->name ? 'color:red' : '' }}">{{ $child->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <hr>

                            <form action="{{ route('productsCategory.attributes', ['category' => $category->slug]) }}"
                                method="get" id="attributesForm">

                                @foreach ($category->attributes as $attribute)
                                    @if ($attribute->pivot->is_filter)
                                        <div class="sidebar-widget mt-30">
                                            <h4 class="pro-sidebar-title">{{ $attribute->name }}</h4>
                                            <div class="sidebar-widget-list mt-20">
                                                <ul>
                                                    @foreach ($attribute->attributeValue as $attributeValue)
                                                        <li>
                                                            <div class="sidebar-widget-list-left">
                                                                <input type="checkbox" name="attributes[]"
                                                                    value="{{ $attributeValue->value }}"
                                                                    @if (request()->get('attributes') != null) {{ in_array($attributeValue->value, request()->get('attributes')) ? 'checked' : '' }}
                                                                    @endisset />
                                                                <a href="#">{{ $attributeValue->value }}</a>
                                                                <span class="checkmark"></span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <hr> @endif
                                                                    @endforeach
                            </form>

                            {{--  variation attributes: --}}
                            <form action="{{ route('productsCategory.attributes', ['category' => $category->slug]) }}"
                                method="get" id="variationsForm">
                                @foreach ($category->attributes as $attribute)
                                    <div class="sidebar-widget mt-30">
                                        @if ($attribute->pivot->is_variation)
                                            <h4 class="pro-sidebar-title">{{ $attribute->name }}</h4>
                                            <div class="sidebar-widget-list mt-20">
                                                <ul>
                                                    @foreach ($attribute->variationsValue as $value)
                                                        <li>
                                                            <div class="sidebar-widget-list-left">
                                                                <input type="checkbox" value="{{ $value->value }}"
                                                                @if (request()->get('variations') != null) {{ in_array($value->value, request()->get('variations')) ? 'checked' : '' }} @endif
                                                                    name="variations[{{ $value->attribute_id }}]"><a
                                                                    href="#">{{ $value->value }}</a>
                                                                <span class="checkmark"></span>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <hr>
                                        @endif
                                    </div>
                                @endforeach
                            </form>

                        </div>
                    </div>

                    <!-- content -->
                    <div class="col-lg-9 order-1 order-sm-1 order-md-2">
                        <!-- shop-top-bar -->
                        <div class="shop-top-bar" style="direction: rtl;">
                            <form action="" method="get" id="orderby">
                                <div class="select-shoing-wrap">
                                    <div class="shop-select">
                                        <select name="orderBy">
                                            <option value="" disabled selected> مرتب سازی </option>
                                            <option name="orderBy" value="max"> بیشترین قیمت </option>
                                            <option name="orderBy" value="min"> کم ترین قیمت </option>
                                            <option name="orderBy" value="new"> جدیدترین </option>
                                            <option name="orderBy" value="old"> قدیمی ترین </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="shop-bottom-area mt-35">
                            <div class="tab-content jump">

                                {{-- // attributes & variations concated togather --}}

                                @if (!$attributes->isEmpty())
                                    <div class="row ht-products" style="direction: rtl;">
                                        @foreach ($attributes as $product)
                                            <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                                <!--Product Start-->
                                                <div
                                                    class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                                    <div class="ht-product-inner">
                                                        <div class="ht-product-image-wrap">
                                                            <a href="product-details.html" class="ht-product-image">
                                                                <img src="{{ asset('images/product/' . $product->primary_image) }}"
                                                                    alt="Universal Product Style" />
                                                            </a>
                                                            <div class="ht-product-action">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" data-toggle="modal"
                                                                            data-target="#exampleModal"><i
                                                                                class="sli sli-magnifier"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                مشاهده
                                                                                سریع
                                                                            </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i
                                                                                class="sli sli-heart"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                افزودن به علاقه مندی ها </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i
                                                                                class="sli sli-refresh"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                مقایسه </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i
                                                                                class="sli sli-bag"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                افزودن
                                                                                به سبد خرید </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- // amir -->
                                                        <div class="ht-product-content">
                                                            <div class="ht-product-content-inner">
                                                                <div class="ht-product-categories">
                                                                    <a href="#"></a>
                                                                </div>
                                                                <h4 class="ht-product-title text-right">
                                                                    <a href="product-details.html">{{ $product->name }}
                                                                    </a>
                                                                </h4>
                                                                <div class="ht-product-price">
                                                                    @if ($product->variations->first()->sale_price)
                                                                        <span class="new">
                                                                            {{ $product->variations->first()->sale_price }}
                                                                            تومان
                                                                        </span>
                                                                        <span class="old">
                                                                            {{ $product->variations->first()->price }}
                                                                            تومان
                                                                        </span>
                                                                    @else
                                                                        <span class="new">
                                                                            {{ $product->variations->first()->price }}
                                                                            تومان
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                <div class="ht-product-ratting-wrap">
                                                                    <span class="ht-product-ratting">
                                                                        <span class="ht-product-user-ratting"
                                                                            style="width: 100%;">
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
                                        @endforeach
                                    </div>
                                @else
                                    <div class="row ht-products" style="direction: rtl;">
                                        @foreach ($category->products as $product)
                                            <div class="col-xl-4 col-md-6 col-lg-6 col-sm-6">
                                                <!--Product Start-->
                                                <div
                                                    class="ht-product ht-product-action-on-hover ht-product-category-right-bottom mb-30">
                                                    <div class="ht-product-inner">
                                                        <div class="ht-product-image-wrap">
                                                            <a href="product-details.html" class="ht-product-image">
                                                                <img src="{{ asset('images/product/' . $product->primary_image) }}"
                                                                    alt="Universal Product Style" />
                                                            </a>
                                                            <div class="ht-product-action">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#" data-toggle="modal"
                                                                            data-target="#exampleModal"><i
                                                                                class="sli sli-magnifier"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                مشاهده
                                                                                سریع
                                                                            </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i
                                                                                class="sli sli-heart"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                افزودن به علاقه مندی ها </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i
                                                                                class="sli sli-refresh"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                مقایسه </span></a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#"><i
                                                                                class="sli sli-bag"></i><span
                                                                                class="ht-product-action-tooltip">
                                                                                افزودن
                                                                                به سبد خرید </span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- // amir -->
                                                        <div class="ht-product-content">
                                                            <div class="ht-product-content-inner">
                                                                <div class="ht-product-categories">
                                                                    <a href="#"></a>
                                                                </div>
                                                                <h4 class="ht-product-title text-right">
                                                                    <a href="product-details.html">{{ $product->name }}
                                                                    </a>
                                                                </h4>
                                                                <div class="ht-product-price">
                                                                    @if ($product->saleCheck)
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
                                                                            {{ $product->variation->price }}
                                                                            تومان
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                                <div class="ht-product-ratting-wrap">
                                                                    <span class="ht-product-ratting">
                                                                        <span class="ht-product-user-ratting"
                                                                            style="width: 100%;">
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
                                        @endforeach
                                    </div>
                                @endif
                            </div>




                            <div class="pro-pagination-style text-center mt-30">
                                <ul class="d-flex justify-content-center">
                                    <li><a class="prev" href="#"><i class="sli sli-arrow-left"></i></a></li>
                                    <li><a class="active" href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a class="next" href="#"><i class="sli sli-arrow-right"></i></a></li>
                                </ul>
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
                                <a href="#"><img src="assets/img/icon-img/payment.png" alt="" /></a>
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
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12" style="direction: rtl;">
                                <div class="product-details-content quickview-content">
                                    <h2 class="text-right mb-4">لورم ایپسوم</h2>
                                    <div class="product-details-price">
                                        <span>
                                            50,000
                                            تومان
                                        </span>
                                        <span class="old">
                                            75,000
                                            تومان
                                        </span>
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
                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان
                                        گرافیک است. چاپگرها
                                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                                    </p>
                                    <div class="pro-details-list text-right">
                                        <ul class="text-right">
                                            <li>- لورم ایپسوم</li>
                                            <li>- لورم ایپسوم متن ساختگی</li>
                                            <li>- لورم ایپسوم متن</li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-size-color text-right">
                                        <div class="pro-details-size">
                                            <span>سایز</span>
                                            <div class="pro-details-size-content">
                                                <ul>
                                                    <li><a href="#">s</a></li>
                                                    <li><a href="#">m</a></li>
                                                    <li><a href="#">l</a></li>
                                                    <li><a href="#">xl</a></li>
                                                    <li><a href="#">xxl</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="pro-details-quality">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                value="2" />
                                        </div>
                                        <div class="pro-details-cart">
                                            <a href="#">افزودن به سبد خرید</a>
                                        </div>
                                        <div class="pro-details-wishlist">
                                            <a title="Add To Wishlist" href="#"><i
                                                    class="sli sli-heart"></i></a>
                                        </div>
                                        <div class="pro-details-compare">
                                            <a title="Add To Compare" href="#"><i
                                                    class="sli sli-refresh"></i></a>
                                        </div>
                                    </div>
                                    <div class="pro-details-meta">
                                        <span>دسته بندی :</span>
                                        <ul>
                                            <li><a href="#">پالتو</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-meta">
                                        <span>تگ ها :</span>
                                        <ul>
                                            <li><a href="#">لباس, </a></li>
                                            <li><a href="#">پیراهن</a></li>
                                            <li><a href="#">مانتو</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 col-sm-12 col-xs-12">
                                <div class="tab-content quickview-big-img">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="" alt="" />
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="" alt="" />
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="" alt="" />
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="" alt="" />
                                    </div>
                                </div>
                                <!-- Thumbnail Large Image End -->
                                <!-- Thumbnail Image End -->
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active owl-carousel nav nav-style-2" role="tablist">
                                        <a class="active" data-toggle="tab" href="#pro-1"><img src=""
                                                alt="" /></a>
                                        <a data-toggle="tab" href="#pro-2"><img src=""
                                                alt="" /></a>
                                        <a data-toggle="tab" href="#pro-3"><img src=""
                                                alt="" /></a>
                                        <a data-toggle="tab" href="#pro-4"><img src=""
                                                alt="" /></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>
    <script src="{{ asset('js/index/all.js') }}"></script>
    <script>
        const attributesForm = document.querySelector("#attributesForm");
        attributesForm.addEventListener("click", function(event) {
            if (event.target.type == "checkbox") {
                attributesForm.submit();
            }
        });
        const variationsForm = document.querySelector("#variationsForm");
        variationsForm.addEventListener("click", function(event) {
            if (event.target.type == "checkbox") {
                variationsForm.submit();
            }
        });
    </script>
    <script>
        const id = document.querySelector("#orderby");
        id.addEventListener("change", function(e) {
            if (e.target.type == "select-one") {
                id.submit();
            }
        });
    </script>
</body>

</html>
