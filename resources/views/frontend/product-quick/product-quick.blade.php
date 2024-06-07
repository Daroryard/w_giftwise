@extends('layouts.home')
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/price-range.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/fontawesome.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/themify-icons.css') }}">

<style>

    .img-wrapper{
    max-width: 228px !important;
    max-height: 225px !important;
    }

    .ms-n5 {
        margin-left: -40px;
    }

    .mr-input {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .toast-warning {
        background-color: #FFC107 !important;
        border-radius: 10px !important;
        border: 1px solid #666 !important;
        color: #fff !important;
    }

    .subscribe {
        text-align: left;
        padding-left: 20px;
        padding-top: 20px;
        background: rgb(0, 194, 199);
        background: linear-gradient(90deg, rgba(0, 194, 199, 1) 39%, rgba(242, 171, 46, 1) 94%);
        border-radius: var(--border-radius-radius-xs, 8px) !important;
        margin-bottom: 20px;
    }

    .input-sub {
        width: 70%;
        height: 40px;
        border-radius: 5px;
    }


    .file-drop-area {
        position: relative;
        display: flex;
        align-items: center;
        max-width: 100%;
        padding: 25px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, .1);
        transition: .3s;
    }

    .file-drop-area.is-active {
        background-color: #1a1a1a;
    }

    .fake-btn {
        flex-shrink: 0;
        border: 2px solid #00C2C7;
        border-radius: 3px;
        padding: 8px 15px;
        margin-right: 10px;
        font-size: 12px;
        text-transform: uppercase;
    }

    .file-msg {
        color: #9699b3;
        font-size: 16px;
        font-weight: 300;
        line-height: 1.4;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .item-delete {
        display: none;
        position: absolute;
        right: 10px;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .item-delete:before {
        content: "";
        position: absolute;
        left: 0;
        transition: .3s;
        top: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%23bac1cb' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 438.5 438.5'%3e%3cpath d='M417.7 75.7A8.9 8.9 0 00411 73H323l-20-47.7c-2.8-7-8-13-15.4-18S272.5 0 264.9 0h-91.3C166 0 158.5 2.5 151 7.4c-7.4 5-12.5 11-15.4 18l-20 47.7H27.4a9 9 0 00-6.6 2.6 9 9 0 00-2.5 6.5v18.3c0 2.7.8 4.8 2.5 6.6a8.9 8.9 0 006.6 2.5h27.4v271.8c0 15.8 4.5 29.3 13.4 40.4a40.2 40.2 0 0032.3 16.7H338c12.6 0 23.4-5.7 32.3-17.2a64.8 64.8 0 0013.4-41V109.6h27.4c2.7 0 4.9-.8 6.6-2.5a8.9 8.9 0 002.6-6.6V82.2a9 9 0 00-2.6-6.5zm-248.4-36a8 8 0 014.9-3.2h90.5a8 8 0 014.8 3.2L283.2 73H155.3l14-33.4zm177.9 340.6a32.4 32.4 0 01-6.2 19.3c-1.4 1.6-2.4 2.4-3 2.4H100.5c-.6 0-1.6-.8-3-2.4a32.5 32.5 0 01-6.1-19.3V109.6h255.8v270.7z'/%3e%3cpath d='M137 347.2h18.3c2.7 0 4.9-.9 6.6-2.6a9 9 0 002.5-6.6V173.6a9 9 0 00-2.5-6.6 8.9 8.9 0 00-6.6-2.6H137c-2.6 0-4.8.9-6.5 2.6a8.9 8.9 0 00-2.6 6.6V338c0 2.7.9 4.9 2.6 6.6a8.9 8.9 0 006.5 2.6zM210.1 347.2h18.3a8.9 8.9 0 009.1-9.1V173.5c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a8.9 8.9 0 00-9.1 9.1V338a8.9 8.9 0 009.1 9.1zM283.2 347.2h18.3c2.7 0 4.8-.9 6.6-2.6a8.9 8.9 0 002.5-6.6V173.6c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a9 9 0 00-6.6 2.6 8.9 8.9 0 00-2.5 6.6V338a9 9 0 002.5 6.6 9 9 0 006.6 2.6z'/%3e%3c/svg%3e");
    }

    .item-delete:after {
        content: "";
        position: absolute;
        opacity: 0;
        left: 50%;
        top: 50%;
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%) scale(0);
        background-color: #f3dbff;
        border-radius: 50%;
        transition: .3s;
    }

    .item-delete:hover:after {
        transform: translate(-50%, -50%) scale(2.2);
        opacity: 1;
    }

    .item-delete:hover:before {
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg fill='%234f555f' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 438.5 438.5'%3e%3cpath d='M417.7 75.7A8.9 8.9 0 00411 73H323l-20-47.7c-2.8-7-8-13-15.4-18S272.5 0 264.9 0h-91.3C166 0 158.5 2.5 151 7.4c-7.4 5-12.5 11-15.4 18l-20 47.7H27.4a9 9 0 00-6.6 2.6 9 9 0 00-2.5 6.5v18.3c0 2.7.8 4.8 2.5 6.6a8.9 8.9 0 006.6 2.5h27.4v271.8c0 15.8 4.5 29.3 13.4 40.4a40.2 40.2 0 0032.3 16.7H338c12.6 0 23.4-5.7 32.3-17.2a64.8 64.8 0 0013.4-41V109.6h27.4c2.7 0 4.9-.8 6.6-2.5a8.9 8.9 0 002.6-6.6V82.2a9 9 0 00-2.6-6.5zm-248.4-36a8 8 0 014.9-3.2h90.5a8 8 0 014.8 3.2L283.2 73H155.3l14-33.4zm177.9 340.6a32.4 32.4 0 01-6.2 19.3c-1.4 1.6-2.4 2.4-3 2.4H100.5c-.6 0-1.6-.8-3-2.4a32.5 32.5 0 01-6.1-19.3V109.6h255.8v270.7z'/%3e%3cpath d='M137 347.2h18.3c2.7 0 4.9-.9 6.6-2.6a9 9 0 002.5-6.6V173.6a9 9 0 00-2.5-6.6 8.9 8.9 0 00-6.6-2.6H137c-2.6 0-4.8.9-6.5 2.6a8.9 8.9 0 00-2.6 6.6V338c0 2.7.9 4.9 2.6 6.6a8.9 8.9 0 006.5 2.6zM210.1 347.2h18.3a8.9 8.9 0 009.1-9.1V173.5c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a8.9 8.9 0 00-9.1 9.1V338a8.9 8.9 0 009.1 9.1zM283.2 347.2h18.3c2.7 0 4.8-.9 6.6-2.6a8.9 8.9 0 002.5-6.6V173.6c0-2.7-.8-4.9-2.5-6.6a8.9 8.9 0 00-6.6-2.6h-18.3a9 9 0 00-6.6 2.6 8.9 8.9 0 00-2.5 6.6V338a9 9 0 002.5 6.6 9 9 0 006.6 2.6z'/%3e%3c/svg%3e");
    }

    .file-input {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        cursor: pointer;
        opacity: 0;
    }

    .file-input:focus {
        outline: none;
    }

    .absolute_banner .collection-banner .absolute-contain {
        position: absolute;
        background-color: #ffffff;
        bottom: -0px;
        left: 50%;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        padding: 20px;
        -webkit-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.35);
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.35);
        min-width: 85%;
        text-align: left;
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        color: black;
    }

    .absolute_banner .collection-banner {
        overflow: unset;
    }

    .collection-banner {
        position: relative;
        overflow: hidden;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;

    }

    .absolute_banner {
        margin-bottom: 22px;
    }

    .banner-furniture {
        padding-top: 20px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .service-block2 {
        text-align: center;
        padding: 20px;
        background-color: #F9FAFB;
    }

    .service-block1 {
        text-align: center;
        border: 10px solid #fff;
        padding: 20px;
        background-color: #F9FAFB;
        border-radius: 25px;
    }

    .service-block1 svg {
        margin-bottom: 20px;
        width: 60px;
        height: 60px;
    }

    /* Custom CSS to remove border and background color from input and icon */
    .no-border-input {
        border: none;
        border-radius: 0;
        box-shadow: none;
        background-color: transparent;
        /* Remove background color */
        padding-left: 0;
        /* Adjust padding as needed */
    }

    .input-group {
        border: 1px solid #ced4da;
        /* Add border to input-group */
        border-radius: 5px;
        /* Add border-radius for rounded corners */
    }

    .input-group-text {
        border: none;
        background-color: transparent;
        /* Remove background color */
    }

    .form-control:focus {
        border-color: #ced4da;
        /* Change border color on focus */
        box-shadow: 0 0 0 0rem transparent;
        /* Add box shadow on focus */
    }

    .nav-link {
        line-height: 1;
        /* Adjust the line height as needed */
    }

    .icon-nav {
        width: 20px;
        height: 20px;
    }

    .badge {
        background-color: #E8FEFF;
        color: #00C2C7;
    }

    /* Custom CSS for sub-menus */
    .sub-menu {
        display: none;
        position: absolute;
        top: 0;
        left: 100%;
        min-width: 200px;
        z-index: 1;
    }

    /* Custom CSS for mega menu */
    .mega-menu {
        display: none;
        position: absolute;
        top: 0;
        left: 100%;
        min-width: 200px;
        z-index: 1;
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .nav-item:hover .mega-menu,
    .nav-item:focus-within .mega-menu {
        display: block;
    }

    /* Custom CSS for vertical mega menu on small screens */
    @media (max-width: 767px) {
        .mega-menu {
            position: static;
            display: block;
            width: 100%;
        }

        .nav-item .nav-link {
            padding: 0.5rem 1rem;
        }

        .slick-slider {
            width: 96%;
            /* Adjust to your preference for mobile devices */
        }
    }

    /* Customize Next and Previous Buttons */
    .custom-nav-btn {
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .custom-nav-btn img {
        width: 40px;
        height: 40px;
    }

    /* the slides */
    .slick-slide {
        margin: 0 8px;
    }

    /* the parent */
    .slick-list {
        margin: 0 -8px;
    }

    /* .slick-next,
                .slick-prev {
                    background: transparent;
                    border: none;
                    font-size: 24px;
                    color: #000;
                } */

    .product-slider {
        width: 80%;
        /* Adjust the width as needed */
        margin: 0 auto;
    }

    .product-item {
        padding: 10px;
    }

    .product-details {
        background-color: #fff;
        padding: 5px;
    }

    .product-tag {
        color: #FF5733;
        /* Adjust the tag color */
        font-weight: bold;
    }

    .product-name {
        font-size: 1.2rem;
        margin: 10px 0;
    }

    .product-price {
        font-weight: bold;
        /* Adjust the price color */
    }

    .product-min-quantity,
    .product-estimate-date {
        font-size: 0.9rem;
        color: #666;
        /* Adjust the color as needed */
        margin: 5px 0;
    }
    h6 {
        size : 14px !important;
        color: #000 !important;
    }
</style>

@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="page-content">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 mt-3">
                    <div class="input-group">
                        <span class="input-group-text me-2">
                            <i class="fas fa-search text-secondary mt-1"></i>
                        </span>
                        <input type="search" class="form-control no-border-input" placeholder="{{ __('validation.top_search_input') }}" onkeyup="search(this.value)" onclick="clearSearch()">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-0 mt-sm-0 mt-md-3 mt-lg-3 mt-xl-3" style="padding-top : 5px;">
                    <div class="d-flex flex">
                        <div class="me-2">{{ __('validation.top_popular_search') }} :</div>
                        <div class="me-2"><span class="badge p-2">{{ __('validation.top_popular_search_1') }}</span></div>
                        <div class="me-2"><span class="badge p-2">{{ __('validation.top_popular_search_2') }}</span></div>
                        <div class="me-2"><span class="badge p-2">Staff Pick</span></div>
                        <div class="me-2"><span class="badge p-2">Gift Set</span></div>
                    </div>
                </div>

                <div id="result-search" hidden>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7" style="border: 0.2px solid #ccc;border-radius:5px !important">
                        <ul class="list-group dropdown scroll-list">

                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 mt-0 mt-sm-0 mt-md-3 mt-lg-3 mt-xl-3" style="padding-top : 5px;">
                    </div>
                </div>
            </div>


            <!-- section start -->
            <section class="section-b-space ratio_asos">
                <div class="collection-wrapper">
                    <div class="collection-content">
                        <div class="page-main-content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="{{asset($img1->conf_productquick_img)}}" class="img-fluid lazyload" alt="" style="width: 100%;"></a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- section End -->

            <!-- section start -->
            <section class="section-b-space ratio_asos">
                <div class="collection-wrapper">
                    <div class="section-content-quickproduct">
                        <div class="row">
                            <div class="col-sm-3 collection-filter">
                                <!-- side-bar colleps block stat -->
                                <div class="collection-filter-block">
                                    <!-- brand filter start -->
                                    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                                    <!-- price filter start here -->
                                    <div class="collection-collapse-block border-0 open">
                                        <h3 class="collapse-block-title">{{ __('validation.product_title_price') }}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="wrapper mt-3">
                                                <div class="range-slider">
                                                    <input type="text" class="js-range-slider silder-input" value="" onchange="rangPrice()" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">{{ __('validation.product_title_production_time') }}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="collection-brand-filter">
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="ready" value="ready" onclick="rangPrice()" name="check_date">
                                                    <label class="custom-control-label" for="ready">{{ __('validation.product_timeline_ready') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="in7" value="7" onclick="rangPrice()" name="check_date">
                                                    <label class="custom-control-label" for="in7">{{ __('validation.product_timeline_within_7') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="in14" value="14" onclick="rangPrice()" name="check_date">
                                                    <label class="custom-control-label" for="in14">{{ __('validation.product_timeline_within_14') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="in30" value="30" onclick="rangPrice()" name="check_date">
                                                    <label class="custom-control-label" for="in30">{{ __('validation.product_timeline_within_30') }}</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">{{ __('validation.product_title_qty') }}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="collection-brand-filter">
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="no_minimum" value="0" onclick="rangPrice()" name="check_order">
                                                    <label class="custom-control-label" for="no_minimum">{{ __('validation.product_no_minimum') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="20sku" value="20" onclick="rangPrice()" name="check_order">
                                                    <label class="custom-control-label" for="20sku">{{ __('validation.product_minimum_20') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="50sku" value="50" onclick="rangPrice()" name="check_order">
                                                    <label class="custom-control-label" for="50sku">{{ __('validation.product_minimum_50') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="100sku" value="100" onclick="rangPrice()" name="check_order">
                                                    <label class="custom-control-label" for="100sku">{{ __('validation.product_minimum_100') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="500sku" value="500" onclick="rangPrice()" name="check_order">
                                                    <label class="custom-control-label" for="500sku">{{ __('validation.product_minimum_500') }}</label>
                                                </div>
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="radio" class="custom-control-input" id="500over" value="500over" onclick="rangPrice()" name="check_order">
                                                    <label class="custom-control-label" for="500over">{{ __('validation.product_more_than_500') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">{{ __('validation.product_title_category') }}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="collection-brand-filter">

                                                @foreach ($catmanu as $item)

                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="cylinder_glass" value="{{ $item->conf_category_id }}" onclick="rangPrice()" name="check_category">
                                                    <label class="custom-control-label" for="cylinder_glass">{{ $item->conf_category_name_th }}</label>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <!-- color filter start here -->
                                    <div class="collection-collapse-block open">
                                        <h3 class="collapse-block-title">{{ __('validation.product_title_color') }}</h3>
                                        <div class="collection-collapse-block-content">
                                            <div class="color-selector">
                                                <ul>
                                                    <li class="สีขาว color-quo-1 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีเขียว color-quo-2 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีแดง color-quo-3 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีดำ color-quo-4 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีน้ำเงิน color-quo-5 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีส้ม color-quo-6 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีชมพู color-quo-7 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีม่วง color-quo-8 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีน้ำตาล color-quo-9 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีเทา color-quo-10 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีฟ้า color-quo-11 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีเงิน color-quo-12 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีเหลือง color-quo-13 ck-color" onclick="rangPrice()"></li>
                                                    <li class="สีกรม color-quo-14 ck-color" onclick="rangPrice()"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- side-bar banner start here -->
                                <div class="collection-sidebar-banner">
                                    <a href="#"><img src="../assets/images/side-banner.png" class="img-fluid blur-up lazyload" alt=""></a>
                                </div>
                                <!-- side-bar banner end here -->
                            </div>
                            <div class="collection-content col">
                                <div class="page-main-content" id="sec-filter">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="top-banner-wrapper">
                                                <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                                <div class="top-banner-content small-section">
                                                    <h3 style="color:#1a1a1a">{{ __('validation.product_section_ready') }}</h3>
                                                </div>
                                            </div>
                                            <div class="collection-product-wrapper">
                                                <div class="product-top-filter">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-wrapper-grid product-load-more product-ready">
                                                    <div class="row margin-res">
                                                        @foreach ($pd as $key => $item)
                                                        @if($key < 4)
                                                        <div class="col-xl-3 col-6 col-grid-box-ready">
                                                        @else
                                                        <div class="col-xl-3 col-6 col-grid-box-ready" style="display:none">
                                                        @endif
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img1)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                    <div class="back">
                                                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img2)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                    </div>

                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        <span class="product-tag">
                                                                            @if(!empty($item->saleProductTags))
                                                                            @foreach ($item->saleProductTags as $tag)
                                                                            @if(app()->getLocale() == 'th')
                                                                            <span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span>
                                                                            @else
                                                                            <span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span>
                                                                            @endif
                                                                            @endforeach
                                                                            @endif
                                                                        </span>
                                                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                                                            @if(app()->getLocale() == 'th')
                                                                            <h6>{{Str::limit($item->conf_mainproduct_name_th,50)}}</h6>
                                                                            @else
                                                                            <h6>{{Str::limit($item->conf_mainproduct_name_en,50)}}</h6>
                                                                            @endif
                                                                        </a>
                                                                        <h4>{{$item->price}}</h4>
                                                                        <small>{{ __('validation.product_production_min') }} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</small>
                                                                        <br>
                                                                        <small>{{ __('validation.product_delivery_in') }} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @if(count($pd) > 4)
                                                <div class="load-more-sec"><a href="javascript:void(0)" class="loadmore-ready">{{ __('validation.product_view_more') }}</a></div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="top-banner-wrapper">
                                                <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                                <div class="top-banner-content small-section">
                                                    <h3 style="color:#1a1a1a">{{ __('validation.product_section_7_days') }}</h3>
                                                </div>
                                            </div>
                                            <div class="collection-product-wrapper">
                                                <div class="product-top-filter">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-wrapper-grid product-load-more product-7days">
                                                    <div class="row margin-res">
                                                        @foreach ($pd1 as $key => $item)
                                                        @if($key < 4)
                                                        <div class="col-xl-3 col-6 col-grid-box-7days">
                                                        @else
                                                        <div class="col-xl-3 col-6 col-grid-box-7days" style="display:none">
                                                        @endif
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img1)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                    <div class="back">
                                                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img2)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        <span class="product-tag">
                                                                            @if(!empty($item->saleProductTags))
                                                                            @foreach ($item->saleProductTags as $tag)
                                                                            @if(app()->getLocale() == 'th')
                                                                            <span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span>
                                                                            @else
                                                                            <span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span>
                                                                            @endif
                                                                            @endforeach
                                                                            @endif
                                                                        </span>
                                                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                                                            @if(app()->getLocale() == 'th')
                                                                            <h6>{{Str::limit($item->conf_mainproduct_name_th,50)}}</h6>
                                                                            @else
                                                                            <h6>{{Str::limit($item->conf_mainproduct_name_en,50)}}</h6>
                                                                            @endif
                                                                        </a>
                                                                        <h4>{{$item->price}}</h4>
                                                                        <small>{{ __('validation.product_production_min') }} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</small>
                                                                        <br>
                                                                        <small>{{ __('validation.product_delivery_in') }} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach

                                                    </div>

                                                </div>
                                            </div>
                                            @if(count($pd1) > 4)
                                            <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-7days">{{ __('validation.product_view_more') }}</a></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12">

                                        <div class="top-banner-wrapper">
                                            <img src="{{asset($img2->conf_productquick_img)}}" class="img-fluid lazyload" alt="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h3 style="color:#1a1a1a">{{ __('validation.product_section_14_days') }}</h3>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more product-14days">
                                                <div class="row margin-res">
                                                    @foreach ($pd2 as $key => $item)
                                                    @if($key < 4)
                                                    <div class="col-xl-3 col-6 col-grid-box-14days">
                                                    @else
                                                    <div class="col-xl-3 col-6 col-grid-box-14days" style="display:none">
                                                    @endif
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img1)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                </div>
                                                                <div class="back">
                                                                    <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img2)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                </div>

                                                            </div>
                                                            <div class="product-detail">
                                                                <div>
                                                                    <span class="product-tag">
                                                                        @if(!empty($item->saleProductTags))
                                                                        @foreach ($item->saleProductTags as $tag)
                                                                        @if(app()->getLocale() == 'th')
                                                                        <span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span>
                                                                        @else
                                                                        <span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span>
                                                                        @endif
                                                                        @endforeach
                                                                        @endif
                                                                    </span>
                                                                    <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                                                        @if(app()->getLocale() == 'th')
                                                                        <h6>{{Str::limit($item->conf_mainproduct_name_th,50)}}</h6>
                                                                        @else
                                                                        <h6>{{Str::limit($item->conf_mainproduct_name_en,50)}}</h6>
                                                                        @endif
                                                                    </a>
                                                                    <h4>{{$item->price}}</h4>
                                                                    <small>{{ __('validation.product_production_min') }} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</small>
                                                                    <br>
                                                                    <small>{{ __('validation.product_delivery_in') }} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @if(count($pd2) > 4)
                                            <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-14days">{{ __('validation.product_view_more') }}</a></div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h3 style="color:#1a1a1a">{{ __('validation.product_section_30_days') }}</h3>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more product-30days">
                                                <div class="row margin-res">
                                                    @foreach ($pd3 as $key => $item)
                                                    @if($key < 4)
                                                    <div class="col-xl-3 col-6 col-grid-box-30days">
                                                    @else
                                                    <div class="col-xl-3 col-6 col-grid-box-30days" style="display:none">
                                                    @endif
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img1)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                </div>
                                                                <div class="back">
                                                                    <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-"><img src="{{asset($item->conf_mainproduct_img2)}}" class="img-fluid  lazyload bg-img" alt=""></a>
                                                                </div>

                                                            </div>
                                                            <div class="product-detail">
                                                                <div>
                                                                    <span class="product-tag">
                                                                        @if(!empty($item->saleProductTags))
                                                                        @foreach ($item->saleProductTags as $tag)
                                                                        @if(app()->getLocale() == 'th')
                                                                        <span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span>
                                                                        @else
                                                                        <span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span>
                                                                        @endif
                                                                        @endforeach
                                                                        @endif
                                                                    </span>
                                                                    <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                                                        @if(app()->getLocale() == 'th')
                                                                        <h6>{{Str::limit($item->conf_mainproduct_name_th,50)}}</h6>
                                                                        @else
                                                                        <h6>{{Str::limit($item->conf_mainproduct_name_en,50)}}</h6>
                                                                        @endif
                                                                    </a>
                                                                    <h4>{{$item->price}}</h4>
                                                                    <small>{{ __('validation.product_production_min') }} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</small>
                                                                    <br>
                                                                    <small>{{ __('validation.product_delivery_in') }} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @if(count($pd3) > 4)
                                            <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-30days">{{ __('validation.product_view_more') }}</a></div>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
        </div>
    </div>














</div>
</div>
</section>
</div>

<!-- section End -->



</div>
</div>
</div>

@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/multikart/js/price-range.js') }}"></script>
<script src="{{ asset('assets/frontend/multikart/js/script.js') }}"></script>



<script>



 $(function() {

        $(".loadmore-ready").on('click', function(e) {
            if ($(".product-ready .col-grid-box-ready:hidden").length === 0) {
                $(".loadmore-ready").text('no more products');
            }else{
                $(".product-ready .col-grid-box-ready:hidden").slice(0, 4).slideDown().css('display', 'block');

            }
        });
        $(".loadMore-7days").on('click', function(e) {
            if ($(".product-7days .col-grid-box-7days:hidden").length === 0) {
                $(".loadMore-7days").text('no more products');
            }else{
                $(".product-7days .col-grid-box-7days:hidden").slice(0, 4).slideDown().css('display', 'block');

            }
        });
        $(".loadMore-14days").on('click', function(e) {
            if ($(".product-14days .col-grid-box-14days:hidden").length === 0) {
                $(".loadMore-14days").text('no more products');
            }else{
                $(".product-14days .col-grid-box-14days:hidden").slice(0, 4).slideDown().css('display', 'block');

            }
        });
        $(".loadMore-30days").on('click', function(e) {
            if ($(".product-30days .col-grid-box-30days:hidden").length === 0) {
                $(".loadMore-30days").text('no more products');
            }else{
                $(".product-30days .col-grid-box-30days:hidden").slice(0, 4).slideDown().css('display', 'block');

            }
        });




    });





    rangPrice = () => {

        $('.loading').removeAttr('hidden');

        if ($('.irs-from').text() != '') {
            price_min = $('.irs-from').text().replace(/,/g, '');
        } else {
            price_min = 0;
        }

        if ($('.irs-to').text() != '') {
            price_max = $('.irs-to').text().replace(/,/g, '');
        } else {
            price_max = 0;
        }


        let check_order = $('input[name="check_order"]:checked').val();
        let check_date = $('input[name="check_date"]:checked').val();
        let check_category = [];
        let check_color = [];

        $('input[name="check_category"]:checked').each(function() {

            if (this.value == 'set') {
                check_category.push('29');
                check_category.push('23');
                check_category.push('22');
            } else {
                check_category.push(this.value);
            }


        });


        setTimeout
            (
                function() {

                    $('.ck-color').each(function() {
                        if ($(this).hasClass('active')) {
                            check_color.push($(this).attr('class').split(' ')[0]);
                        }
                    });


                }, 700
            );


        setTimeout
            (
                function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('product-quick.filter') }}",
                        dataType: "json",
                        data: {
                            price_min: price_min,
                            price_max: price_max,
                            check_order: check_order,
                            check_date: check_date,
                            check_category: check_category,
                            check_color: check_color,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            console.log(data);

                            let unique = [...new Map(data.pd.map(item => [item['conf_mainproduct_id'], item])).values()];


                            let sec_ready = '';
                            let sec_7 = '';
                            let sec_14 = '';
                            let sec_30 = '';

                            $.each(unique, function(index, value) {

                                let langcheck = '{{ app()->getLocale() }}';

                                if(langcheck == 'th'){
                                    value.conf_mainproduct_name_th = value.conf_mainproduct_name_th.substring(0, 50);
                                }else{
                                    value.conf_mainproduct_name_th = value.conf_mainproduct_name_en.substring(0, 50);
                                }


                                if (parseInt(value.conf_subproduct_days) <= 7) {

                                    let tag = '';
                                    if (value.tag != null) {
                                        $.each(value.tag, function(index1, value1) {
                                            tag += `<span class="badge">${value1.conf_mainproduct_tag_name_th}</span>`;
                                        });
                                    }

                                    let div_7 = '';

                                    if(unique.length < 4){
                                        div_7 = '<div class="col-xl-3 col-6 col-grid-box-7days" style="display:block;">';
                                    }else{
                                        div_7 = '<div class="col-xl-3 col-6 col-grid-box-7days" style="display:none;">';
                                    }
                                    sec_7 += `
                                                            ${div_7}
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img1}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img1}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    <div class="back">
                                                                    <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img2}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img2}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                   
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        ${tag}
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-">
                                                                        <h6>${value.conf_mainproduct_name_th.substring(0, 50)}</h6>
                                                                            
                                                                        </a>
                                                                        <h4>${value.conf_mainproduct_price}</h4>
                                                                        <small>{{ __('validation.product_production_min') }} ${value.conf_subproduct_quota} {{ __('validation.unit_piece') }}</small>
                                                                        <br>
                                                                        <small>{{ __('validation.product_delivery_in') }} ${value.conf_subproduct_days} {{ __('validation.unit_day') }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`


                                } else if (parseInt(value.conf_subproduct_days) <= 14) {

                                    let tag = '';
                                    if (value.tag != null) {
                                        $.each(value.tag, function(index1, value1) {
                                            tag += `<span class="badge">${value1.conf_mainproduct_tag_name_th}</span>`;
                                        });
                                    }

                                    let div_14 = '';

                                    if(unique.length < 4){
                                        div_14 = '<div class="col-xl-3 col-6 col-grid-box-14days" style="display:block;">';
                                    }else{
                                        div_14 = '<div class="col-xl-3 col-6 col-grid-box-14days" style="display:none;">';
                                    }

                                    sec_14 += `
                                                        ${div_14}
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img1}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img1}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    <div class="back">
                                                                    <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img2}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img2}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        ${tag}
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-">
                                                                        <h6>${value.conf_mainproduct_name_th.substring(0, 50)}</h6>                                                                         
                                                                        </a>
                                                                        <h4>${value.conf_mainproduct_price}</h4>
                                                                        <small>{{ __('validation.product_production_min') }} ${value.conf_subproduct_quota} {{ __('validation.unit_piece') }}</small>
                                                                        <br>
                                                                        <small>{{ __('validation.product_delivery_in') }} ${value.conf_subproduct_days} {{ __('validation.unit_day') }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`

                                } else if (parseInt(value.conf_subproduct_days) <= 30) {

                                    let tag = '';
                                    if (value.tag != null) {
                                        $.each(value.tag, function(index1, value1) {
                                            tag += `<span class="badge">${value1.conf_mainproduct_tag_name_th}</span>`;
                                        });
                                    }

                                    
                                    let div_30 = '';

                                    if(unique.length < 4){
                                        div_30 = '<div class="col-xl-3 col-6 col-grid-box-30days" style="display:block;">';
                                    }else{
                                        div_30 = '<div class="col-xl-3 col-6 col-grid-box-30days" style="display:none;">';
                                    }

                                    sec_30 += `
                                                        ${div_30}
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img1}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img1}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    <div class="back">
                                                                    <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img2}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img2}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        ${tag}
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-">
                                                                        <h6>${value.conf_mainproduct_name_th.substring(0, 50)}</h6>                                                                         
                                                                        </a>
                                                                        <h4>${value.conf_mainproduct_price}</h4>
                                                                        <small>{{ __('validation.product_production_min') }} ${value.conf_subproduct_quota} {{ __('validation.unit_piece') }}</small>
                                                                        <br>
                                                                        <small>{{ __('validation.product_delivery_in') }} ${value.conf_subproduct_days} {{ __('validation.unit_day') }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`

                                } else if (value.conf_subproduct_days == 0) {

                                    let tag = '';
                                    if (value.tag != null) {
                                        $.each(value.tag, function(index1, value1) {
                                            tag += `<span class="badge">${value1.conf_mainproduct_tag_name_th}</span>`;
                                        });
                                    }

                                    let div_ready = '';

                                    if(unique.length < 4){
                                        div_ready = '<div class="col-xl-3 col-6 col-grid-box-ready" style="display:block;">';
                                    }else{
                                        div_ready = '<div class="col-xl-3 col-6 col-grid-box-ready" style="display:none;">';
                                    }
                                
                                    sec_ready += `
                                                        ${div_ready}
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img1}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img1}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    <div class="back">
                                                                    <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-" class="bg-size" style="background-image: url(&quot;${value.conf_mainproduct_img2}&quot;); background-size: cover; background-position: center center; display: block;"><img src="${value.conf_mainproduct_img2}" class="img-fluid  lazyload bg-img" alt="" style="display: none;"></a>
                                                                    </div>
                                                                    
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        ${tag}
                                                                        <a href="/{{ app()->getLocale() }}/product/${value.conf_mainproduct_id}/-">
                                                                        <h6>${value.conf_mainproduct_name_th.substring(0, 50)}</h6>
                                                                            
                                                                        </a>
                                                                        <h4>${value.conf_mainproduct_price}</h4>
                                                                        <small>{{ __('validation.product_production_min') }} ${value.conf_subproduct_quota} {{ __('validation.unit_piece') }}</small>
                                                                        <br>
                                                                        <small>{{ __('validation.product_delivery_in') }} ${value.conf_subproduct_days} {{ __('validation.unit_day') }}</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>`

                                }



                            });

                            $('#sec-filter').html('');

                            let button_ready = '';

                            setTimeout(function() {

                                if (sec_ready == '' || sec_ready == null || sec_ready.length == 0) {

                                } else {

                                if(unique.length > 4){
                                    button_ready = `<div class="load-more-sec"><a href="javascript:void(0)" class="loadmore-ready">{{ __('validation.product_view_more') }}</a></div>`;
                                }


                                    $('#sec-filter').html(`
                                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h3 style="color:#1a1a1a">{{ __('validation.product_section_ready') }}</h3>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more product-ready">
                                                <div class="row margin-res">

                                                ${sec_ready}
                                          
                                                </div>
                                            </div>
                                            ${button_ready}
                                        </div>
                                    </div>
                    `);
                                }

                                let button_7 = '';

                                if (sec_7 == '' || sec_7 == null || sec_7.length == 0) {

                                } else {

                                    if(unique.length > 4){
                                        button_7 = `<div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-7days">{{ __('validation.product_view_more') }}</a></div>`;
                                    }


                                    $('#sec-filter').html(`
                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h3 style="color:#1a1a1a">{{ __('validation.product_section_7_days') }}</h3>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more">
                                                <div class="row margin-res">

                                                ${sec_7}
                                          
                                                </div>
                                            </div>
                                            ${button_7}
                                        </div>
                                    </div>
                    `);
                                }

                                let button_14 = '';

                                if (sec_14 == '' || sec_14 == null || sec_14.length == 0) {

                                } else {

                                    if(unique.length > 4){
                                        button_14 = `<div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-14days">{{ __('validation.product_view_more') }}</a></div>`;
                                    }

                                    $('#sec-filter').html(`
                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h3 style="color:#1a1a1a">{{ __('validation.product_section_14_days') }}</h3>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more">
                                                <div class="row margin-res">

                                                ${sec_14}
                                          
                                                </div>
                                            </div>
                                            ${button_14}
                                        </div>
                                    </div>
                    `);
                                }

                                let button_30 = '';

                                if (sec_30 == '' || sec_30 == null || sec_30.length == 0) {

                                } else {

                                    if(unique.length > 4){
                                        button_30 = `<div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-30days">{{ __('validation.product_view_more') }}</a></div>`;
                                    }

                                    $('#sec-filter').html(`
                    <div class="col-sm-12">
                                        <div class="top-banner-wrapper">
                                            <a href="#"><img src="../assets/images/mega-menu/2.jpg" class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h3 style="color:#1a1a1a">{{ __('validation.product_section_30_days') }}</h3>
                                            </div>
                                        </div>
                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more">
                                                <div class="row margin-res">

                                                ${sec_30}
                                          
                                                </div>
                                            </div>
                                            ${button_30}
                                        </div>
                                    </div>
                    `);
                                }


                                $('.loading').attr('hidden', 'hidden');


                                sec_ready = '';
                                sec_7 = '';
                                sec_14 = '';
                                sec_30 = '';

                            }, 500);


                        }
                    });

                }, 1000
            );




    }
</script>
@endsection