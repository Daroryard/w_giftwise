@extends('layouts.home')
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<style>
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

    .absolute-contain {
        background-color: #AFADAB !important;

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

        .inline-content {
            display: block;
        }

        .inline-content img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .text-we {
            font-size: 12px;
            color: #fff !important;
        }
    }


    .text-we {
        color: #fff !important;
        font-size: 12px;
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

    .slick-next:before {
        font-family: 'slick';
        font-size: 20px;
        line-height: 1;
        opacity: .75;
        color: black;
        background: none !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .slick-prev:before {
        font-family: 'slick';
        font-size: 20px;
        line-height: 1;
        opacity: .75;
        color: black;
        background: none !important;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    p {
        size: 14px !important;
        color: #000 !important;
    }

    img {

        border-radius: 10px;

    }
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="page-content">
            <div class="container">
                <div class="row">
                @include('layouts.searchbar')

                </div>
            </div><br><br>
            <div class="section-content-discovery">
                <div class="row">
                    <center>
                        <span class="h3">{{ __('validation.discover_title_search') }}</span><br>
                        <span class="h6" style="color : #ccc;">
                            {{ __('validation.discover_title_search_description') }}
                        </span><br><br>
                        <div class="input-group" style="width: 50%">
                            <span class="input-group-text me-2">
                                <i class="fas fa-search text-secondary mt-1"></i>
                            </span>
                            <input type="search" class="form-control no-border-input" id="search-category" placeholder="{{ __('validation.discover_title_search_input') }}" onkeyup="searchTag(this.value)" onclick="clearCategory()">

                        </div>
                        <div id="result-category" class="input-group" style="width: 50%" hidden>
                            <div class="col-12" style="border: 0.2px solid #ccc;border-radius:5px !important">
                                <ul class="list-group dropdown scroll-list-category">

                                </ul>
                            </div>
                        </div>
                    </center>
                </div>
            </div><br><br>
            <div class="section-content-discovery section-pd">
                <div class="row">
                    <div class="row mb-3">
                        <div class="col-md-10">
                            <p>
                                <span class="h4">{{ __('validation.discover_title_product_hot_week') }}</span><br>
                                <span class="h6" style="color : #ccc;">
                                    {{ __('validation.discover_title_product_hot_week_description') }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-2">
                            <!-- <p class="text-end text-secondary fs-6 fw-semibold font-family-Sukhumvit Set col-12 m-0 px-3 py-2">ดูทั้งหมด</p> -->
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="new-product-slider mb-3">
                                @foreach ($pdsale as $item)
                                <div class="active-hov">
                                    <center>
                                        <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                            <img src={{$item->conf_mainproduct_img1}} width="230.4" height="225" />
                                        </a>
                                    </center>
                                    <div class="product-details mt-3">
                                        <span class="product-tag">
                                            @if(!empty($item->saleProductTags))
                                            @foreach ($item->saleProductTags as $tag)
                                            @if(app()->getLocale() == 'th')
                                            <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span></a>
                                            @else
                                            <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span></a>
                                            @endif
                                            @endforeach
                                            @endif
                                        </span>
                                        <p>
                                            @if(app()->getLocale() == 'th')
                                            {{ Str::limit($item->conf_mainproduct_name_th,50)}}
                                            @else
                                            {{ Str::limit($item->conf_mainproduct_name_en,50)}}
                                            @endif
                                        </p>
                                        <p class="product-price">{{$item->price}}</p>
                                        <p class="product-min-quantity text-secondary">{{__('validation.discover_production_min')}} {{number_format($item->timeline_qty,0)}} {{__('validation.unit_piece')}}</p>
                                        <p class="product-estimate-date text-secondary">{{__('validation.discover_delivery_in')}} {{number_format($item->timeline_day,0)}} {{__('validation.unit_day')}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <section class="banner-furniture absolute_banner ratio3_2 section-cate">
                <div class="section-content-discovery">
                    <div class="row partition3">
                        @foreach ($fav_tag as $item)
                        <div class="col-md-3 cate-{{$item->ms_product_tag_id}} cate-all" style="padding-bottom: 35px;">
                            <a href="/{{ app()->getLocale() }}/product-quick-tag/{{$item->ms_product_tag_id}}/-" class="absolute-contain">
                                <div class="collection-banner p-left text-left">
                                    @if($item->ms_product_tag_img1 == null)
                                    <img src="https://erp.giftwise.co.th/assets/images/categorys/IMG_20231121034623_73sQ0.jpg" alt=""
                                        class="img-fluid lazyload bg-img" style="border-radius: 25px;">
                                    @else
                                    <img src="{{$item->ms_product_tag_img1}}" alt=""
                                        class="img-fluid lazyload bg-img" style="border-radius: 25px;">
                                    @endif
                                    <div class="absolute-contain">
                                        @if(app()->getLocale() == 'th')
                                        <p class="text-we">{{$item->ms_product_tag_name}}</p>
                                        @else
                                        <p class="text-we">{{$item->ms_product_tag_nameen}}</p>
                                        @endif
                                        <small style="font-size: .8em !important">
                                            @if(app()->getLocale() == 'th')
                                            <small style="font-size: .8em !important">{{$item->ms_product_tag_remark}}</small>
                                            @else
                                            <small style="font-size: .8em !important">{{$item->ms_product_tag_remarken}}</small>
                                            @endif
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>


            <section class="banner-furniture absolute_banner ratio3_2 section-not" style="display: none;">
                <div class="section-content-discovery">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('assets/frontend/images/discover/search_not_found.png') }}" alt="" width="100%"
                                class="img-fluid lazyload bg-img" style="border-radius: 25px;">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{ asset('assets/backend/libs/jquery/jquery.min.js') }}"></script>
{{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        $('.responsive-slick').slick({
            infinite: false,
            arrow: true,
            slidesToShow: 8,
            slidesToScroll: 8,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 6,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }
            ],
            // nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            // prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        });
        $('.new-product-slider').slick({
            infinite: false,
            arrow: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                }
            ],
            // nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            // prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        });

        $('.product-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });

        $('.project-love-slick').slick({
            infinite: false,
            arrow: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ],
            // nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            // prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        });


    });









    searchTag = (val) => {

        let search = val

        if (search == '') {

            $('.section-cate').show();
            $('.section-pd').show();
            $('.section-not').hide();
            $('.cate-all').show();

        }

        if (search != '') {

            setTimeout(function() {

                $.ajax({
                    url: "{{ route('search.category') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        search: search
                    },
                    dataType: "json",
                    success: function(response) {

                        if (response.category.length > 0) {

                            $('.section-pd').hide();
                            $('.cate-all').hide();
                            $('.section-not').hide();

                            $('.section-cate').show();


                            $.each(response.category, function(index, value) {

                                $('.cate-' + value.ms_product_tag_id).show();

                            })


                        } else {

                            $('.section-not').show();
                            $('.section-cate').hide();
                            $('.section-pd').hide();
                            $('.cate-all').hide();



                        }


                        $('.loading').removeAttr('hidden');

                        setTimeout(function() {


                            $('.loading').attr('hidden', 'hidden');

                        }, 500);



                    }

                })

            }, 1000);

        }

    }

    clearCategory = () => {

        $('.section-pd').show();
        $('.section-cate').show();
        $('.cate-all').show();
        $('.section-not').hide();


    }
</script>
@endsection