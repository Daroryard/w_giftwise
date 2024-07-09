@extends('layouts.home')
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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

    .stepwizard-step p {
        margin-top: 0px;
        color: #666;
    }

    .stepwizard-row {
        display: table-row;
    }

    .stepwizard {
        display: table;
        width: 100%;
        position: relative;
    }

    .stepwizard-step button[disabled] {
        /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
    }

    .stepwizard .btn.disabled,
    .stepwizard .btn[disabled],
    .stepwizard fieldset[disabled] .btn {
        opacity: 1 !important;
        color: #bbb;
    }

    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-index: 0;
    }

    .stepwizard-step {
        display: table-cell;
        text-align: center;
        position: relative;
    }

    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .has-error .help-block {
        color: #f00;
    }

    .btn {
        line-height: 20px !important;
        text-transform: uppercase !important;
        font-size: 14px !important;
        font-weight: 700 !important;
        border-radius: 15px !important;
        -webkit-transition: 0.3s ease-in-out !important;
        transition: 0.3s ease-in-out !important;
    }

    .colorstep {
        background-color: #00C2C7;
        color: #fff;
        border: none
    }

    .inradius {
        border-radius: 10px !important;
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
            </div>
            <div class="row" style="margin-top: 30px;">
                <div class="checkout-page section-content-contact">
                    <div class="checkout-form">
                        <form>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-xs-12 el-suc">
                                    <div class="stepwizard">
                                        <div class="stepwizard-row setup-panel">
                                            <div class="stepwizard-step col-xs-3">
                                                <a href="#step-1" type="button" class="first-s btn-circle colorstep">1</a>
                                                <p><small>{{__('validation.contact_step1')}}</small></p>
                                            </div>
                                            <div class="stepwizard-step col-xs-3">
                                                <a href="#step-2" type="button" class=" btn-default btn-circle colorstep" disabled="disabled">2</a>
                                                <p><small>{{__('validation.contact_step2')}}</small></p>
                                            </div>
                                        </div>
                                    </div>

                                    <form role="form">
                                        <div class="panel panel-primary setup-content" id="step-1">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">{{__('validation.contact_title')}}</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <input maxlength="100" type="text" required="required" class="form-control inradius" placeholder="{{__('validation.contact_title_input_name')}}" id="con_pj_name" />
                                                    <span class="noti-pj-name" style="color:red;" hidden>{{__('validation.contact_alert_name')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_purpose')}}</label>
                                                    <select class="form-control inradius" id="con_pj_ob_name">
                                                        <option value="" selected>select</option>
                                                        <option value="{{__('validation.contact_title_select_purpose1')}}">{{__('validation.contact_title_select_purpose1')}}</option>
                                                        <option value="{{__('validation.contact_title_select_purpose2')}}">{{__('validation.contact_title_select_purpose2')}}</option>
                                                        <option value="{{__('validation.contact_title_select_purpose3')}}">{{__('validation.contact_title_select_purpose3')}}</option>
                                                        <option value="{{__('validation.contact_title_select_purpose5')}}">{{__('validation.contact_title_select_purpose4')}}</option>
                                                        <option value="{{__('validation.contact_title_select_purpose6')}}">{{__('validation.contact_title_select_purpose5')}}</option>
                                                    </select>
                                                    <span class="noti-pj-ob-name" style="color:red;" hidden>{{__('validation.contact_alert_purpose')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_theme')}}</label>
                                                    <select class="form-control multiple-them inradius" multiple="multiple" name="con_pj_them[]" id="con_pj_them">
                                                        <option value="ทันสมัย Modern">ทันสมัย Modern</option>
                                                        <option value="หรูหรา Elegant/Luxury">หรูหรา Elegant/Luxury</option>
                                                        <option value="ดูพิเศษและแตกต่าง Unique">ดูพิเศษและแตกต่าง Unique</option>
                                                        <option value="เรียบๆน้อยๆ Minimal Clean & Simple">เรียบๆน้อยๆ Minimal Clean & Simple</option>
                                                        <option value="รักษ์โลก Eco">รักษ์โลก Eco</option>
                                                        <option value="ทั่วไป Classic">ทั่วไป Classic</option>
                                                        <option value="เทคโนโลยี Technology">เทคโนโลยี Technology</option>
                                                    </select>
                                                    <span class="noti-pj-them" style="color:red;" hidden>{{__('validation.contact_alert_theme')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_productlooking')}}</label>
                                                    <select class="form-control inradius" id="con_pj_product">
                                                        <option value="" selected>select</option>
                                                        <option value="แก้วน้ำ/Glass">แก้วน้ำ/Glass</option>
                                                        <option value="ขวดน้ำ/Bottle">ขวดน้ำ/Bottle</option>
                                                        <option value="เสื้อ/shirt">เสื้อ/shirt</option>
                                                    </select>
                                                    <span class="noti-pj-product" style="color:red;" hidden>{{__('validation.contact_alert_productlooking')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_productqty')}}</label>
                                                    <select class="form-control inradius" id="con_pj_amount">
                                                        <option value="" selected>select</option>
                                                        <option value="ต่ำกว่า/under 50 ชิ้น/Piece">ต่ำกว่า/under 50 ชิ้น/piece</option>
                                                        <option value="50 ชิ้น/piece">50 ชิ้น/piece</option>
                                                        <option value="100 ชิ้น/piece">100 ชิ้น/piece</option>
                                                        <option value="300 ชิ้น/piece">300 ชิ้น/piece</option>
                                                        <option value="500 ชิ้น/piece">500 ชิ้น/piece</option>
                                                        <option value="1000 ชิ้น/piece">1000 ชิ้น/piece</option>
                                                        <option value="มากกว่า/More than 1000 ชิ้น/Piece">มากกว่า/more than 1000 ชิ้น/piece</option>
                                                    </select>
                                                    <span class="noti-pj-amount" style="color:red;" hidden>{{__('validation.contact_alert_productqty')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_production_time')}}</label>
                                                    <select class="form-control inradius" id="con_pj_time">
                                                        <option value="" selected>select</option>
                                                        <option value="พร้อมส่ง/Ready">พร้อมส่ง/Ready</option>
                                                        <option value="ภายใน/within 7 วัน/day">ภายใน/within 7 วัน/day</option>
                                                        <option value="ภายใน/within 14 วัน/day">ภายใน/within 14 วัน/day</option>
                                                        <option value="ภายใน/within 21 วัน/day">ภายใน/within 21 วัน/day</option>
                                                        <option value="ภายใน/within 30 วัน/day">ภายใน/within 30 วัน/day</option>
                                                    </select>
                                                    <span class="noti-pj-time" style="color:red;" hidden>{{__('validation.contact_alert_production_time')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_description')}}</label>
                                                    <textarea class="form-control inradius" placeholder="{{__('validation.contact_title_input_description_input')}}" rows="4" id="con_pj_detail" style="height:100px"></textarea>
                                                </div>
                                                <button class="btn btn-solid  nextBtn pull-right" style="background-color:#00C2C7;color:#fff;border-radius: 10px;" type="button">{{__('validation.contact_title_button_next')}}</button>
                                            </div>
                                        </div>

                                        <div class="panel panel-primary setup-content" id="step-2">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">{{__('validation.contact_title_company')}}</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_contact_name')}}</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control inradius" placeholder="{{__('validation.contact_title_input_contact_name')}}" id="con_name" />
                                                    <span class="noti-con-name" style="color:red;" hidden>{{__('validation.contact_alert_input_contact_name')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_contact_company')}}</label>
                                                    <input maxlength="200" type="text" required="required" class="form-control inradius" placeholder="{{__('validation.contact_title_input_contact_company')}}" id="con_company" />
                                                    <span class="noti-con-company" style="color:red;" hidden>{{__('validation.contact_alert_input_contact_company')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_contact_tel')}}</label>
                                                    <input maxlength="20" type="text" required="required" class="form-control inradius" placeholder="{{__('validation.contact_title_input_contact_tel')}}" id="con_tel" />
                                                    <span class="noti-con-tel" style="color:red;" hidden>{{__('validation.contact_alert_input_contact_tel')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_contact_email')}}</label>
                                                    <input maxlength="50" type="text" required="required" class="form-control inradius" placeholder="{{__('validation.contact_title_input_contact_email')}}" id="con_email" />
                                                    <span class="noti-con-email" style="color:red;" hidden>{{__('validation.contact_alert_input_contact_email')}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">{{__('validation.contact_title_input_contact_detail')}}</label>
                                                    <textarea class="form-control inradius" placeholder="{{__('validation.contact_title_input_contact_detail_input')}}" rows="4" id="con_detail" style="height:100px"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" id="con_help" name="con_help"> &ensp;
                                                    <label for="ft_quo_option">{{__('validation.contact_title_input_contact_checkbox')}}</label>
                                                </div>
                                                <button class="btn form-control btn-send" style="background-color:#00C2C7;color:#fff;border-radius: 10px;" type="button">{{__('validation.contact_title_button_send')}}</button>
                                            </div>
                                        </div>

                                    </form>
                                    


                                </div>





                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-6 col-xs-12 text-center">
                                        <img src="{{ asset('assets/images/contact/img_contact.jpg') }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {

        $('.multiple-them').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
        allBackBtn = $('.prevBtn');

        allWells.hide();

        navListItems.click(function(e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function() {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            let con_pj_name = $('#con_pj_name').val();
            let con_pj_ob_name = $('#con_pj_ob_name').val();
            let con_pj_them = $('#con_pj_them').val();
            let con_pj_product = $('#con_pj_product').val();
            let con_pj_amount = $('#con_pj_amount').val();
            let con_pj_time = $('#con_pj_time').val();
            let con_pj_detail = $('#con_pj_detail').val();

            if (con_pj_name == '') {

                $('.noti-pj-name').removeAttr('hidden');
                $('#con_pj_name').addClass('border border-danger');

            }
            if (con_pj_ob_name == '') {

                $('.noti-pj-ob-name').removeAttr('hidden');
                $('#con_pj_ob_name').addClass('border border-danger');

            }
            if (con_pj_them == '') {

                $('.noti-pj-them').removeAttr('hidden');
                $('#con_pj_them').addClass('border border-danger');

            }
            if (con_pj_product == '') {

                $('.noti-pj-product').removeAttr('hidden');
                $('#con_pj_product').addClass('border border-danger');

            }
            if (con_pj_amount == '') {

                $('.noti-pj-amount').removeAttr('hidden');
                $('#con_pj_amount').addClass('border border-danger');

            }
            if (con_pj_time == '') {

                $('.noti-pj-time').removeAttr('hidden');
                $('#con_pj_time').addClass('border border-danger');

            }

            if (con_pj_name != '' && con_pj_ob_name != '' && con_pj_them != '' && con_pj_product != '' && con_pj_amount != '' && con_pj_time != '') {

                $('.noti-pj-name').attr('hidden', true);
                $('#con_pj_name').removeClass('border border-danger');

                $('.noti-pj-ob-name').attr('hidden', true);
                $('#con_pj_ob_name').removeClass('border border-danger');

                $('.noti-pj-them').attr('hidden', true);
                $('#con_pj_them').removeClass('border border-danger');

                $('.noti-pj-product').attr('hidden', true);
                $('#con_pj_product').removeClass('border border-danger');

                $('.noti-pj-amount').attr('hidden', true);
                $('#con_pj_amount').removeClass('border border-danger');

                $('.noti-pj-time').attr('hidden', true);
                $('#con_pj_time').removeClass('border border-danger');

                nextStepWizard.removeAttr('disabled').trigger('click');

            }


        });




        $('div.setup-panel div a.first-s').trigger('click');

    });


    $('.btn-send').click(function() {

        let con_pj_name = $('#con_pj_name').val();
        let con_pj_ob_name = $('#con_pj_ob_name').val();
        let con_pj_them = $('#con_pj_them').val();
        let con_pj_product = $('#con_pj_product').val();
        let con_pj_amount = $('#con_pj_amount').val();
        let con_pj_time = $('#con_pj_time').val();
        let con_pj_detail = $('#con_pj_detail').val();
        let con_name = $('#con_name').val();
        let con_company = $('#con_company').val();
        let con_tel = $('#con_tel').val();
        let con_email = $('#con_email').val();
        let con_detail = $('#con_detail').val();
        let con_help = $('#con_help').val();

        if (con_pj_name == '') {

            $('.noti-pj-name').removeAttr('hidden');
            $('#con_pj_name').addClass('border border-danger');

        }
        if (con_pj_ob_name == '') {

            $('.noti-pj-ob-name').removeAttr('hidden');
            $('#con_pj_ob_name').addClass('border border-danger');

        }
        if (con_pj_them == '') {

            $('.noti-pj-them').removeAttr('hidden');
            $('#con_pj_them').addClass('border border-danger');

        }
        if (con_pj_product == '') {

            $('.noti-pj-product').removeAttr('hidden');
            $('#con_pj_product').addClass('border border-danger');

        }
        if (con_pj_amount == '') {

            $('.noti-pj-amount').removeAttr('hidden');
            $('#con_pj_amount').addClass('border border-danger');

        }
        if (con_pj_time == '') {

            $('.noti-pj-time').removeAttr('hidden');
            $('#con_pj_time').addClass('border border-danger');

        }

        if (con_name == '') {

            $('.noti-con-name').removeAttr('hidden');
            $('#con_name').addClass('border border-danger');

        }

        if (con_company == '') {

            $('.noti-con-company').removeAttr('hidden');
            $('#con_company').addClass('border border-danger');
        }

        if (con_tel == '') {

            $('.noti-con-tel').removeAttr('hidden');
            $('#con_tel').addClass('border border-danger');

        }

        if (con_email == '') {

            $('.noti-con-email').removeAttr('hidden');
            $('#con_email').addClass('border border-danger');

        }


        if(con_pj_name != '' && con_pj_ob_name != '' && con_pj_them != '' && con_pj_product != '' && con_pj_amount != '' && con_pj_time != '' && con_name != '' && con_company != '' && con_tel != '' && con_email != ''){

            $('.noti-pj-name').attr('hidden', true);
            $('#con_pj_name').removeClass('border border-danger');

            $('.noti-pj-ob-name').attr('hidden', true);
            $('#con_pj_ob_name').removeClass('border border-danger');

            $('.noti-pj-them').attr('hidden', true);
            $('#con_pj_them').removeClass('border border-danger');

            $('.noti-pj-product').attr('hidden', true);
            $('#con_pj_product').removeClass('border border-danger');

            $('.noti-pj-amount').attr('hidden', true);
            $('#con_pj_amount').removeClass('border border-danger');

            $('.noti-pj-time').attr('hidden', true);
            $('#con_pj_time').removeClass('border border-danger');

            $('.noti-con-name').attr('hidden', true);
            $('#con_name').removeClass('border border-danger');

            $('.noti-con-company').attr('hidden', true);
            $('#con_company').removeClass('border border-danger');

            $('.noti-con-tel').attr('hidden', true);
            $('#con_tel').removeClass('border border-danger');

            $('.noti-con-email').attr('hidden', true);
            $('#con_email').removeClass('border border-danger');


        $.ajax({
            url: "{{ url('/contact-store') }}",
            type: "POST",
            data: {
                con_pj_name:con_pj_name,
                con_pj_ob_name:con_pj_ob_name,
                con_pj_them:con_pj_them,
                con_pj_product:con_pj_product,
                con_pj_amount:con_pj_amount,
                con_pj_time:con_pj_time,
                con_pj_detail:con_pj_detail,
                con_name:con_name,
                con_company:con_company,
                con_tel:con_tel,
                con_email:con_email,
                con_detail:con_detail,
                con_help:con_help,
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success:function(response){



                if(response.status == 'success'){
                  $('.el-suc').html(`
                  <div id="f-q-q" style="text-align: center;margin-top:28%" >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 128 128" fill="none">
                                    <g clip-path="url(#clip0_346_27773)">
                                    <path d="M64 127.959C99.3462 127.959 128 99.324 128 64.001C128 28.6779 99.3462 0.0429688 64 0.0429688C28.6538 0.0429688 0 28.6779 0 64.001C0 99.324 28.6538 127.959 64 127.959Z" fill="#32BEA6"/>
                                    <path d="M58.8694 98.019L28.6094 74.445L37.2134 63.403L55.7954 77.879L86.4634 33.625L97.9714 41.597L58.8694 98.019Z" fill="white"/>
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
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('home') }}" class="btn btn-block" style="background-color:#fff;color:black;border-radius: 10px;">กลับหน้าหลัก</a>
                                        </div>
                                    </div>
                                    </div>
                  `)

                }else{
                    toastr.warning(
                    'กรุณาลองใหม่อีกครั้ง',
                    'เกิดข้อผิดพลาด',
                    {
                        closeButton: true,
                        "positionClass": "toast-top-center"

                    })
                }

            }
        });

    }





    });
</script>
@endsection