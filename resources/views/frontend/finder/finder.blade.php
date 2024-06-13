@extends('layouts.home')
@section('css')
<link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        margin-top: 5px;
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

    .btn-price {
        font-size: 16px;  
        font-weight: 600;
        line-height: 24px;
        word-wrap: break-word
    }

    .btn-price:hover {
        color: white !important;
    }

    .btn-price.active {
        color: white !important;
    }

    .btn-download {
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
        word-wrap: break-word
    }

    .btn-download:hover {
        color: white !important;
    }

    .btn-download.active {
        color: white !important;
    }

    @media print {
  @page {
    size: 100mm 200mm landscape;
  }

  div.page-break-after {
    page-break-after: always;


    /* border: 1px solid #ccc; */
  }

}
table, th, td {
    padding:9.5px !important;
    border: 1px solid #ddd;
    text-align: center;
}
.input-catalog{
  border: none;
  border-bottom: 1px solid #000;
  text-align: center;
  height: 100px;

}

input[type="checkbox"][id^="my-checkbox"] {
        display: none;
    }

    label {
        text-align: center;
        padding: 10px;
        position: relative;
        margin: 0px;
        cursor: pointer;
    }

    label:before {
        background-color: white;
        color: white;
        content: " ";
        display: block;
        border-radius: 50%;
        border: 1px solid grey;
        position: absolute;
        top: -5px;
        left: -5px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 28px;
        transition-duration: 0.4s;
        transform: scale(0);
    }

    label img {

        transition-duration: 0.2s;
        transform-origin: 50% 50%;
    }

    :checked+label {
        border-color: #ddd;
        background-color: #eee;
    }

    :checked+label:before {
        content: "✓";
        background-color: grey;
        transform: scale(1);
    }

    :checked+label img {
        transform: scale(0.9);
        /* box-shadow: 0 0 5px #333; */
        z-index: -1;
    }
</style>
@endsection

