@extends('layouts.home')
@section('css')
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
        height: 50px;
        border-radius: 5px;
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
    transition: all 0.3s ease; /* เพิ่ม transition เพื่อให้การแสดงผลนุ่มนวลขึ้น */
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
    transition: all 0.3s ease; /* เพิ่ม transition เพื่อให้การแสดงผลนุ่มนวลขึ้น */
}

/* ปรับปรุงการแสดงผลเมื่อ hover */
.nav-item:hover > .mega-menu,
.nav-item:hover > .sub-menu,
.nav-item:focus-within > .mega-menu,
.nav-item:focus-within > .sub-menu {
    display: block;
}

/* เพิ่มพื้นที่สำหรับการเคลื่อนเมาส์ไปยังเมนูย่อย */
.nav-item {
    position: relative;
}

.nav-item::after {
    content: '';
    position: absolute;
    top: 0;
    right: -20px; /* เพิ่มพื้นที่ทางขวาของเมนูหลัก */
    width: 20px;
    height: 100%;
}

/* ทำให้เมนูย่อยอยู่นานขึ้นเมื่อเมาส์ออกจากเมนูหลัก */
.nav-item:hover > .mega-menu,
.nav-item:hover > .sub-menu {
    display: block;
    animation: fadeIn 0.3s, fadeOut 0.3s 1s forwards;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeOut {
    from { opacity: 1; }
    to { opacity: 0; display: none; }
}


    /* Custom CSS for vertical mega menu on small screens */
    @media (max-width: 767px) {
        .mega-menu {
        position: static;
        display: block;
        width: 100%;
    }

        .nav-item::after {
            display: none; /* ไม่จำเป็นบนหน้าจอขนาดเล็ก */
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
        /* transform: scale(0.8); */
        transition: all 0.4s ease-in-out;
        /* padding: 40px 0; */
    }


    .slick-slide img {
        max-width: 100%;
        transition: all 0.4s ease-in-out;
    }

    .slick-center {
        transform: scale(1.1);
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
        /* background-color: #fff; */
        padding: 5px;
        margin-top: 3px !important;
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

    .border-section {
        border-bottom: none !important;
    }

    .h4 {
        color: black;
    }

    .bg-project-home {
        margin: auto;
        background: url('assets/frontend/images/home/bg-project.jpg');
        background-size: cover;
        height: 481px !important;
        /* max-width: 1680px !important; */
    }

    .bg-exp {
        margin: auto;
        background: url('assets/frontend/images/home/bg-exp.jpg');
        background-size: cover;
        /* height: 816px !important; */
        /* max-width: 1680px !important; */
    }

    .service-block1 {
        max-width: 500px !important;
    }

    p {
        size: 14px !important;
        color: #000 !important;
    }

    .btn-outline-we {
        display: inline-block;
        padding: 13px 29px;
        letter-spacing: 0.05em;
        border: 2px solid #B4B4B4;
        position: relative;
        color: #fff !important;
        background-color: #B4B4B4;
        border-radius: 10px !important;
        top: 65px;
        max-width: 292px;
    }

    .btn-outline-we:hover {
        display: inline-block;
        padding: 13px 29px;
        letter-spacing: 0.05em;
        border: 2px solid #B4B4B4;
        position: relative;
        color: #fff !important;
        background-color: #B4B4B4;
        border-radius: 10px !important;
        top: 65px;
        max-width: 292px;
    }

    .product-box {
        position: relative;
        overflow: hidden;
    }

    .img-wrapper {
        position: relative;
    }

    .details-product {
        position: absolute;
        bottom: 10px;
        left: 10px;
        z-index: 2;
        max-width: 292px;
    }

    .details-product h6 {
        margin: 0;
        padding: 5px 10px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        border-radius: 5px;
        font-size: 14px;
        max-width: 292px;
    }

    .inline-content {
        display: flex;
        align-items: center;
    }

    .inline-content img {
        margin-right: 5px;
    }

    .text-we {
        color: #fff !important;
        font-size: 12px;
    }

    @media (max-width: 767px) {

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

    .absolute-contain {
        background-color: #AFADAB !important;

    }
    .image-container {
    background-color: #f8f9fa;
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    gap: 50px; 
    justify-content: center; 
    align-items: center; 
    min-height: 100px; 
    padding: 10px 0; 
    margin-bottom:20px;
}

.image-wrapper {
    flex: 0 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-wrapper img {
    width: 74px;
    height: 48px;
    object-fit: cover;
}
.sm-vertical li {
    position: relative;
}

.sm-vertical .mega-menu.clothing-menu {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    min-width: 200px;
    z-index: 1000;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin-left: -1px; /* ลดช่องว่างระหว่างเมนูหลักและเมนูย่อย */
}

/* สร้างพื้นที่เชื่อมต่อระหว่างเมนูหลักและเมนูย่อย */
.sm-vertical li > a::after {
    content: '';
    position: absolute;
    top: 0;
    right: -20px;
    width: 20px;
    height: 100%;
}

.sm-vertical li:hover .mega-menu.clothing-menu,
.sm-vertical .mega-menu.clothing-menu:hover {
    display: block;
}
</style>
@endsection
@section('content')
<div class="card" style="border: 0;">
    <div class="card-body">
        <div class="container">
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
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/72/-"><span class="badge p-2">{{ __('validation.top_popular_search_1') }}</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/71/-"><span class="badge p-2">{{ __('validation.top_popular_search_2') }}</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/73/-"><span class="badge p-2">Staff Pick</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/74/-"><span class="badge p-2">Gift Set</span></a>
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

                <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 mt-2">
                    <div class="bg-white rounded-3 shadow border border-1 border-light p-3">
                        <p>{{__('validation.home_category_menu')}}</p>
                        <hr>
                        <!-- <div class="border border-1 border-light"></div>
                        <nav class="nav nav-pills flex-column mt-3">
                            @foreach ($catmanu as $item)
                            <a class="nav-link" href="#">
                                <div class="rounded-3 row align-items-center mega">
                                    <div class="position-relative col-1"><img class="icon-nav" src="{{$item->conf_category_img1}}" alt=""></div>
                                    <p class="text-dark fs-6 fw-normal font-family-Sukhumvit Set col-9 m-0 px-3">
                                        {{$item->conf_category_name_th}}
                                    <div class="position-relative col-1 float-right"><i class="fas fa-chevron-right text-secondary"></i></div>
                                    </p>
                                    <div class="position-relative col-1 text-right"></div>
                                    
                                </div>
                            </a>
                            @endforeach
                    </nav> -->

                    <ul id="sub-menu" class="sm pixelstrap sm-vertical">
                            @foreach ($catmanu as $key => $item)
                            <li>
                                @if (app()->getLocale() == 'th')
                                <a href="#">{{$item->conf_category_name_th}}</a>
                                @else
                                <a href="#">{{$item->conf_category_name_en}}</a>
                                @endif

                                @if(in_array($item->conf_category_id, $arr_cate))
                                <ul class="mega-menu clothing-menu">
                                    <li>
                                        <div class="row m-0">
                                            @foreach ($categorie_sub as $key2 => $sub)
                                            @if($item->conf_category_id == $sub->conf_category_id)
                                            <div class="col-xl-4">
                                                <div class="link-section">
                                                    @if (app()->getLocale() == 'th')
                                                    <a href="/{{app()->getLocale()}}/quickcategorysub/{{$sub->conf_category_id}}/-">
                                                        <p>{{ $sub->conf_categorysub_name_th }}</p>
                                                    </a>
                                                    @else
                                                    <a href="/{{app()->getLocale()}}/quickcategorysub/{{$sub->conf_category_id}}/-">
                                                        <p>{{ $sub->conf_categorysub_name_en }}</p>
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 mt-3 mb-3">

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($slides as $key => $slide)
                            <div class="carousel-item @if ($key == 0) active @endif">
                                <center>
                                    <img src="{{ $slide->conf_homeslide_img }}" class="img-fluid rounded-3" alt="...">
                                </center>
                            </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <div class="section-content-slide">
            <div class="row mt-sm-5 mt-sm-5 mt-sm-5 mt-sm-5">
                <div class="col-md-12">
                    <h4 class="h4">{{__('validation.home_category_slide')}}</h4>
                </div>
                <div class="col-md-12">
                    <div class="responsive-slick">
                        @foreach ($categories as $category)
                        <div>
                            <center>
                                <a href="/{{app()->getLocale()}}/discover/category/{{$category->conf_category_name_en}}">
                                    <img class="img-fluid rounded-3 mb-1" src="{{$category->conf_categorysub_img1}}" alt="Image 1" style="width: 116px;height:104px;" />
                                </a>
                                @if (app()->getLocale() == 'th')
                                <p align="center">{{ Str::limit($category->conf_categorysub_name_th, 50)}}</p>
                                @else
                                <p align="center">{{ Str::limit($category->conf_categorysub_name_en, 50)}}</p>
                                @endif
                            </center>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content-slide" style="margin-top: 40px !important;">
            <div class="row">
                <div class="col-md-10">
                    <p>
                        <span class="h4">{{__('validation.home_product_new')}}</span>
                        <span class="badge" style="background-color: #FFFAEB;">
                            <small style="color : #B54708;font-size:1.3em;">
                                <i class="fa fa-star" style="color : #FFC107;"></i> {{__('validation.home_product_update_new')}}
                            </small>
                        </span>
                    </p>
                </div>
                <div class="col-md-2">
                    <a href="/{{ app()->getLocale() }}/discover">
                        <p class="text-end text-secondary fs-6 fw-semibold Set col-12 m-0 px-3 py-2">{{ __('validation.home_all') }}</p>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="new-product-slider">
                        @foreach ($pdsale1 as $item)
                        <div class="slick-active-hov" width="230.4">
                            <center>
                                <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                    <img src="{{$item->conf_mainproduct_img1}}" height="225" style="border-radius:10px" />
                                </a>
                            </center>
                            <div class="product-details">
                                <span class="product-tag">
                                    @if(!empty($item->saleProductTags))
                                    @foreach ($item->saleProductTags as $tag)
                                    @if (app()->getLocale() == 'th')
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span></a>
                                    @else
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span></a>
                                    @endif
                                    @endforeach
                                    @endif
                                </span>
                                @if (app()->getLocale() == 'th')
                                <p>{{ Str::limit($item->conf_mainproduct_name_th,50)}}</h3>
                                    @else
                                <p>{{ Str::limit($item->conf_mainproduct_name_en,50)}}</p>
                                @endif
                                <p class="product-price">{{$item->price}}</p>
                                <p class="product-min-quantity text-secondary">{{__('validation.home_production_min')}} {{number_format($item->timeline_qty,0)}} {{__('validation.unit_piece')}}</p>
                                <p class="product-estimate-date text-secondary">{{__('validation.home_delivery_in')}} {{number_format($item->timeline_day,0)}} {{__('validation.unit_day')}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <section class="py-5 mb-5" style="background-color:#00C2C7;color:#fff">
                <div class="row text-center text-md-start text-lg-start">
                    <div class="col-6  d-flex justify-content-center align-items-center p-4 p-md-3 p-lg-3" style="display: flex;
                    width: 112px;
                    align-items: flex-start;
                    align-content: flex-start;
                    gap: 16px;
                    flex-wrap: wrap;">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                        <img src="{{asset('assets/frontend/images/staffpick/Ellipse 46.svg')}}" width="30px">
                    </div>
                    <div class="col-6 d-flex justify-content-center align-items-center">

                        <div class="p-1" style="text-align: left;">
                            <h4 class="ms-3 text-white"><i class="fa fa-star"></i> Staffpick</h4>
                            <nav class="nav nav-pills flex-column mt-3">
                                @foreach ($pick_tag as $key => $item)
                                <a class="nav-link" href="javascript:void(0)" onclick="playList('{{$key}}','{{$item->ms_product_tag_name}}','{{$item->ms_product_tag_nameen}}')">
                                    <div class="rounded-3 row align-items-center">
                                        <p class="text-white fs-6 fw-normal font-family-Sukhumvit Set col-9 m-0 px-3">
                                            @if (app()->getLocale() == 'th')
                                            {{$item->ms_product_tag_name}}
                                            @else
                                            {{$item->ms_product_tag_nameen}}
                                            @endif
                                        <div class="position-relative col-1 float-right arrow-staff-{{ $key }} arrow-ck"></div>
                                        </p>
                                        <div class="position-relative col-1 text-right"></div>
                                    </div>
                                </a>
                                @endforeach
                            </nav>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="mb-5 mt-5">
                            <div class="carousel playlist">
                                <div style="margin: 5px;">
                                    <img src="{{asset($pick1->conf_homestaffpick_img) }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                    <img src="{{asset($pick2->conf_homestaffpick_img) }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                    <img src="{{asset($pick3->conf_homestaffpick_img) }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                </div>
                                <div style="margin: 5px;">
                                    <img src="{{ $pick4->conf_homestaffpick_img }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                    <img src="{{ $pick5->conf_homestaffpick_img }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                    <img src="{{ $pick6->conf_homestaffpick_img }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                </div>
                                <div style="margin: 5px;">
                                    <img src="{{ $pick7->conf_homestaffpick_img }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                    <img src="{{ $pick8->conf_homestaffpick_img }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                    <img src="{{ $pick9->conf_homestaffpick_img }}" alt="" class="img-fluid" style="border-radius: 10px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>




        <div class="section-content-slide">
            <div class="row">
                <div class="col-md-10">
                    <p onclick="window.location.href='/{{ app()->getLocale() }}/discover'">
                        <span class="h4">{{__('validation.home_welcome_employee')}}</span>
                    </p>
                </div>
                <div class="col-md-2">
                    <a href="/{{ app()->getLocale() }}/discover">
                        <p class="text-end text-secondary fs-6 fw-semibold Set col-12 m-0 px-3 py-2">{{ __('validation.home_all') }}</p>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="new-product-slider">
                        @foreach ($pdsale2 as $item)
                        <div class="slick-active-hov" width="230.4">
                            <center>
                                <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                    <img src="{{$item->conf_mainproduct_img1}}" height="225" style="border-radius:10px" />
                                </a>
                            </center>
                            <div class="product-details">
                                <span class="product-tag">
                                    @if(!empty($item->saleProductTags))
                                    @foreach ($item->saleProductTags as $tag)
                                    @if (app()->getLocale() == 'th')
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span></a>
                                    @else
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span></a>
                                    @endif
                                    @endforeach
                                    @endif
                                </span>
                                <p>
                                    @if (app()->getLocale() == 'th')
                                    {{ Str::limit($item->conf_mainproduct_name_th,50)}}
                                    @else
                                    {{ Str::limit($item->conf_mainproduct_name_en,50)}}
                                    @endif
                                </p>
                                <p class="product-price">{{$item->price}}</p>
                                <p class="product-min-quantity text-secondary">{{__('validation.home_production_min')}} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</p>
                                <p class="product-estimate-date text-secondary">{{__('validation.home_delivery_in')}} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-10">
                    <p onclick="window.location.href='/{{ app()->getLocale() }}/discover'">
                        <span class="h4">{{__('validation.home_echo_friendly_product')}}</span>
                    </p>
                </div>
                <div class="col-md-2">
                    <a href="/{{ app()->getLocale() }}/discover">
                        <p class="text-end text-secondary fs-6 fw-semibold Set col-12 m-0 px-3 py-2">{{ __('validation.home_all') }}</p>
                    </a>
                </div>
                <div class="col-md-12">
                    <div class="new-product-slider">
                        @foreach ($pdsale3 as $item)
                        <div class="slick-active-hov" width="230.4">
                            <center>
                                <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                    <img src="{{$item->conf_mainproduct_img1}}" height="225" style="border-radius:10px" />
                                </a>
                            </center>
                            <div class="product-details">
                                <span class="product-tag">
                                    @if(!empty($item->saleProductTags))
                                    @foreach ($item->saleProductTags as $tag)
                                    @if (app()->getLocale() == 'th')
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span></a>
                                    @else
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span></a>
                                    @endif
                                    @endforeach
                                    @endif
                                </span>
                                <p>
                                    @if (app()->getLocale() == 'th')
                                    {{ Str::limit($item->conf_mainproduct_name_th,50)}}
                                    @else
                                    {{ Str::limit($item->conf_mainproduct_name_en,50)}}
                                    @endif
                                </p>
                                <p class="product-price">{{$item->price}}</p>
                                <p class="product-min-quantity text-secondary">{{__('validation.home_production_min')}} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</p>
                                <p class="product-estimate-date text-secondary">{{__('validation.home_delivery_in')}} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-project-home container">
            <div class="row">
                <div class="mt-5 mb-3" align="center">
                    <span class="h4">{{__('validation.home_project_we_love')}}</span>
                </div>
                <div class="col-md-12" width="332">
                    <div class="new-product-slider" style="text-align:-webkit-center">
                        @foreach ($pjlist as $item)

                        <div class="product-box product-wrap">
                            <div class="img-wrapper">
                                <div class="front">
                                    <img alt="" src="{{$item->conf_projectlist_img1}}" width="292" height="332" style="border-radius:10px">
                                </div>

                            </div>
                            <div class="product-info">
                                @if(app()->getLocale() == 'th' && $item->ms_productsub_name_th != 'ไม่มีข้อมูล')
                                <div class="add-btn">
                                    <a href="javascript:void(0)" class="btn btn-outline-we">
                                        @if($item->ms_productsub_img1 != 'ไม่มีข้อมูล' && $item->ms_productsub_img1 != null)
                                        <span class="inline-content" onclick="window.location.href='/{{ app()->getLocale() }}/product/{{$item->ms_pd}}/-'">
                                            <img src="https://erp.giftwise.co.th/{{$item->ms_productsub_img1}}" width="50" style="border-radius:10px">
                                            <p class="text-we">{{$item->ms_productsub_name_th}}</p>
                                        </span>
                                        @else
                                        <p class="text-we">{{$item->ms_productsub_name_th}}</p>
                                        @endif
                                    </a>
                                </div>
                                @elseif(app()->getLocale() == 'en' && $item->ms_productsub_name_en != 'ไม่มีข้อมูล')
                                <div class="add-btn">
                                    <a href="javascript:void(0)" class="btn btn-outline-we">
                                        @if($item->ms_productsub_img1 != 'ไม่มีข้อมูล' && $item->ms_productsub_img1 != null)
                                        <span class="inline-content" onclick="window.location.href='/{{ app()->getLocale() }}/product/{{$item->ms_pd}}/-'">
                                            <img src="https://erp.giftwise.co.th/{{$item->ms_productsub_img1}}" width="50" style="border-radius:10px">
                                            <p class="text-we">{{$item->ms_productsub_name_en}}</p>
                                        </span>
                                        @else
                                        <p class="text-we">{{$item->ms_productsub_name_en}}</p>
                                        @endif
                                    </a>
                                </div>
                                @endif

                                @if (app()->getLocale() == 'th' && !empty($item->conf_projectlist_remark_th))
                                <div class="details-product">
                                    <h6>{{$item->conf_projectlist_remark_th}}</h6>
                                </div>
                                @elseif(app()->getLocale() == 'en' && !empty($item->conf_projectlist_remark_en))
                                <div class="details-product">
                                    <h6>{{$item->conf_projectlist_remark_en}}</h6>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="section-content-slide">
            <div class="row mt-5">
                <div class="col-md-10">
                    <p>
                        <span class="h4">{{__('validation.home_rush_product')}}</span>
                    </p>
                </div>
                <div class="col-md-2">
                    <a href="/{{ app()->getLocale() }}/discover">
                        <p class="text-end text-secondary fs-6 fw-semibold Set col-12 m-0 px-3 py-2">{{ __('validation.home_all') }}</p>
                    </a>
                </div>
                <div class="col-md-12 mb-3">
                    <div class="new-product-slider mb-3">
                        @foreach ($pdsale4 as $item)
                        <div class="slick-active-hov" width="230.4">
                            <center>
                                <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                    <img src="{{$item->conf_mainproduct_img1}}" height="225" style="border-radius:10px" />
                                </a>
                            </center>
                            <div class="product-details">
                                <span class="product-tag">
                                    @if(!empty($item->saleProductTags))
                                    @foreach ($item->saleProductTags as $tag)
                                    @if (app()->getLocale() == 'th')
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_th }}</span></a>
                                    @else
                                    <a href="/{{ app()->getLocale() }}/product-quick-tag/{{ $tag->conf_mainproduct_tag_id }}/-"><span class="badge">{{ $tag->conf_mainproduct_tag_name_en }}</span></a>
                                    @endif
                                    @endforeach
                                    @endif
                                </span>
                                <p>
                                    @if (app()->getLocale() == 'th')
                                    {{Str::limit($item->conf_mainproduct_name_th,50)}}
                                    @else
                                    {{Str::limit($item->conf_mainproduct_name_en,50)}}
                                    @endif
                                </p>
                                <p class="product-price">{{$item->price}}</p>
                                <p class="product-min-quantity text-secondary">{{__('validation.home_production_min')}} {{number_format($item->timeline_qty,0)}} {{ __('validation.unit_piece') }}</p>
                                <p class="product-estimate-date text-secondary">{{__('validation.home_delivery_in')}} {{number_format($item->timeline_day,0)}} {{ __('validation.unit_day') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <section class="service section-b-space border-section border-top-0 mb-5 bg-exp">
            <div class="row partition4" style="justify-content: center;">
                <div class="col-md-12 text-center">
                    <p>
                        <span class="badge">Our Expertise</span>
                    </p>
                    <br>
                    <p>
                        <span class="h4">Total Premiums & Promotion Solution</span>
                    </p>
                    <br>

                </div>
                <div class="col-lg-4 service-block1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.5 12V22H4.5V12M12.5 22V7M12.5 7H8C7.33696 7 6.70107 6.73661 6.23223 6.26777C5.76339 5.79893 5.5 5.16304 5.5 4.5C5.5 3.83696 5.76339 3.20107 6.23223 2.73223C6.70107 2.26339 7.33696 2 8 2C11.5 2 12.5 7 12.5 7ZM12.5 7H17C17.663 7 18.2989 6.73661 18.7678 6.26777C19.2366 5.79893 19.5 5.16304 19.5 4.5C19.5 3.83696 19.2366 3.20107 18.7678 2.73223C18.2989 2.26339 17.663 2 17 2C13.5 2 12.5 7 12.5 7ZM2.5 7H22.5V12H2.5V7Z" stroke="#00C2C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h4>{{__('validation.home_product_premium')}}</h4>
                    <p style="color:darkgray">{{__('validation.home_product_premium_description')}}</p>
                </div>
                <div class="col-lg-4 service-block1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_292_6927)">
                            <mask id="path-1-inside-1_292_6927" fill="white">
                                <path d="M23.6185 0.871791C23.306 0.55998 22.9282 0.321381 22.5123 0.173187C22.0964 0.0249938 21.6528 -0.0291044 21.2135 0.014791C18.4205 0.284791 9.02752 1.44779 5.39952 5.07179C3.66529 6.81075 2.63692 9.13062 2.513 11.5834C2.38907 14.0362 3.17839 16.4479 4.72852 18.3528L0.788524 22.2928C0.606366 22.4814 0.505572 22.734 0.50785 22.9962C0.510129 23.2584 0.615298 23.5092 0.800706 23.6946C0.986114 23.88 1.23693 23.9852 1.49912 23.9875C1.76132 23.9897 2.01392 23.8889 2.20252 23.7068L6.14252 19.7668C8.04703 21.319 10.4594 22.11 12.9132 21.9868C15.3671 21.8636 17.6881 20.8349 19.4275 19.0998C23.1035 15.4228 24.2275 6.05879 24.4865 3.27679C24.5289 2.83666 24.473 2.39262 24.3229 1.97672C24.1728 1.56082 23.9322 1.18343 23.6185 0.871791ZM18.0185 17.6818C16.655 19.0403 14.8437 19.8561 12.9228 19.977C11.0019 20.0979 9.10258 19.5156 7.57952 18.3388L17.2115 8.70679C17.3937 8.51819 17.4945 8.26559 17.4922 8.00339C17.4899 7.74119 17.3848 7.49038 17.1993 7.30497C17.0139 7.11956 16.7631 7.0144 16.5009 7.01212C16.2387 7.00984 15.9861 7.11063 15.7975 7.29279L6.16052 16.9248C4.9835 15.4018 4.40105 13.5025 4.52196 11.5815C4.64286 9.66049 5.45884 7.84918 6.81752 6.48579C9.32652 3.97779 16.2445 2.49979 21.4065 2.00479C21.5527 1.99056 21.7003 2.00872 21.8387 2.05797C21.977 2.10722 22.1029 2.18635 22.2072 2.28974C22.3116 2.39313 22.3919 2.51824 22.4424 2.65617C22.4929 2.7941 22.5124 2.94147 22.4995 3.08779C21.9995 8.47479 20.5585 15.1368 18.0135 17.6818H18.0185Z" />
                            </mask>
                            <path d="M23.6185 0.871791C23.306 0.55998 22.9282 0.321381 22.5123 0.173187C22.0964 0.0249938 21.6528 -0.0291044 21.2135 0.014791C18.4205 0.284791 9.02752 1.44779 5.39952 5.07179C3.66529 6.81075 2.63692 9.13062 2.513 11.5834C2.38907 14.0362 3.17839 16.4479 4.72852 18.3528L0.788524 22.2928C0.606366 22.4814 0.505572 22.734 0.50785 22.9962C0.510129 23.2584 0.615298 23.5092 0.800706 23.6946C0.986114 23.88 1.23693 23.9852 1.49912 23.9875C1.76132 23.9897 2.01392 23.8889 2.20252 23.7068L6.14252 19.7668C8.04703 21.319 10.4594 22.11 12.9132 21.9868C15.3671 21.8636 17.6881 20.8349 19.4275 19.0998C23.1035 15.4228 24.2275 6.05879 24.4865 3.27679C24.5289 2.83666 24.473 2.39262 24.3229 1.97672C24.1728 1.56082 23.9322 1.18343 23.6185 0.871791ZM18.0185 17.6818C16.655 19.0403 14.8437 19.8561 12.9228 19.977C11.0019 20.0979 9.10258 19.5156 7.57952 18.3388L17.2115 8.70679C17.3937 8.51819 17.4945 8.26559 17.4922 8.00339C17.4899 7.74119 17.3848 7.49038 17.1993 7.30497C17.0139 7.11956 16.7631 7.0144 16.5009 7.01212C16.2387 7.00984 15.9861 7.11063 15.7975 7.29279L6.16052 16.9248C4.9835 15.4018 4.40105 13.5025 4.52196 11.5815C4.64286 9.66049 5.45884 7.84918 6.81752 6.48579C9.32652 3.97779 16.2445 2.49979 21.4065 2.00479C21.5527 1.99056 21.7003 2.00872 21.8387 2.05797C21.977 2.10722 22.1029 2.18635 22.2072 2.28974C22.3116 2.39313 22.3919 2.51824 22.4424 2.65617C22.4929 2.7941 22.5124 2.94147 22.4995 3.08779C21.9995 8.47479 20.5585 15.1368 18.0135 17.6818H18.0185Z" fill="#101828" />
                            <path d="M23.6185 0.871791L8.55144 15.9746L8.56697 15.9901L8.58254 16.0055L23.6185 0.871791ZM21.2135 0.014791L23.2663 21.2491L23.3004 21.2458L23.3346 21.2424L21.2135 0.014791ZM5.39952 5.07179L-9.6771 -10.0215L-9.69152 -10.0071L-9.70592 -9.99263L5.39952 5.07179ZM4.72852 18.3528L19.8135 33.4377L33.4288 19.8224L21.2754 4.88755L4.72852 18.3528ZM0.788524 22.2928L-14.2964 7.20784L-14.4275 7.33893L-14.5563 7.47227L0.788524 22.2928ZM2.20252 23.7068L17.023 39.0516L17.1564 38.9228L17.2875 38.7917L2.20252 23.7068ZM6.14252 19.7668L19.6202 3.23009L4.68325 -8.94383L-8.94242 4.68185L6.14252 19.7668ZM19.4275 19.0998L34.4938 34.2034L34.5042 34.193L34.5145 34.1827L19.4275 19.0998ZM24.4865 3.27679L3.25123 1.23388L3.24809 1.26656L3.24505 1.29924L24.4865 3.27679ZM18.0185 17.6818L33.0757 32.7944L69.6559 -3.65154H18.0185V17.6818ZM7.57952 18.3388L-7.50542 3.25384L-24.6484 20.3969L-5.46406 35.22L7.57952 18.3388ZM17.2115 8.70679L32.2965 23.7917L32.4276 23.6607L32.5563 23.5273L17.2115 8.70679ZM15.7975 7.29279L0.977006 -8.05202L0.845655 -7.92516L0.716496 -7.79607L15.7975 7.29279ZM6.16052 16.9248L-10.7193 29.9702L4.10049 49.1458L21.2416 32.0136L6.16052 16.9248ZM6.81752 6.48579L-8.26441 -8.60216L-8.27895 -8.58763L-8.29346 -8.57307L6.81752 6.48579ZM21.4065 2.00479L23.4429 23.2407L23.4578 23.2393L23.4727 23.2378L21.4065 2.00479ZM22.4995 3.08779L43.7416 5.05939L43.7462 5.00908L43.7507 4.95875L22.4995 3.08779ZM18.0135 17.6818L2.92858 2.59684L-33.4897 39.0151H18.0135V17.6818ZM38.6856 -14.231C36.1393 -16.7713 33.0612 -18.7151 29.6732 -19.9224L15.3514 20.2688C12.7951 19.3579 10.4726 17.8912 8.55144 15.9746L38.6856 -14.231ZM29.6732 -19.9224C26.2851 -21.1297 22.6714 -21.5704 19.0925 -21.2128L23.3346 21.2424C20.6343 21.5122 17.9077 21.1797 15.3514 20.2688L29.6732 -19.9224ZM19.1608 -21.2196C17.2805 -21.0378 13.0857 -20.5559 8.5088 -19.4265C5.10774 -18.5873 -3.3553 -16.3363 -9.6771 -10.0215L20.4761 20.1651C19.5338 21.1063 18.7155 21.6652 18.2746 21.9395C17.8194 22.2227 17.5329 22.3469 17.5054 22.3588C17.4972 22.3624 17.876 22.2085 18.7305 21.9976C19.5288 21.8006 20.4245 21.6313 21.3029 21.4969C22.1649 21.3649 22.8744 21.287 23.2663 21.2491L19.1608 -21.2196ZM-9.70592 -9.99263C-15.1656 -4.51813 -18.403 2.78519 -18.7932 10.5069L23.8192 12.6599C23.6769 15.476 22.4961 18.1396 20.505 20.1362L-9.70592 -9.99263ZM-18.7932 10.5069C-19.1833 18.2287 -16.6984 25.8211 -11.8183 31.818L21.2754 4.88755C23.0552 7.07467 23.9614 9.84368 23.8192 12.6599L-18.7932 10.5069ZM-10.3564 3.26784L-14.2964 7.20784L15.8735 37.3777L19.8135 33.4377L-10.3564 3.26784ZM-14.5563 7.47227C-18.6245 11.6844 -20.8756 17.3258 -20.8247 23.1816L21.8404 22.8108C21.8867 28.1421 19.8372 33.2784 16.1333 37.1133L-14.5563 7.47227ZM-20.8247 23.1816C-20.7738 29.0373 -18.425 34.6388 -14.2842 38.7796L15.8857 8.60966C19.6556 12.3796 21.7941 17.4795 21.8404 22.8108L-20.8247 23.1816ZM-14.2842 38.7796C-10.1435 42.9203 -4.54202 45.2691 1.31375 45.32L1.6845 2.65494C7.01587 2.70126 12.1157 4.83973 15.8857 8.60966L-14.2842 38.7796ZM1.31375 45.32C7.16948 45.3709 12.8109 43.1198 17.023 39.0516L-12.618 8.36198C-8.78308 4.65809 -3.64684 2.60861 1.6845 2.65494L1.31375 45.32ZM17.2875 38.7917L21.2275 34.8517L-8.94242 4.68185L-12.8824 8.62185L17.2875 38.7917ZM-7.33519 36.3035C-1.33869 41.1907 6.25686 43.6812 13.983 43.2933L11.8435 0.680262C14.6619 0.538757 17.4327 1.44725 19.6202 3.23009L-7.33519 36.3035ZM13.983 43.2933C21.7091 42.9054 29.017 39.6667 34.4938 34.2034L4.36124 3.9962C6.35917 2.00322 9.02506 0.821768 11.8435 0.680262L13.983 43.2933ZM34.5145 34.1827C40.8487 27.8468 43.1057 19.4049 43.9566 15.9386C45.0863 11.3367 45.5534 7.13023 45.728 5.25434L3.24505 1.29924C3.2088 1.68854 3.13453 2.38815 3.00701 3.23719C2.87695 4.10317 2.71242 4.98363 2.5202 5.76668C2.31444 6.60487 2.16467 6.96943 2.17299 6.95031C2.18744 6.91713 2.31253 6.63049 2.59485 6.1784C2.86936 5.73881 3.41974 4.93794 4.34053 4.0169L34.5145 34.1827ZM45.7218 5.3197C46.0666 1.73615 45.6114 -1.87924 44.3893 -5.26554L4.25645 9.21899C3.3345 6.66449 2.99117 3.93718 3.25123 1.23388L45.7218 5.3197ZM44.3893 -5.26554C43.1671 -8.65184 41.2084 -11.7246 38.6545 -14.262L8.58254 16.0055C6.65599 14.0914 5.17841 11.7735 4.25645 9.21899L44.3893 -5.26554ZM2.96133 2.56914C5.26823 0.270709 8.33275 -1.10963 11.5828 -1.31418L14.2628 41.2682C21.3547 40.8219 28.0418 37.8099 33.0757 32.7944L2.96133 2.56914ZM11.5828 -1.31418C14.8328 -1.51873 18.0462 -0.533508 20.6231 1.45756L-5.46406 35.22C0.158928 39.5647 7.1709 41.7146 14.2628 41.2682L11.5828 -1.31418ZM22.6645 33.4237L32.2965 23.7917L2.12658 -6.37815L-7.50542 3.25384L22.6645 33.4237ZM32.5563 23.5273C36.6245 19.3152 38.8756 13.6738 38.8247 7.81802L-3.84033 8.18876C-3.88666 2.85742 -1.83716 -2.27882 1.86671 -6.11373L32.5563 23.5273ZM38.8247 7.81802C38.7738 1.96225 36.425 -3.63922 32.2843 -7.77997L2.1144 22.3899C-1.65554 18.62 -3.794 13.5201 -3.84033 8.18876L38.8247 7.81802ZM32.2843 -7.77997C28.1435 -11.9207 22.5421 -14.2695 16.6863 -14.3204L16.3156 28.3446C10.9842 28.2983 5.88434 26.1599 2.1144 22.3899L32.2843 -7.77997ZM16.6863 -14.3204C10.8306 -14.3713 5.18911 -12.1202 0.977006 -8.05202L30.618 22.6376C26.7831 26.3415 21.6469 28.391 16.3156 28.3446L16.6863 -14.3204ZM0.716496 -7.79607L-8.9205 1.83593L21.2416 32.0136L30.8786 22.3817L0.716496 -7.79607ZM23.0403 3.87933C25.0321 6.45657 26.0178 9.6707 25.8132 12.9215L-16.7693 10.2415C-17.2157 17.3343 -15.0651 24.3471 -10.7193 29.9702L23.0403 3.87933ZM25.8132 12.9215C25.6086 16.1723 24.2277 19.2375 21.9285 21.5447L-8.29346 -8.57307C-13.31 -3.53912 -16.3229 3.1487 -16.7693 10.2415L25.8132 12.9215ZM21.8995 21.5737C20.8864 22.5864 19.988 23.2192 19.4589 23.558C18.9113 23.9088 18.516 24.0994 18.3633 24.1699C18.199 24.2456 18.1542 24.2561 18.2589 24.2192C18.3578 24.1844 18.5404 24.1249 18.8134 24.0492C19.3747 23.8937 20.1136 23.7266 20.9791 23.5752C21.8346 23.4255 22.6872 23.3132 23.4429 23.2407L19.3701 -19.2311C15.8435 -18.8929 11.5599 -18.2152 7.42087 -17.0684C4.38387 -16.2269 -2.78015 -14.0842 -8.26441 -8.60216L21.8995 21.5737ZM23.4727 23.2378C20.5 23.5271 17.5 23.1579 14.6861 22.1565L28.9912 -18.0406C25.9005 -19.1405 22.6054 -19.546 19.3403 -19.2282L23.4727 23.2378ZM14.6861 22.1565C11.8721 21.1551 9.31338 19.5461 7.19177 17.4438L37.2227 -12.8644C34.8924 -15.1734 32.082 -16.9407 28.9912 -18.0406L14.6861 22.1565ZM7.19177 17.4438C5.07015 15.3416 3.43765 12.7978 2.41041 9.99316L42.4743 -4.68082C41.3461 -7.76133 39.553 -10.5554 37.2227 -12.8644L7.19177 17.4438ZM2.41041 9.99316C1.38318 7.18853 0.98645 4.19207 1.24839 1.21683L43.7507 4.95875C44.0384 1.69086 43.6026 -1.60033 42.4743 -4.68082L2.41041 9.99316ZM1.25749 1.11619C1.18082 1.94226 1.06763 2.81586 0.922443 3.65787C0.775254 4.5115 0.616179 5.21061 0.473984 5.72056C0.31889 6.27678 0.26139 6.32888 0.407049 6.01865C0.488993 5.84412 0.68613 5.44635 1.03681 4.90757C1.3792 4.38152 1.98474 3.54068 2.92858 2.59684L33.0985 32.7667C38.5115 27.3537 40.6744 20.4027 41.5728 17.1805C42.7391 12.998 43.4059 8.67622 43.7416 5.05939L1.25749 1.11619ZM18.0135 39.0151H18.0185V-3.65154H18.0135V39.0151Z" fill="#00C2C7" mask="url(#path-1-inside-1_292_6927)" />
                        </g>
                        <defs>
                            <clipPath id="clip0_292_6927">
                                <rect width="24" height="24" fill="white" transform="translate(0.5)" />
                            </clipPath>
                        </defs>
                    </svg>

                    <h4>{{__('validation.home_product_environment')}}</h4>
                    <p style="color:darkgray">{{__('validation.home_product_environment_description')}}</p>
                </div>
                <div class="col-lg-4 service-block1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.5 14C8.5 14 10 16 12.5 16C15 16 16.5 14 16.5 14M9.5 9H9.51M15.5 9H15.51M22.5 12C22.5 17.5228 18.0228 22 12.5 22C6.97715 22 2.5 17.5228 2.5 12C2.5 6.47715 6.97715 2 12.5 2C18.0228 2 22.5 6.47715 22.5 12Z" stroke="#00C2C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h4>{{__('validation.home_product_team')}}</h4>
                    <p style="color:darkgray">{{__('validation.home_product_team_description')}}</p>
                </div>
                <div class="col-lg-4 service-block1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.3382 4.61183C20.8274 4.10083 20.221 3.69547 19.5535 3.41891C18.8861 3.14235 18.1707 3 17.4482 3C16.7257 3 16.0103 3.14235 15.3428 3.41891C14.6754 3.69547 14.0689 4.10083 13.5582 4.61183L12.4982 5.67183L11.4382 4.61183C10.4065 3.58013 9.0072 3.00053 7.54817 3.00053C6.08913 3.00053 4.68986 3.58013 3.65817 4.61183C2.62647 5.64352 2.04688 7.04279 2.04688 8.50183C2.04687 9.96086 2.62647 11.3601 3.65817 12.3918L4.71817 13.4518L12.4982 21.2318L20.2782 13.4518L21.3382 12.3918C21.8492 11.8811 22.2545 11.2746 22.5311 10.6072C22.8076 9.93972 22.95 9.22431 22.95 8.50183C22.95 7.77934 22.8076 7.06393 22.5311 6.39647C22.2545 5.72901 21.8492 5.12258 21.3382 4.61183V4.61183Z" stroke="#00C2C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h4>{{__('validation.home_product_service')}}</h4>
                    <p style="color:darkgray">{{__('validation.home_product_service_description')}}</p>
                </div>
                <div class="col-lg-4 service-block1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.71 13.89L7.5 23L12.5 20L17.5 23L16.29 13.88M19.5 8C19.5 11.866 16.366 15 12.5 15C8.63401 15 5.5 11.866 5.5 8C5.5 4.13401 8.63401 1 12.5 1C16.366 1 19.5 4.13401 19.5 8Z" stroke="#00C2C7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <h4>{{__('validation.home_product_professional')}}</h4>
                    <p style="color:darkgray">{{__('validation.home_product_professional_description')}}</p>
                </div>
                <div class="col-lg-4 service-block1">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="path-1-inside-1_292_11070" fill="white">
                            <path d="M19.0156 11.3789H15.4531C14.1608 11.3789 13.1094 10.3275 13.1094 9.03516V5.47266C13.1094 4.18031 14.1608 3.12891 15.4531 3.12891H19.0156C20.308 3.12891 21.3594 4.18031 21.3594 5.47266V9.03516C21.3594 10.3275 20.308 11.3789 19.0156 11.3789ZM15.4531 4.06641C14.6778 4.06641 14.0469 4.69734 14.0469 5.47266V9.03516C14.0469 9.81047 14.6778 10.4414 15.4531 10.4414H19.0156C19.7909 10.4414 20.4219 9.81047 20.4219 9.03516V5.47266C20.4219 4.69734 19.7909 4.06641 19.0156 4.06641H15.4531Z" />
                            <path d="M19.0156 20.8711H15.4531C14.1608 20.8711 13.1094 19.8197 13.1094 18.5273V14.9648C13.1094 13.6725 14.1608 12.6211 15.4531 12.6211H19.0156C20.308 12.6211 21.3594 13.6725 21.3594 14.9648V18.5273C21.3594 19.8197 20.308 20.8711 19.0156 20.8711ZM15.4531 13.5586C14.6778 13.5586 14.0469 14.1895 14.0469 14.9648V18.5273C14.0469 19.3027 14.6778 19.9336 15.4531 19.9336H19.0156C19.7909 19.9336 20.4219 19.3027 20.4219 18.5273V14.9648C20.4219 14.1895 19.7909 13.5586 19.0156 13.5586H15.4531Z" />
                            <path d="M9.54688 20.8711H5.98438C4.69203 20.8711 3.64062 19.8197 3.64062 18.5273V14.9648C3.64062 13.6725 4.69203 12.6211 5.98438 12.6211H9.54688C10.8392 12.6211 11.8906 13.6725 11.8906 14.9648V18.5273C11.8906 19.8197 10.8392 20.8711 9.54688 20.8711ZM5.98438 13.5586C5.20906 13.5586 4.57812 14.1895 4.57812 14.9648V18.5273C4.57812 19.3027 5.20906 19.9336 5.98438 19.9336H9.54688C10.3222 19.9336 10.9531 19.3027 10.9531 18.5273V14.9648C10.9531 14.1895 10.3222 13.5586 9.54688 13.5586H5.98438Z" />
                            <path d="M7.76562 11.3789C5.49125 11.3789 3.64062 9.52828 3.64062 7.25391C3.64062 4.97953 5.49125 3.12891 7.76562 3.12891C10.04 3.12891 11.8906 4.97953 11.8906 7.25391C11.8906 9.52828 10.04 11.3789 7.76562 11.3789ZM7.76562 4.06641C6.00781 4.06641 4.57812 5.49609 4.57812 7.25391C4.57812 9.01172 6.00781 10.4414 7.76562 10.4414C9.52344 10.4414 10.9531 9.01172 10.9531 7.25391C10.9531 5.49609 9.52344 4.06641 7.76562 4.06641Z" />
                        </mask>
                        <path d="M19.0156 11.3789H15.4531C14.1608 11.3789 13.1094 10.3275 13.1094 9.03516V5.47266C13.1094 4.18031 14.1608 3.12891 15.4531 3.12891H19.0156C20.308 3.12891 21.3594 4.18031 21.3594 5.47266V9.03516C21.3594 10.3275 20.308 11.3789 19.0156 11.3789ZM15.4531 4.06641C14.6778 4.06641 14.0469 4.69734 14.0469 5.47266V9.03516C14.0469 9.81047 14.6778 10.4414 15.4531 10.4414H19.0156C19.7909 10.4414 20.4219 9.81047 20.4219 9.03516V5.47266C20.4219 4.69734 19.7909 4.06641 19.0156 4.06641H15.4531Z" fill="#101828" />
                        <path d="M19.0156 20.8711H15.4531C14.1608 20.8711 13.1094 19.8197 13.1094 18.5273V14.9648C13.1094 13.6725 14.1608 12.6211 15.4531 12.6211H19.0156C20.308 12.6211 21.3594 13.6725 21.3594 14.9648V18.5273C21.3594 19.8197 20.308 20.8711 19.0156 20.8711ZM15.4531 13.5586C14.6778 13.5586 14.0469 14.1895 14.0469 14.9648V18.5273C14.0469 19.3027 14.6778 19.9336 15.4531 19.9336H19.0156C19.7909 19.9336 20.4219 19.3027 20.4219 18.5273V14.9648C20.4219 14.1895 19.7909 13.5586 19.0156 13.5586H15.4531Z" fill="#101828" />
                        <path d="M9.54688 20.8711H5.98438C4.69203 20.8711 3.64062 19.8197 3.64062 18.5273V14.9648C3.64062 13.6725 4.69203 12.6211 5.98438 12.6211H9.54688C10.8392 12.6211 11.8906 13.6725 11.8906 14.9648V18.5273C11.8906 19.8197 10.8392 20.8711 9.54688 20.8711ZM5.98438 13.5586C5.20906 13.5586 4.57812 14.1895 4.57812 14.9648V18.5273C4.57812 19.3027 5.20906 19.9336 5.98438 19.9336H9.54688C10.3222 19.9336 10.9531 19.3027 10.9531 18.5273V14.9648C10.9531 14.1895 10.3222 13.5586 9.54688 13.5586H5.98438Z" fill="#101828" />
                        <path d="M7.76562 11.3789C5.49125 11.3789 3.64062 9.52828 3.64062 7.25391C3.64062 4.97953 5.49125 3.12891 7.76562 3.12891C10.04 3.12891 11.8906 4.97953 11.8906 7.25391C11.8906 9.52828 10.04 11.3789 7.76562 11.3789ZM7.76562 4.06641C6.00781 4.06641 4.57812 5.49609 4.57812 7.25391C4.57812 9.01172 6.00781 10.4414 7.76562 10.4414C9.52344 10.4414 10.9531 9.01172 10.9531 7.25391C10.9531 5.49609 9.52344 4.06641 7.76562 4.06641Z" fill="#101828" />
                        <path d="M19.0156 10.3789H15.4531V12.3789H19.0156V10.3789ZM15.4531 10.3789C14.7131 10.3789 14.1094 9.77522 14.1094 9.03516H12.1094C12.1094 10.8798 13.6085 12.3789 15.4531 12.3789V10.3789ZM14.1094 9.03516V5.47266H12.1094V9.03516H14.1094ZM14.1094 5.47266C14.1094 4.7326 14.7131 4.12891 15.4531 4.12891V2.12891C13.6085 2.12891 12.1094 3.62803 12.1094 5.47266H14.1094ZM15.4531 4.12891H19.0156V2.12891H15.4531V4.12891ZM19.0156 4.12891C19.7557 4.12891 20.3594 4.7326 20.3594 5.47266H22.3594C22.3594 3.62803 20.8603 2.12891 19.0156 2.12891V4.12891ZM20.3594 5.47266V9.03516H22.3594V5.47266H20.3594ZM20.3594 9.03516C20.3594 9.77522 19.7557 10.3789 19.0156 10.3789V12.3789C20.8603 12.3789 22.3594 10.8798 22.3594 9.03516H20.3594ZM15.4531 3.06641C14.1255 3.06641 13.0469 4.14506 13.0469 5.47266H15.0469C15.0469 5.24963 15.2301 5.06641 15.4531 5.06641V3.06641ZM13.0469 5.47266V9.03516H15.0469V5.47266H13.0469ZM13.0469 9.03516C13.0469 10.3628 14.1255 11.4414 15.4531 11.4414V9.44141C15.2301 9.44141 15.0469 9.25818 15.0469 9.03516H13.0469ZM15.4531 11.4414H19.0156V9.44141H15.4531V11.4414ZM19.0156 11.4414C20.3432 11.4414 21.4219 10.3628 21.4219 9.03516H19.4219C19.4219 9.25818 19.2387 9.44141 19.0156 9.44141V11.4414ZM21.4219 9.03516V5.47266H19.4219V9.03516H21.4219ZM21.4219 5.47266C21.4219 4.14506 20.3432 3.06641 19.0156 3.06641V5.06641C19.2387 5.06641 19.4219 5.24963 19.4219 5.47266H21.4219ZM19.0156 3.06641H15.4531V5.06641H19.0156V3.06641ZM19.0156 19.8711H15.4531V21.8711H19.0156V19.8711ZM15.4531 19.8711C14.7131 19.8711 14.1094 19.2674 14.1094 18.5273H12.1094C12.1094 20.372 13.6085 21.8711 15.4531 21.8711V19.8711ZM14.1094 18.5273V14.9648H12.1094V18.5273H14.1094ZM14.1094 14.9648C14.1094 14.2248 14.7131 13.6211 15.4531 13.6211V11.6211C13.6085 11.6211 12.1094 13.1202 12.1094 14.9648H14.1094ZM15.4531 13.6211H19.0156V11.6211H15.4531V13.6211ZM19.0156 13.6211C19.7557 13.6211 20.3594 14.2248 20.3594 14.9648H22.3594C22.3594 13.1202 20.8603 11.6211 19.0156 11.6211V13.6211ZM20.3594 14.9648V18.5273H22.3594V14.9648H20.3594ZM20.3594 18.5273C20.3594 19.2674 19.7557 19.8711 19.0156 19.8711V21.8711C20.8603 21.8711 22.3594 20.372 22.3594 18.5273H20.3594ZM15.4531 12.5586C14.1255 12.5586 13.0469 13.6372 13.0469 14.9648H15.0469C15.0469 14.7418 15.2301 14.5586 15.4531 14.5586V12.5586ZM13.0469 14.9648V18.5273H15.0469V14.9648H13.0469ZM13.0469 18.5273C13.0469 19.8549 14.1255 20.9336 15.4531 20.9336V18.9336C15.2301 18.9336 15.0469 18.7504 15.0469 18.5273H13.0469ZM15.4531 20.9336H19.0156V18.9336H15.4531V20.9336ZM19.0156 20.9336C20.3432 20.9336 21.4219 19.8549 21.4219 18.5273H19.4219C19.4219 18.7504 19.2387 18.9336 19.0156 18.9336V20.9336ZM21.4219 18.5273V14.9648H19.4219V18.5273H21.4219ZM21.4219 14.9648C21.4219 13.6372 20.3432 12.5586 19.0156 12.5586V14.5586C19.2387 14.5586 19.4219 14.7418 19.4219 14.9648H21.4219ZM19.0156 12.5586H15.4531V14.5586H19.0156V12.5586ZM9.54688 19.8711H5.98438V21.8711H9.54688V19.8711ZM5.98438 19.8711C5.24432 19.8711 4.64062 19.2674 4.64062 18.5273H2.64062C2.64062 20.372 4.13975 21.8711 5.98438 21.8711V19.8711ZM4.64062 18.5273V14.9648H2.64062V18.5273H4.64062ZM4.64062 14.9648C4.64062 14.2248 5.24432 13.6211 5.98438 13.6211V11.6211C4.13975 11.6211 2.64062 13.1202 2.64062 14.9648H4.64062ZM5.98438 13.6211H9.54688V11.6211H5.98438V13.6211ZM9.54688 13.6211C10.2869 13.6211 10.8906 14.2248 10.8906 14.9648H12.8906C12.8906 13.1202 11.3915 11.6211 9.54688 11.6211V13.6211ZM10.8906 14.9648V18.5273H12.8906V14.9648H10.8906ZM10.8906 18.5273C10.8906 19.2674 10.2869 19.8711 9.54688 19.8711V21.8711C11.3915 21.8711 12.8906 20.372 12.8906 18.5273H10.8906ZM5.98438 12.5586C4.65678 12.5586 3.57812 13.6372 3.57812 14.9648H5.57812C5.57812 14.7418 5.76135 14.5586 5.98438 14.5586V12.5586ZM3.57812 14.9648V18.5273H5.57812V14.9648H3.57812ZM3.57812 18.5273C3.57812 19.8549 4.65678 20.9336 5.98438 20.9336V18.9336C5.76135 18.9336 5.57812 18.7504 5.57812 18.5273H3.57812ZM5.98438 20.9336H9.54688V18.9336H5.98438V20.9336ZM9.54688 20.9336C10.8745 20.9336 11.9531 19.8549 11.9531 18.5273H9.95312C9.95312 18.7504 9.7699 18.9336 9.54688 18.9336V20.9336ZM11.9531 18.5273V14.9648H9.95312V18.5273H11.9531ZM11.9531 14.9648C11.9531 13.6372 10.8745 12.5586 9.54688 12.5586V14.5586C9.7699 14.5586 9.95312 14.7418 9.95312 14.9648H11.9531ZM9.54688 12.5586H5.98438V14.5586H9.54688V12.5586ZM7.76562 10.3789C6.04353 10.3789 4.64062 8.976 4.64062 7.25391H2.64062C2.64062 10.0806 4.93897 12.3789 7.76562 12.3789V10.3789ZM4.64062 7.25391C4.64062 5.53182 6.04353 4.12891 7.76562 4.12891V2.12891C4.93897 2.12891 2.64062 4.42725 2.64062 7.25391H4.64062ZM7.76562 4.12891C9.48772 4.12891 10.8906 5.53182 10.8906 7.25391H12.8906C12.8906 4.42725 10.5923 2.12891 7.76562 2.12891V4.12891ZM10.8906 7.25391C10.8906 8.976 9.48772 10.3789 7.76562 10.3789V12.3789C10.5923 12.3789 12.8906 10.0806 12.8906 7.25391H10.8906ZM7.76562 3.06641C5.45553 3.06641 3.57812 4.94381 3.57812 7.25391H5.57812C5.57812 6.04838 6.5601 5.06641 7.76562 5.06641V3.06641ZM3.57812 7.25391C3.57812 9.564 5.45553 11.4414 7.76562 11.4414V9.44141C6.5601 9.44141 5.57812 8.45943 5.57812 7.25391H3.57812ZM7.76562 11.4414C10.0757 11.4414 11.9531 9.564 11.9531 7.25391H9.95312C9.95312 8.45943 8.97115 9.44141 7.76562 9.44141V11.4414ZM11.9531 7.25391C11.9531 4.94381 10.0757 3.06641 7.76562 3.06641V5.06641C8.97115 5.06641 9.95312 6.04838 9.95312 7.25391H11.9531Z" fill="#00C2C7" mask="url(#path-1-inside-1_292_11070)" />
                    </svg>
                    <h4>{{__('validation.home_product_unique')}}</h4>
                    <p style="color:darkgray">{{__('validation.home_product_unique_description')}}</p>
                </div>
            </div>
        </section>





        <!-- absolute banner -->
        <section class="banner-furniture absolute_banner ratio3_2">
            <div class="section-content-slide mt-5">

                <div class="row partition3">
                    <div class="col-md-10">
                        <p>
                            <span class="h4">{{__('validation.home_category_favorite')}}</span>
                        </p>
                    </div>
                    <div class="col-md-2">
                        <a href="/{{ app()->getLocale() }}/discover">
                            <p class="text-end text-secondary fs-6 fw-semibold Set col-12 m-0 px-3 py-2">{{ __('validation.home_all') }}</p>
                        </a>
                    </div>
                    @foreach ($fav_tag as $item)
                    <div class="col-md-3">
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/{{$item->ms_product_tag_id}}/-" class="absolute-contain">
                            <div class="collection-banner p-left text-left">
                                @if($item->ms_product_tag_img1 == null)
                                <img src="https://erp.giftwise.co.th/assets/images/categorys/IMG_20231121034623_73sQ0.jpg" alt="" class="img-fluid lazyload bg-img" style="border-radius: 10px;">
                                @else
                                <img src="{{$item->ms_product_tag_img1}}" alt="" class="img-fluid lazyload bg-img" style="border-radius: 10px;">
                                @endif
                                <div class="absolute-contain">
                                    @if(app()->getLocale() == 'th')
                                    <p class="text-we">{{$item->ms_product_tag_name}}</p>
                                    <small style="font-size: .8em !important">{{$item->ms_product_tag_remark}}</small>
                                    @else
                                    <p class="text-we">{{$item->ms_product_tag_nameen}}</p>
                                    <small style="font-size: .8em !important">{{$item->ms_product_tag_remarken}}</small>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- absolute banner -->








        {{-- <div class="container mt-5"> --}}
        <section class="service section-b-space border-section border-top-0 container">
            <div class="row partition4">
                <div class="col-md-12 text-center service-block2">

                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="56" height="56" rx="28" fill="white" />
                        <path d="M29.1667 16.332L17.5 30.332H28L26.8333 39.6654L38.5 25.6654H28L29.1667 16.332Z" stroke="#00C2C7" stroke-width="2.33333" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <br>
                    <p style="margin-top: 20px;">
                        <span class="h4">{{__('validation.home_our_work')}}</span>
                    </p>
                    <br>
                    <p>
                        <span class="h6" style="color:darkgray">{{__('validation.home_our_work_description')}}</span>
                    </p>
                </div>
                <div class="col-lg-4 service-block2">
                    <h1 style="color:#00C2C7">27,000,000</h1>
                    <p>{{__('validation.home_our_work_sub1')}}</p>
                </div>
                <div class="col-lg-4 service-block2">
                    <h1 style="color:#00C2C7">75,000+</h1>
                    <p>{{__('validation.home_our_work_sub2')}}</p>
                </div>
                <div class="col-lg-4 service-block2">
                    <h1 style="color:#00C2C7">65,000</h1>
                    <p>{{__('validation.home_our_work_sub3')}}</p>
                </div>
                <div class="col-md-12 text-center service-block2">
                    <h5>{{__('validation.home_group_service')}}</h5>
                </div>
                <div class="col-md-12 image-container">
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image1.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image2.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image3.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image4.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image5.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image6.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image7.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image8.png') }}" alt=""></div>
                    <div class="image-wrapper"><img src="{{ asset('assets/frontend/images/image9.png') }}" alt=""></div>
                </div>
            </div>
        </section>
        {{-- </div> --}}
  

        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <center>
                                    <img src="{{asset($cont1->conf_contact_img)}}" alt="" class="img-fluid">
                                </center>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12 el-ft-q">
                                <div class="checkout-title">
                                    <h3>{{__('validation.home_contact_title')}}</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;border-radius: 10px;">
                                        <input type="text" class="form-control" name="field-name" value="" id="ft_quo_name" placeholder="{{__('validation.home_contact_name')}}" style="border-radius: 10px;">
                                        <div class="notify-error-ft-quo-name" hidden>
                                            <p style="color:red">{{__('validation.home_aler_contact_name')}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;border-radius: 10px;">
                                        <input type="email" class="form-control" name="field-email" value="" id="ft_quo_email" placeholder="{{__('validation.home_contact_email')}}" style="border-radius: 10px;">
                                        <div class="notify-error-ft-quo-email" hidden>
                                            <p style="color:red">{{__('validation.home_aler_contact_email')}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;border-radius: 10px;">
                                        <input type="text" class="form-control" name="field-company" value="" id="ft_quo_company" placeholder="{{__('validation.home_contact_company')}}" style="border-radius: 10px;">
                                        <div class="notify-error-ft-quo-company" hidden>
                                            <p style="color:red">{{__('validation.home_aler_contact_company')}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;border-radius: 10px;">
                                        <input type="number" class="form-control" name="field-tel" value="" id="ft_quo_tel" placeholder="{{__('validation.home_contact_phone')}}" style="border-radius: 10px;">
                                        <div class="notify-error-ft-quo-tel" hidden>
                                            <p style="color:red">{{__('validation.home_aler_contact_phone')}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;border-radius: 10px;">
                                        <div class="field-label">{{__('validation.home_contact_message')}}</div>
                                        <textarea class="form-control" rows="4" cols="50" name="field-message" id="ft_quo_remark" placeholder="{{__('validation.home_contact_message_input')}}" style="border-radius: 10px;height:60px"></textarea>
                                        <div class="notify-error-ft-quo-remark" hidden>
                                            <p style="color:red">{{__('validation.home_aler_contact_message')}}</p>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                        <div class="field-label">{{__('validation.home_contact_upload')}}</div>
                                        <div class="file-drop-area">
                                            <span class="fake-btn" style="color:#00C2C7">SELECT FILE</span>
                                            <span class="file-msg">Select a file or drag and drop here<br>JPG, PNG or PDF, file size no more than 10MB</span>
                                            <input class="file-input" type="file" id="ft_quo_file" accept="image/*,.pdf" multiple onchange="quickQuoFile(this)">
                                            <div class="item-delete"></div>
                                        </div>
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px;margin-bottom: 10px;">
                                            <input type="checkbox" name="shipping-option" id="ft_quo_option"> &ensp;
                                            <label for="ft_quo_option">{{__('validation.home_contact_checkbox')}}</label>
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px;">
                                            <button type="button" class="btn btn-solid form-control" style="background-color:#00C2C7;color:#fff;border-radius: 10px;" onclick="squoTation()">{{__('validation.home_contact_send')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="section-content" style="padding-top: 50px;">
            <section class="small-section border-section border-top-0 subscribe">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <div>
                                <h4><b>{{__('validation.home_subcribe_title')}}</b></h4>
                                <p>{{__('validation.home_subcribe_input')}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group mx-sm-3">
                            <input type="text" class="input-sub" name="subemail" id="sub_mail" placeholder="{{__('validation.home_subcribe_input_email')}}" required="required">
                            <button type="button" class="btn btn-solid" style="background-color:#00C2C7;color:#fff;border-radius: 10px;" id="bt-sub" onclick="subScribe()">{{__('validation.home_subcribe_input_button')}}</button>
                            <br>
                            <div class="notify-sub-error" hidden>
                                <p style="color:red">{{__('validation.home_subcribe_alert_email')}}</p>
                            </div>
                            <div class="notify-sub-duplicate" hidden>
                                <p style="color:red">{{__('validation.home_subcribe_alert_email_duplicate')}}</p>
                            </div>
                            <!-- button finish -->
                            <a type="javascript:viod(0)" class="btn btn-solid noti-sub-bt" style="background-color:#fff;color:#417A61;font-size:11px;" hidden>
                                <i class="fa fa-check" aria-hidden="true"></i> {{__('validation.home_subcribe_alert_email_success')}}</a>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
{{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<!-- menu js-->
<script src="{{ asset('assets/frontend/multikart/js/menu.js') }}"></script>
<script src="{{ asset('assets/frontend/multikart/js/script.js') }}"></script>



<script>
 document.addEventListener('DOMContentLoaded', function() {
    const menuItems = document.querySelectorAll('.sm-vertical > li');
    
    menuItems.forEach(item => {
        const megaMenu = item.querySelector('.mega-menu.clothing-menu');
        if (megaMenu) {
            let timeout;
            
            item.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
                megaMenu.style.display = 'block';
            });
            
            item.addEventListener('mouseleave', function(e) {
                timeout = setTimeout(() => {
                    if (!megaMenu.matches(':hover')) {
                        megaMenu.style.display = 'none';
                    }
                }, 100);
            });
            
            megaMenu.addEventListener('mouseenter', function() {
                clearTimeout(timeout);
            });
            
            megaMenu.addEventListener('mouseleave', function() {
                timeout = setTimeout(() => {
                    megaMenu.style.display = 'none';
                }, 100);
            });
        }
    });
});
    playList = (ref, th, en) => {

        $.ajax({
            url: "{{ url('/get-play-list') }}",
            type: "POST",
            data: {
                ref: ref,
                th: th,
                en: en,
                _token: '{{ csrf_token() }}'
            },
            dataType: "json",
            success: function(res) {

                let html = '';

                $.each(res.data, function(index, value) {

                    if (value.conf_mainproduct_img1 != null) {
                        html += `<img src="${value.conf_mainproduct_img1}" alt="" class="img-fluid" style="border-radius: 10px;max-width:200px;margin-right:5px;">`;
                    }
                });



                $('.playlist').html(`<div style="margin: 5px;">
                        ${html}
                    </div>`).hide().fadeIn(1000);


                $('.arrow-ck').html(``);

                setTimeout(function() {

                    $('.arrow-staff-' + ref).html(`<i class="fas fa-chevron-right text-white"></i>`);

                }, 1000);



            }
        });




    }



    subScribe = () => {

        let email = $('#sub_mail').val();

        let validRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (email == '') {

            $('.notify-sub-error').removeAttr('hidden');
            $('.notify-sub-duplicate').attr('hidden', true);



        } else if (email != '' && !validRegex.test(email)) {


            $('.notify-sub-error').removeAttr('hidden');
            $('.notify-sub-duplicate').attr('hidden', true);



        } else {

            $.ajax({
                url: "{{ route('check-subscrib') }}",
                type: "POST",
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(res) {

                    if (res.message == 'duplicate') {
                        $('.notify-sub-duplicate').removeAttr('hidden');

                        $('.notify-sub-error').attr('hidden', true);
                        $('.noti-sub-bt').attr('hidden', true);


                    } else {

                        $('#sub_mail').val('');
                        $('.noti-sub-bt').removeAttr('hidden');

                        $('#bt-sub').attr('disabled', true);
                        $('.notify-sub-error').attr('hidden', true);
                        $('.notify-sub-duplicate').attr('hidden', true);

                    }

                }


            });


        }


    }

    squoTation = () => {

        let name = $('#ft_quo_name').val();
        let email = $('#ft_quo_email').val();
        let company = $('#ft_quo_company').val();
        let tel = $('#ft_quo_tel').val();
        let remark = $('#ft_quo_remark').val();
        let option = $('#ft_quo_option').is(":checked");
        let file = $('#ft_quo_file').val();

        if (name == '') {

            $('.notify-error-ft-quo-name').removeAttr('hidden');
            $('#ft_quo_name').css('border', '1px solid red');

        } else {

            $('.notify-error-ft-quo-name').attr('hidden', true);
            $('#ft_quo_name').css('border', '1px solid #ced4da');

        }

        if (email == '') {

            $('.notify-error-ft-quo-email').removeAttr('hidden');
            $('#ft_quo_email').css('border', '1px solid red');

        } else {

            $('.notify-error-ft-quo-email').attr('hidden', true);
            $('#ft_quo_email').css('border', '1px solid #ced4da');

        }

        if (company == '') {

            $('.notify-error-ft-quo-company').removeAttr('hidden');
            $('#ft_quo_company').css('border', '1px solid red');

        } else {

            $('.notify-error-ft-quo-company').attr('hidden', true);
            $('#ft_quo_company').css('border', '1px solid #ced4da');

        }

        if (tel == '') {

            $('.notify-error-ft-quo-tel').removeAttr('hidden');
            $('#ft_quo_tel').css('border', '1px solid red');

        } else {

            $('.notify-error-ft-quo-tel').attr('hidden', true);
            $('#ft_quo_tel').css('border', '1px solid #ced4da');

        }

        if (remark == '') {

            $('.notify-error-ft-quo-remark').removeAttr('hidden');
            $('#ft_quo_remark').css('border', '1px solid red');

        } else {

            $('.notify-error-ft-quo-remark').attr('hidden', true);
            $('#ft_quo_remark').css('border', '1px solid #ced4da');

        }


        if (name != '' && email != '' && company != '' && tel != '' && remark != '') {

            if (option == true) {

                option = 1;

            } else {

                option = 0;

            }

            let form_data = new FormData();
            let file_data = $('#ft_quo_file').prop('files')[0];
            form_data.append('file', file_data);
            form_data.append('name', name);
            form_data.append('email', email);
            form_data.append('company', company);
            form_data.append('tel', tel);
            form_data.append('remark', remark);
            form_data.append('option', option);
            form_data.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('quickdata.quotationhome') }}",
                type: "POST",
                data: form_data,
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(res) {

                    // console.log(res);


                    if (res.message == 'success') {


                        $('.el-ft-q').html(`
                        <div id="ft-q" style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128" fill="none">
<g clip-path="url(#clip0_346_27773)">
<path d="M64 127.959C99.3462 127.959 128 99.324 128 64.001C128 28.6779 99.3462 0.0429688 64 0.0429688C28.6538 0.0429688 0 28.6779 0 64.001C0 99.324 28.6538 127.959 64 127.959Z" fill="#32BEA6"/>
<path d="M58.8694 98.019L28.6094 10045L37.2134 63.403L55.7954 77.879L86.4634 33.625L97.9714 41.597L58.8694 98.019Z" fill="white"/>
</g>
<defs>
<clipPath id="clip0_346_27773">
<rect width="128" height="128" fill="white"/>
</clipPath>
</defs>
</svg>
<br>
<h3><b>ขอใบเสนอราคาสำเร็จ</b></h3>
<p style="color:#9699b3">ทีมงาน Giftwise จะรีบติดต่อกลับไปภายใน 3 วัน<br>หากต้องการความช่วยเหลือ กรุณาติดต่อ 080-0000000</p>
<button type="button" class="btn-solid" style="background-color:#00C2C7;color:#fff;border-radius: 10px;" onclick="location.reload()">กลับสู่หน้าหลัก</button>
</div> 
                        `)










                    } else {

                        toastr.error('เกิดข้อผิดพลาด');

                    }

                }



            });







        } else {

            return false;

        }












    }


    function createToast(option) {
        var final = toastCaseValidation(option);
        var html = `
               <div class="hs-toast hs-theme-` + (option.theme).toLowerCase() + `">
                <div class="hs-toast-inner">                
                  <div class="hs-toast-icons">
                    ` + final.icon + `
                  </div>
                  <div class="hs-toast-msg">
                    ` + final.msg + `
                  </div>
                  <div class="hs-toast-action">
                    ` + final.close + `
                  </div>
                </div>
               </div>`;
        return html;
    }

    function toastCaseValidation(option) {
        var finalOption = {};
        var toastmsg;
        var themeIco;
        var closeBtn = '<button type="button" class="hs-close">&#10006;</button>';
        switch (option.theme) {
            case 'error':
                themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30"> <circle fill="none" stroke="#fff" stroke-width="2"  cx="50%" cy="50%" r="13" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset" from="100" to="0" dur="0.9s" /> </circle> <line fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"  x1="10.5" y1="10.5" x2="19.5" y2="19.5" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="4s" /> </line> <line fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round"  x1="19.5" y1="10.5" x2="10.5" y2="19.5" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="4s" /> </line> </svg>';
                break;
            case 'success':
                themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30"> <circle fill="none" stroke="#fff" stroke-width="2" cx="50%" cy="50%" r="13" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset" from="100" to="0" dur="0.9s" /> </circle> <polyline fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" points="8,17 13,21 22,10" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="4s" /> </polyline> </svg>';
                break;
            case 'warning':
                themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30" > <path  d="M 13 2 Q 15,0 17,2 L 26,23 Q 26,26 23,26 L 6,26 Q 2,26 3,22 L 13,2" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="0.9s" /> </path> <line  fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="9" x2="15" y2="17" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="5s" /> </line> <line  fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="21" x2="15" y2="22" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="5s" /> </line> </svg>';
                break;
            default:
                themeIco = '<svg aria-hidden="true" focusable="false"  xmlns="http://www.w3.org/2000/svg" width="1.875em" height="1.875em" viewBox="0 0 30 30"> <circle fill="none" stroke="#fff" stroke-width="2" cx="50%" cy="50%" r="13" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset" from="100" to="0" dur="0.9s" /> </circle> <line fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="9" x2="15" y2="9" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="6s" /> </line> <line fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" x1="15" y1="15" x2="15" y2="22" stroke-dasharray="100"> <animate attributeName="stroke-dashoffset"  from="100" to="0" dur="6s" /> </line> </svg>';
        }
        if (option.closeButton == false) {
            closeBtn = '';
        }

        if (option.msg == undefined) {
            toastmsg = 'No Message';
        } else {
            if (option.msg.length != 1 && typeof option.msg === "object") {
                toastmsg = '<ul>';
                option.msg.forEach(function(val, index) {
                    toastmsg = toastmsg + '<li>' + val + '</li>';
                });
                toastmsg = toastmsg + '</ul>';
            } else {
                toastmsg = option.msg;
            }
        }
        finalOption.icon = themeIco;
        finalOption.close = closeBtn;
        finalOption.msg = toastmsg;
        return finalOption;
    }

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
            slidesToShow: 5, // Number of products to show at a time
            slidesToScroll: 1, // Number of products to scroll at a time
            autoplay: true, // Autoplay the slider
            autoplaySpeed: 3000, // Autoplay interval in milliseconds
            dots: true, // Display navigation dots
            responsive: [{
                    breakpoint: 1024, // Tablet breakpoint
                    settings: {
                        slidesToShow: 2, // Number of products to show at a time
                        slidesToScroll: 1, // Number of products to scroll at a time
                    }
                },
                {
                    breakpoint: 600, // Mobile breakpoint
                    settings: {
                        slidesToShow: 1, // Number of products to show at a time
                        slidesToScroll: 1, // Number of products to scroll at a time
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
</script>
@endsection