@section('content')
<div>
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
                        <a href="/product-quick-tag/72"><span class="badge p-2">{{ __('validation.top_popular_search_1') }}</span></a>
                        <a href="/product-quick-tag/71"><span class="badge p-2">{{ __('validation.top_popular_search_2') }}</span></a>
                        <a href="/product-quick-tag/73"><span class="badge p-2">Staff Pick</span></a>
                        <a href="/product-quick-tag/74"><span class="badge p-2">Gift Set</span></a>
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
    <div class="row" style="background-color: rgb(248,249,250);padding: 50px;">
        <div class="col-md-12 mt-3">
            <p class=" m-0 px-5 py-3"><span class="text-dark fs-2 fw-bold  Set">GIFT </span><span class="fs-2 fw-bold  Set" style="color : #00C2C7;">FINDER</span></p>
        </div>
        <div class="col-md-12 mt-3">
            <p class=" m-0 px-5"><img src="{{ asset('assets/images/icon/budget.png') }}" alt="" class="img-fluid me-2"><span class="text-dark fs-6 fw-bold  Set">{{ __('validation.finder_title_price') }}</span></p>
        </div>
        <div class="col-md-12">
            <div id="price" class=" m-0 px-5 py-1 btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="price" value="0-50">
                    {{ __('validation.finder_price_50') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="price" value="50-100">
                    {{ __('validation.finder_price_50_100') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="price" value="100-200">
                    {{ __('validation.finder_price_100_200') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="price" value="200-300">
                    {{ __('validation.finder_price_200_300') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="price" value="300-500">
                    {{ __('validation.finder_price_300_500') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="price" value="0-5000">
                    {{ __('validation.finder_price_more_than_500') }}
                </label>
                <label class="checkbox-label fs-6 mr-2 mb-2 btn-price" style="padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;">
                    <div class="input-group">
                        <span class="input-group-text">{{ __('validation.finder_input_qty') }} :</span>
                        <input type="number" class="form-control" aria-label="Input field" id="price-input" min="1">
                    </div>
                </label>
            </div>
        </div>

        <div class="col-md-12 mt-3">
            <p class=" m-0 px-5"><img src="{{ asset('assets/images/icon/archive.png') }}" alt="" class="img-fluid me-2"><span class="text-dark fs-6 fw-bold  Set">{{ __('validation.finder_title_qty') }}</span></p>
        </div>


        <div class="col-md-12">
            <div id="price" class=" m-0 px-5 py-1 btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="qty" value="50">
                    {{ __('validation.finder_qty_50') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px; color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="qty" value="100">
                    {{ __('validation.finder_qty_100') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px; color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="qty" value="300">
                    {{ __('validation.finder_qty_300') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px; color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="qty" value="500">
                    {{ __('validation.finder_qty_500') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px; color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="qty" value="1000">
                    {{ __('validation.finder_qty_1000') }}
                </label>
                <label class="checkbox-label fs-6 mr-2 mb-2 btn-price" style="padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;">
                    <div class="input-group">
                        <span class="input-group-text">{{ __('validation.finder_input_qty') }} :</span>
                        <input type="number" class="form-control" aria-label="Input field" id="qty-input" min="1">
                    </div>
                </label>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <p class=" m-0 px-5"><img src="{{ asset('assets/images/icon/calendar.png') }}" alt="" class="img-fluid me-2"><span class="text-dark fs-6 fw-bold  Set">{{ __('validation.finder_title_production_timeline') }}</span></p>
        </div>
        <div class="col-md-12">
            <div id="price" class=" m-0 px-5 py-1 btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="timeline" value="ready">
                    {{ __('validation.finder_timeline_ready') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="timeline" value="7">
                    {{ __('validation.finder_timeline_within_7') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="timeline" value="14">
                    {{ __('validation.finder_timeline_within_14') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="timeline" value="21">
                    {{ __('validation.finder_timeline_within_21') }}
                </label>
                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label fs-6 mr-2 mb-1 btn-price" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px">
                    <input type="radio" class="btn btn-secondary  checkbox" name="timeline" value="30">
                    {{ __('validation.finder_timeline_within_30') }}
                </label>
                <label class="checkbox-label fs-6 mr-2 mb-2 btn-price" style="padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;">
                    <div class="input-group">
                        <span class="input-group-text">{{ __('validation.finder_input_timeline') }} :</span>
                        <input type="number" class="form-control" aria-label="Input field" id="timeline-input" min="1">
                    </div>
                </label>
            </div>
        </div>
        <div class="col-md-3 offset-md-4 mb-5">
            <div class="d-grid gap-2">
                <button type="button" class="btn btn-block rounded-2 text-white mt-3" style="background-color: #00C2C7" onclick="findData()">{{ __('validation.finder_button_search') }}</button>
            </div>
        </div>
    </div>
    <div class="section-content-finder">
    <div class="row">
        <div class="col-md-12 mt-3 mb-3">
            <p class=" m-0 px-3 py-2"><span class="text-info fs-6 fw-bold  Set" id="rs_count"></span><span class="text-dark fs-6 fw-bold  Set"> {{ __('validation.finder_title_rs') }}</span></p>
            <p class="text-secondary fs-6 fw-normal  Set  m-0 px-3 py-2">{{ __('validation.finder_title_rs_description') }}</p>
        </div>
        <div class="col-md-12">
            <div id="price" class="btn-group-toggle" data-toggle="buttons" style="padding-left: 17px;">
                <label class="btn btn-outline-secondary  rounded-3 border border-1 border-secondary checkbox-label fs-6 mr-2 m-1 btn-download download-list"        
                style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px" onclick="downLoadList()">
                    <i class="fa fa-download" aria-hidden="true"></i> {{ __('validation.finder_button_select_download') }} (0)
                </label>
                <!-- <label class="btn btn-outline-secondary  rounded-3 border border-1 border-secondary checkbox-label fs-6 mr-2 mb-1 btn-download download-all"
                 style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;margin-right:7px" onclick="downloadAll()">
                    <i class="fa fa-download" aria-hidden="true"></i> {{ __('validation.finder_button_select_download_all') }}
                </label> -->
                <label class="checkbox-label fs-6 mr-2 mb-1" style="padding-left: 18px; padding-right: 18px; padding-top: 10px; padding-bottom: 10px;color: #344054;">
                    <a href="javascript:void(0)" class="text-secondary" data-bs-toggle="modal" data-bs-target="#preview" onclick="loadData()"><i class="fas fa-exclamation-circle"></i> {{ __('validation.finder_button_select_sample') }}</a>
                </label>
            </div>
        </div>
    </div>
    </div>
    <form method="post" id="form-download" action="{{ route('finder.download-pdf') }}">
    <iframe id="download" name="download" style="display:none;"></iframe>
    @csrf
    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="section-content-finder mb-5">
                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12 text-center rs-product">
                                    <div class="collection-product-wrapper">
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res" id="listpro">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128" fill="none">
                                                    <path d="M125.497 99.5626L103.547 75.8238C102.955 75.1846 102.16 74.7699 101.297 74.6501C100.434 74.5303 99.5559 74.7128 98.812 75.1666L97.5537 73.8058C100.914 69.1307 102.745 63.5303 102.796 57.7732C102.846 52.0161 101.114 46.3843 97.837 41.6508C94.5597 36.9172 89.8979 33.3138 84.4912 31.3351C79.0846 29.3564 73.1981 29.0993 67.6395 30.5991L60.0515 18.7226C57.8882 20.0398 57.4115 20.3416 55.5845 21.4046L52.4943 16.3748L45.4577 20.6643L42.546 15.5703C18.5128 40.9838 2.79625 44.2768 1.5 45.0623L40.2262 103.016L45.7648 100.708L50.475 108.017C63.959 103.351 80.0628 95.3898 89.9443 85.1348C89.9915 86.0102 90.3434 86.8415 90.939 87.4848L112.889 111.222C113.568 111.957 114.511 112.391 115.511 112.43C116.511 112.469 117.485 112.11 118.219 111.431L125.289 104.893C125.653 104.557 125.948 104.152 126.155 103.702C126.362 103.252 126.479 102.766 126.498 102.271C126.518 101.776 126.439 101.282 126.267 100.817C126.096 100.352 125.834 99.9261 125.497 99.5626Z" fill="white" />
                                                    <path d="M56.9267 28.7559L51.5992 20.0859L44.4892 24.4209L42.0122 20.0859C42.0122 20.0859 23.8992 39.3794 5.62891 46.3769L41.2379 99.6647L46.8117 97.3424L51.5992 104.774C51.5992 104.774 75.1434 96.7239 88.1492 83.0989L56.9267 28.7559Z" fill="#B2ACA3" />
                                                    <path d="M59.1982 22.4102C59.1982 22.4102 39.7938 34.2397 17.5 42.9814L53.831 100.44C53.831 100.44 77.364 91.3577 92.4335 74.4304L59.1982 22.4102Z" fill="#EAE5DB" />
                                                    <path d="M30.2461 42.9772L34.8906 49.4863C34.8906 49.4863 49.2281 43.6362 56.9271 37.2687L53.2088 31.0938C53.2088 31.0938 44.9541 37.2287 30.2461 42.9772Z" fill="#FF605B" />
                                                    <path d="M34.4966 60.401C34.4355 60.3462 34.3858 60.2798 34.3503 60.2058C34.3149 60.1317 34.2944 60.0514 34.29 59.9695C34.2856 59.8875 34.2973 59.8055 34.3246 59.728C34.3519 59.6506 34.3942 59.5793 34.4491 59.5183L36.5528 57.174C37.3528 56.2838 37.8981 56.1835 39.0383 56.5145C41.0303 57.0935 42.0781 55.3705 43.8303 54.2645C45.7321 53.0645 48.1018 52.8865 49.5376 51.51C50.2611 50.8165 50.9356 49.6778 52.1948 49.4823C52.8351 49.3823 53.4076 49.5768 53.8768 49.5673C55.0768 49.54 55.9518 48.2148 56.9768 47.136C58.6363 45.4005 60.8991 44.369 63.2976 44.2545C63.3797 44.2509 63.4616 44.2635 63.5389 44.2916C63.6161 44.3196 63.687 44.3626 63.7476 44.4181C63.8082 44.4736 63.8572 44.5405 63.892 44.6149C63.9267 44.6894 63.9465 44.7699 63.9501 44.852C63.9537 44.9341 63.9411 45.0161 63.913 45.0933C63.885 45.1705 63.8419 45.2414 63.7865 45.302C63.731 45.3626 63.6641 45.4117 63.5897 45.4464C63.5152 45.4812 63.4347 45.5009 63.3526 45.5045C61.2772 45.6034 59.3191 46.4961 57.8833 47.998C56.7853 49.1558 55.7213 50.7773 53.9056 50.818C51.7378 50.868 52.9401 49.982 50.4031 52.4138C48.7153 54.0318 46.2531 54.2138 44.4981 55.3228C42.8881 56.3388 41.3943 58.5028 38.6896 57.7163C37.9646 57.5053 37.9161 57.5288 37.4836 58.0105L35.3796 60.3548C35.3247 60.4158 35.2582 60.4654 35.1841 60.5008C35.11 60.5361 35.0297 60.5566 34.9477 60.5609C34.8657 60.5651 34.7836 60.5532 34.7062 60.5258C34.6288 60.4984 34.5576 60.456 34.4966 60.401Z" fill="#1D1D3D" />
                                                    <path d="M40.6875 68.9012C40.5714 68.9012 40.4577 68.8688 40.3589 68.8078C40.2602 68.7468 40.1804 68.6595 40.1285 68.5557C40.0766 68.4519 40.0546 68.3356 40.065 68.22C40.0754 68.1044 40.1179 67.994 40.1875 67.9012C43.1845 63.9179 47.105 64.4057 47.981 63.8629C48.5617 63.5027 48.8892 62.6037 49.5365 61.9407C50.802 60.6447 52.715 60.6844 54.0595 59.9952C55.6075 59.2027 56.5805 57.3392 58.3122 56.3349C59.6157 55.5792 61.1 55.4454 62.4255 55.0829C63.274 54.8509 64.7557 54.2794 65.1445 53.0602C65.1949 52.9022 65.3059 52.7708 65.4532 52.6947C65.6005 52.6186 65.7719 52.6042 65.9299 52.6545C66.0878 52.7049 66.2193 52.8159 66.2953 52.9632C66.3714 53.1105 66.3859 53.282 66.3355 53.4399C65.9145 54.7604 64.643 55.7722 62.7552 56.2899C61.4165 56.6559 60.0368 56.7814 58.9393 57.4177C57.391 58.3149 56.45 60.1762 54.6295 61.1092C53.1545 61.8639 51.3833 61.8399 50.4295 62.8152C49.8853 63.3729 49.525 64.3764 48.6387 64.9264C47.3005 65.7559 43.923 65.0149 41.185 68.6539C41.1268 68.7307 41.0515 68.793 40.9652 68.8359C40.8789 68.8787 40.7839 68.9011 40.6875 68.9012Z" fill="#1D1D3D" />
                                                    <path d="M46.8289 77.2426C46.6983 77.2427 46.571 77.202 46.4647 77.126C46.3584 77.0501 46.2786 76.9428 46.2365 76.8191C46.1944 76.6955 46.1921 76.5618 46.2299 76.4367C46.2676 76.3117 46.3437 76.2017 46.4472 76.1221C48.6197 74.4501 51.0159 72.9506 54.6779 70.5851C57.5609 68.7228 58.3117 68.3998 60.5134 67.5903C64.0517 66.2903 65.7167 65.1493 69.2649 62.6061C69.3316 62.557 69.4073 62.5217 69.4877 62.5021C69.5681 62.4825 69.6516 62.4791 69.7334 62.4921C69.8151 62.505 69.8934 62.5341 69.9639 62.5776C70.0343 62.621 70.0953 62.6781 70.1435 62.7453C70.1917 62.8126 70.2261 62.8888 70.2446 62.9694C70.2632 63.0501 70.2655 63.1336 70.2515 63.2152C70.2375 63.2967 70.2074 63.3747 70.163 63.4446C70.1186 63.5144 70.0608 63.5747 69.993 63.6221C66.2102 66.3333 64.5042 67.4556 60.9444 68.7638C58.8362 69.5388 58.1592 69.8251 55.3562 71.6348C51.4855 74.1348 49.2904 75.5098 47.2097 77.1128C47.1006 77.197 46.9667 77.2427 46.8289 77.2426Z" fill="#1D1D3D" />
                                                    <path d="M51.4156 86.9004C51.2741 86.9007 51.1367 86.8531 51.0258 86.7652C50.9149 86.6772 50.8371 86.5543 50.8052 86.4165C50.7733 86.2786 50.789 86.134 50.85 86.0063C50.9109 85.8786 51.0134 85.7753 51.1406 85.7134C66.9211 78.0234 64.9306 77.1134 68.2571 75.5634C69.2571 75.0974 70.2821 74.9221 71.2524 74.6051C73.1394 73.9808 74.8014 72.8159 76.0321 71.2551C76.133 71.1263 76.2804 71.0422 76.4426 71.0209C76.6918 70.9906 76.9443 71.0357 77.1675 71.1505C77.3907 71.2653 77.5743 71.4444 77.6946 71.6646C77.7651 71.7964 77.786 71.9491 77.7536 72.095C77.7212 72.2409 77.6375 72.3704 77.5179 72.4599C77.3982 72.5494 77.2504 72.5931 77.1013 72.583C76.9522 72.5729 76.8116 72.5097 76.7051 72.4049C75.3549 73.9718 73.6046 75.1426 71.6409 75.7921C70.6559 76.1146 69.6524 76.2921 68.7851 76.6956C66.0351 77.9761 66.9351 79.4061 51.6881 86.8349C51.6034 86.8772 51.5102 86.8996 51.4156 86.9004Z" fill="#1D1D3D" />
                                                    <path d="M86.1719 73.875L90.3603 70.0005L98.5994 78.907L94.411 82.7815L86.1719 73.875Z" fill="#A369F7" />
                                                    <path d="M74.9209 82.6934C88.8268 82.6934 100.1 71.4205 100.1 57.5147C100.1 43.6089 88.8268 32.3359 74.9209 32.3359C61.0151 32.3359 49.7422 43.6089 49.7422 57.5147C49.7422 71.4205 61.0151 82.6934 74.9209 82.6934Z" fill="#FFB020" />
                                                    <path d="M87.9062 71.561C85.2637 74.0032 81.9859 75.6503 78.4493 76.3132C74.9127 76.9762 71.2609 76.6279 67.9133 75.3086C64.5657 73.9893 61.6582 71.7523 59.5249 68.8548C57.3915 65.9573 56.1188 62.5167 55.853 58.9284C55.5872 55.34 56.3391 51.7495 58.0223 48.5692C59.7055 45.389 62.2517 42.7481 65.3683 40.95C68.485 39.1518 72.0457 38.2694 75.6413 38.404C79.237 38.5386 82.7218 39.6849 85.6952 41.711C86.8872 42.5274 87.9842 43.4744 88.966 44.5343C90.673 46.3774 91.9999 48.539 92.8707 50.8955C93.7414 53.2519 94.139 55.7569 94.0405 58.2672C93.9421 60.7774 93.3496 63.2436 92.297 65.5247C91.2444 67.8057 89.7524 69.8568 87.9062 71.5605V71.561Z" fill="white" />
                                                    <path d="M100.095 77.5209L92.9084 84.1693C92.5081 84.5396 92.4838 85.1644 92.8541 85.5647L114.916 109.414C115.287 109.814 115.911 109.839 116.312 109.468L123.499 102.82C123.899 102.45 123.923 101.825 123.553 101.425L101.491 77.5752C101.12 77.1749 100.496 77.1506 100.095 77.5209Z" fill="#00ABFE" />
                                                    <path d="M93.2035 51.8837L76.5022 76.5772C72.1797 76.9348 67.8638 75.8137 64.2617 73.3977L85.6932 41.7109C86.8852 42.5273 87.9822 43.4743 88.964 44.5342C90.9109 46.6347 92.3599 49.1467 93.2035 51.8837Z" fill="#EAE5DB" />
                                                </svg>
                                                <br>
                                                <p class="text-center">No Products Found</p>


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
    </form>
    <!-- section End -->

</div>


 <!--modal quick quotation start-->
 <div class="modal fade bd-example-modal theme-modal" id="preview" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-body modal1" style="background-image: none !important;">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12 preview-list">
 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    findData = () => {

        $('.loading').removeAttr('hidden');

        let price = '';
        let qty = '';
        let timeline = '';
        let priceMin = 0;
        let priceMax = 0;

        if ($('#price-input').val() != '') {
            price = $('#price-input').val();
        } else {
            price = $('input[name="price"]:checked').val();
        }

        if ($('#qty-input').val() != '') {
            qty = $('#qty-input').val();
        } else {
            qty = $('input[name="qty"]:checked').val();
        }

        if ($('#timeline-input').val() != '') {
            timeline = $('#timeline-input').val();
        } else {
            timeline = $('input[name="timeline"]:checked').val();
        }


        if (price == undefined || price == '' || price == null || qty == undefined || qty == '' || qty == null || timeline == undefined || timeline == '' || timeline == null) {

        Swal.fire({
            icon: 'error',
            title: 'กรุณากรอกข้อมูลให้ครบถ้วน และ ให้ถูกต้อง',
            showConfirmButton: false,
            timer: 1500
        })

        $('.loading').attr('hidden', 'hidden');


        } else {

        

            if ($('#price-input').val() != '') {
                price = $('#price-input').val();


                if(price.includes('-')){

                    let priceArr = price.split('-');
                     priceMin = priceArr[0];
                     priceMax = priceArr[1];

                }else{

                    let priceArr = price;
                     priceMin = 0;
                     priceMax = price;

                }


            } else {
                price = $('input[name="price"]:checked').val();
                let priceArr = price.split('-');
                 priceMin = priceArr[0];
                 priceMax = priceArr[1];

            }



            if ($('#qty-input').val() != '') {
                qty = $('#qty-input').val();
            } else {
                qty = $('input[name="qty"]:checked').val();
            }

            if ($('#timeline-input').val() != '') {
                timeline = $('#timeline-input').val();
            } else {
                timeline = $('input[name="timeline"]:checked').val();
            }


            $.ajax({
                url: "{{ route('finder.filter') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    priceMin: priceMin,
                    priceMax: priceMax,
                    qty: qty,
                    timeline: timeline
                },
                dataType: "json",
                success: function(response) {

                    // console.log(response);

                    $('#listpro').html('')

                    let html_pro = '';
                    let tag = '';

                    let unique_response = [...new Map(response.map(item => [item['conf_mainproduct_id'], item])).values()];

                    let count = unique_response.length;

                    let img_show = '';

                    $.each(unique_response, function(index, value) {

                        if (value.tag.length > 0) {

                            let unique_tag = [...new Map(value.tag.map(item => [item['conf_mainproduct_tag_name_th'], item])).values()];


                            $.each(unique_tag, function(index, value) {

                                tag += `<span class="badge rounded-pill bg-info text-white">${value.conf_mainproduct_tag_name_th}</span>`

                            });

                        }

                        if (value.conf_subproduct_days == null) {
                            value.conf_subproduct_days = '';
                        }

                        if(value.conf_mainproduct_quota == null){
                            value.conf_mainproduct_quota = '';
                        }

                        if(value.conf_mainproduct_price == null){
                            value.conf_mainproduct_price = '';
                        }

                        if(value.conf_subproduct_img1 == null){
                            img_show = value.conf_mainproduct_img1;
                        }else{
                            img_show = value.conf_subproduct_img1;
                        }

                        // console.log(tag);


                        html_pro += `<div class="col-lg-2 col-6 col-grid-box">
               <input type="checkbox" id="my-checkbox${index}" name="check_product[]" value="${value.conf_mainproduct_id}" class="d-none" onclick="countProduct()">
                                                    <label class="product-box" for="my-checkbox${index}">
                                                        <div class="img-wrapper mb-1">
                                                            <div class="front">
                                                               <img src="${img_show}" class="img-fluid lazyload bg-img" alt=""> 
                                                            </div>
                                                            <div class="back">
                                                               <img src="${img_show}" class="img-fluid lazyload bg-img" alt=""> 
                                                            </div>                                                                                                      
                                                        </div>
                                                        <span class="product-tag">
                                                            ${tag}
                                                        </span>        
                                                        <div class="product-detail" style="text-align: left;">

                                                            <h6 class="mt-1">${value.conf_mainproduct_name_th}</h6>
                                                            <h4 class="mt-1">${value.conf_mainproduct_price}</h4>                                                        
                                                            <h6 class="mt-1">สั่งขั้นต่ำ ${value.conf_mainproduct_quota} ชิ้น</h6>
                                                            <h6 class="mt-1">ส่งภายใน ${value.conf_subproduct_days} วัน</h6>

                                                           
                                                        </div>
                                                    </label>
                                                </div>`

                                                tag = '';
                    });


                    setTimeout(() => {
                        $('#listpro').html(html_pro)
                        $('#rs_count').html('Found ' + count + ' products')
                        $('.loading').attr('hidden', 'hidden');
                    }, 1000);
                },
                error: function(response) {

                    // console.log(response);


                }
            });
        }
    }


    loadData = () => {

        let product = $('input[name="check_product[]"]:checked').map(function() {
            return this.value;
        }).get();

        if(product.length == 0){

            Swal.fire({
            icon: 'error',
            title: 'กรุณาเลือกสินค้า',
            showConfirmButton: false,
            timer: 1500
        })

    }else{

        $.ajax({
                url: "{{ route('finder.preview') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    product: product
                },
                dataType: "json",
                success: function(response) {
// console.log(response);
                    let preview = '';

                    let img1 = '';
                    let img2 = '';
                    let img3 = '';
                    let img4 = '';

            
                    $.each(response, function(index, value) {

                        if(value.conf_mainproduct_remark_en == null){
                            value.conf_mainproduct_remark_en = '';
                        }

                        if(value.conf_mainproduct_remark_th == null){
                            value.conf_mainproduct_remark_th = '';
                        }

                        if(value.conf_subproduct_price1 < 0 || value.conf_subproduct_price1 == '.00' || value.conf_subproduct_price1 == null){
                            value.conf_subproduct_price1 = '-';
                        }

                        if(value.conf_subproduct_price2 < 0 || value.conf_subproduct_price2 == '.00' || value.conf_subproduct_price2 == null){
                            value.conf_subproduct_price2 = '-';
                        }

                        if(value.conf_subproduct_price3 < 0 || value.conf_subproduct_price3 == '.00' || value.conf_subproduct_price3 == null){
                            value.conf_subproduct_price3 = '-';
                        }

                        if(value.conf_subproduct_price4 < 0 || value.conf_subproduct_price4 == '.00' || value.conf_subproduct_price4 == null){
                            value.conf_subproduct_price4 = '-';
                        }

                        if(value.conf_subproduct_price5 < 0 || value.conf_subproduct_price5 == '.00' || value.conf_subproduct_price5 == null){
                            value.conf_subproduct_price5 = '-';
                        }

                        if(value.conf_subproduct_img1 == null){
                            value.conf_subproduct_img1 = value.conf_mainproduct_img1;
                        }

                        if(value.conf_subproduct_img2 == null){
                            value.conf_subproduct_img2 = value.conf_mainproduct_img2;
                        }

                        if(value.conf_subproduct_img3 == null){
                            value.conf_subproduct_img3 = value.conf_mainproduct_img3;
                        }

                        if(value.conf_subproduct_img4 == null){
                            value.conf_subproduct_img4 = value.conf_mainproduct_img4;
                        }
                        

                    

                        preview += `                               
<div class='page-break-after'  style="font-size: 13px !important;">
<div class="row" style="margin-top:10px;">
  <div class="col-5">
  <div class="w3-content" style="height:fit-content !important;margin-top: 50px">
  <img class="mySlides" src="${value.conf_subproduct_img1}" style="width:100%;height:100%;object-fit: contain">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s4">
      <img src="${value.conf_subproduct_img2}" style="width:100%">
    </div>
    <div class="w3-col s4">
      <img src="${value.conf_subproduct_img3}" style="width:100%">
    </div>
    <div class="w3-col s4">
      <img src="${value.conf_subproduct_img4}" style="width:100%">
    </div>
  </div>
</div>
  </div>
  <div class="col-7">
  <div class="row">
  <div class="col-12">
    <label class="form-label">Product Code</label>
    <input type="text" class="form-control input-catalog" value="${value.conf_mainproduct_code}" style="font-size: 18px;" disabled>
  </div>
  <div class="col-12">
    <label class="form-label">Product Name</label>
    <input type="text" class="form-control input-catalog" value="${value.conf_mainproduct_name_th}" style="font-size: 16px;" disabled>
  </div>
  <div class="col-12">
    <label class="form-label">Product Detail</label>
    <textarea type="text" class="form-control input-catalog" value="" disabled style="height:240px;font-size: 16px;">
    ${value.conf_mainproduct_remark_th}
    </textarea>
  </div>
  </div>
</div>
</div>
</div>`;

                    });


                    $('.preview-list').html(preview);






                },
                error: function(response) {

                    // console.log(response);

                }

            });


    }

    }

    countProduct = () => {

        let product = $('input[name="check_product[]"]:checked').map(function() {
            return this.value;
        }).get();

        let count = product.length;

        $('.download-list').html('<i class="fa fa-download" aria-hidden="true"></i> ดาวน์โหลดแคตตาล็อกที่เลือก (' + count + ')')


        }

        downLoadList = () => {
            let product = $('input[name="check_product[]"]:checked').map(function() {
            return this.value;
        }).get();

        if(product.length == 0){

            Swal.fire({
            icon: 'error',
            title: 'กรุณาเลือกสินค้า',
            showConfirmButton: false,
            timer: 1500
        })

    }
    else if(product.length > 20){

        Swal.fire({
            icon: 'error',
            title: 'สามารถเลือกสินค้าได้ไม่เกิน 20 รายการ',
            showConfirmButton: false,
            timer: 1500
        })

    }else{

        $('#form-download').submit();



        }



        }


        // downloadAll = () =>{

        //     $('input[name="check_product[]"]').prop('checked', true);


        //     setTimeout(() => {
        //         downLoadList();
        //         Swal.fire({
        //         title: 'Please wait...',
        //         html: 'Downloading all products',
        //         timerProgressBar: true,
        //         didOpen: () => {
        //             Swal.showLoading()
        //         },
        //         willClose: () => {
        //             clearInterval(timerInterval)
        //         }
        //         }).then((result) => {
        //         if (
        //             /* Read more about handling dismissals below */
        //             result.dismiss === Swal.DismissReason.timer
        //         ) {
        //             // console.log('I was closed by the timer')
        //         }
        //         })

        //     }, 1000);

        

        // }
</script>