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
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="page-content">
            <div class="row">
                @include('layouts.searchbar')
            </div>
            <div class="section-content-manual-product" style="margin-top:25px !important">
                <div class="row">
                    <div class="row">
                        <span class="h3">
                            {{ __('validation.guide_title_menual') }}
                        </span><br>
                        <span class="h6" style="color : #ccc;">
                            {{ __('validation.guide_title_menual_description') }}
                        </span>
                    </div><br><br>
                    <div class="row">
                        @foreach ($cat as $item)
                        <div class="col-12 col-md-4 mt-3">
                            <div class="card review-card">
                                <img src="{{ $item->conf_category_img1 }}" class="card-img-top img-fluid"
                                    alt="Reviewer Image" style="width: 100%;">
                                <div class="card-body">
                                    @if(app()->getLocale() == 'th')
                                    <span class="h5">
                                        {{ $item->conf_category_name_th }}
                                    </span>
                                    <p class="card-text review-caption">
                                        {{ $item->conf_category_remark_th }}
                                    </p>
                                    @else
                                    <span class="h5">
                                        {{ $item->conf_category_name_en }}
                                    </span>
                                    <p class="card-text review-caption">
                                        {{ $item->conf_category_remark_en }}
                                    </p>
                                    @endif
                                    <a href="/{{app()->getLocale()}}/userflow/{{$item->conf_category_id}}/-" class="btn btn-light btn-lg">
                                        {{ __('validation.guide_button_detail') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- <div class="col-12 col-md-4">
                    <div class="card review-card">
                        <img src="{{ asset('assets/frontend/images/pic11.png') }}" class="card-img-top img-fluid"
                        alt="Reviewer Image" style="width: 100%;">
                        <div class="card-body">
                            <span class="h5">
                                กระบอกน้ำแก้วน้ำ
                            </span>
                            <p class="card-text review-caption">
                                มีสินค้ามากกว่า 100 แบบ พร้อมฟรี สกรีนโลโก้
                            </p>
                            <p class="card-text review-caption">
                                ครบวงจร
                            </p>
                            <button type="button" class="btn btn-light btn-lg">ดูรายละเอียด</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card review-card">
                        <img src="{{ asset('assets/frontend/images/pic22.png') }}" class="card-img-top img-fluid"
                            alt="Reviewer Image" style="width: 100%;">
                        <div class="card-body">
                            <span class="h5">
                                ร่ม
                            </span>
                            <p class="card-text review-caption">
                                บริการ รับทำร่ม / ผลิตร่มสกรีนโลโก้ มีทีมงานที่มีความชำนาญ
                            </p>
                            <p class="card-text review-caption">
                                ให้คำปรึกษาทุกขั้นตอน
                            </p>
                            <button type="button" class="btn btn-light btn-lg">ดูรายละเอียด</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card review-card">
                        <img src="{{ asset('assets/frontend/images/pic33.png') }}" class="card-img-top img-fluid"
                            alt="Reviewer Image" style="width: 100%;">
                        <div class="card-body">
                            <span class="h5">
                                Giftset
                            </span>
                            <p class="card-text review-caption">
                                บริการผลิตชุด Gift Set ของขวัญของพรีเมี่ยม ที่มีความพิเศษตรงตาม
                            </p>
                            <p class="card-text review-caption">
                                ความต้องการของลูกค้า
                            </p>
                            <button type="button" class="btn btn-light btn-lg">ดูรายละเอียด</button>
                        </div>
                    </div>
                </div> --}}
            </div><br>
            <pr><br>
                {{-- <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card review-card">
                        <img src="{{ asset('assets/frontend/images/pic44.png') }}" class="card-img-top img-fluid"
                alt="Reviewer Image" style="width: 100%;">
                <div class="card-body">
                    <span class="h5">
                        แฟลชไดร์ฟ
                    </span>
                    <p class="card-text review-caption">
                        ผลิตแฟลชไดร์ฟในราคาโรงงาน ภายใน 10 วัน พร้อม
                    </p>
                    <p class="card-text review-caption">
                        บริการสกรีนโลโก้
                    </p>
                    <button type="button" class="btn btn-light btn-lg">ดูรายละเอียด</button>
                </div>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card review-card">
            <img src="{{ asset('assets/frontend/images/pic55.png') }}" class="card-img-top img-fluid"
                alt="Reviewer Image" style="width: 100%;">
            <div class="card-body">
                <span class="h5">
                    หมวก
                </span>
                <p class="card-text review-caption">
                    รับทำหมวกและผลิตหมวกครบวงจร พร้อมให้คำ ปรึกษาและ
                </p>
                <p class="card-text review-caption">
                    ดูแลทุกขั้นตอน
                </p>
                <button type="button" class="btn btn-light btn-lg">ดูรายละเอียด</button>
            </div>
        </div>
    </div>
</div> --}}
<div class="row" onclick="window.location.href='/{{ app()->getLocale() }}/contact'">
    <div class="col-12">
        <div class="top-banner-wrapper">
            <img src="{{ asset('assets/frontend/images/banner.png') }}" class="img-fluid lazyload" alt="" style="width: 100%;">
        </div>
    </div>
</div>

<div class="row" style="box-sizing: border-box;background: var(--primary-section-bg, #f9fafb);
            padding: 36px 0px 36px 0px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            align-items: center;
            justify-content: flex-start;
            align-self: stretch;
            flex-shrink: 0;
            position: relative;">
    <span class="h4">
        <center>{{ __('validation.guide_title_contact') }} </center>
    </span>
    <center>
        <div class="row">
            <div class="col-12 col-md-12">
                <a href="https://line.sable.asia/?liff.state=%3Fbrand_id%3D667e1d62d4c9926054666c66%26liffId%3D2000050020-M0A1ylNA%26sable_webhook_path%3DSBE-30tlblz58i2vxgfc4ddf-sable%26sable_redirect_url%3Dhttps%253A%252F%252Flin.ee%252FDPKPM71%26s_visitorId%3D547fb443-74ac-458d-9552-81134e734f7d&liff.referrer=https%3A%2F%2Fgiftwiseasia.com%2F" target="_blank">
                    <svg class="layer-2" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 36C27.9411 36 36 27.9411 36 18C36 8.05887 27.9411 0 18 0C8.05887 0 0 8.05887 0 18C0 27.9411 8.05887 36 18 36Z" fill="#39CD00" />
                        <path d="M29.25 17.5927C29.234 17.8213 29.2046 18.0487 29.162 18.2738C29.0197 19.1358 28.7283 19.9664 28.3009 20.7284C28.0964 21.0925 27.1125 22.4752 26.8118 22.8393C25.1489 24.8418 22.363 27.1531 17.7075 29.4011C17.6093 29.4485 17.5002 29.4689 17.3915 29.4602C17.2827 29.4515 17.1783 29.4139 17.0889 29.3514C16.9995 29.2889 16.9284 29.2037 16.8829 29.1046C16.8374 29.0055 16.8191 28.896 16.83 28.7875L17.0652 26.6745C17.083 26.5129 17.0359 26.3508 16.9343 26.2238C16.8327 26.0969 16.6848 26.0155 16.5232 25.9975C14.9744 25.8425 13.4658 25.4124 12.0682 24.7272C8.87727 23.1502 6.75 20.3336 6.75 17.1243C6.75 12.1825 11.7859 8.18359 18 8.18359C21.1214 8.18359 23.9441 9.20632 25.9773 10.8284C27.8816 12.3522 29.1007 14.4202 29.2316 16.7152C29.2534 17.0071 29.2596 17.3001 29.25 17.5927Z" fill="white" />
                        <path d="M14.9002 19.1054C14.9546 19.1586 14.9977 19.2223 15.0268 19.2926C15.056 19.3629 15.0707 19.4384 15.0699 19.5145C15.0702 19.5902 15.0555 19.6651 15.0268 19.7351C14.998 19.8051 14.9557 19.8687 14.9023 19.9223C14.8489 19.9758 14.7855 20.0184 14.7156 20.0474C14.6457 20.0764 14.5708 20.0913 14.4952 20.0913H12.194C12.0412 20.0908 11.8948 20.0298 11.7867 19.9218C11.6787 19.8137 11.6177 19.6673 11.6172 19.5145V15.1679C11.6167 15.0918 11.6315 15.0164 11.6606 14.9462C11.6898 14.8759 11.7327 14.8122 11.787 14.7588C11.8675 14.6781 11.9702 14.6231 12.082 14.6009C12.1939 14.5786 12.3098 14.5902 12.4151 14.6341C12.5204 14.6779 12.6102 14.7521 12.6732 14.8472C12.7362 14.9422 12.7694 15.0539 12.7688 15.1679V18.9377H14.4952C14.5705 18.9371 14.6451 18.9517 14.7147 18.9805C14.7842 19.0093 14.8473 19.0518 14.9002 19.1054Z" fill="#00C200" />
                        <path d="M16.7749 15.0438V19.6399C16.7744 19.7591 16.7268 19.8732 16.6425 19.9575C16.5582 20.0418 16.4441 20.0894 16.3249 20.0899H16.0672C15.9478 20.0899 15.8334 20.0425 15.749 19.9581C15.6646 19.8737 15.6172 19.7593 15.6172 19.6399V15.0438C15.6172 14.9244 15.6646 14.81 15.749 14.7256C15.8334 14.6412 15.9478 14.5938 16.0672 14.5938H16.3188C16.3783 14.5932 16.4374 14.6045 16.4926 14.6268C16.5477 14.6492 16.598 14.6822 16.6403 14.724C16.6827 14.7658 16.7164 14.8156 16.7395 14.8705C16.7626 14.9253 16.7746 14.9842 16.7749 15.0438Z" fill="#00C200" />
                        <path d="M22.1167 15.1686V19.4906C22.1168 19.6461 22.0564 19.7955 21.9484 19.9074C21.8404 20.0192 21.6932 20.0847 21.5378 20.09C21.3922 20.0876 21.2528 20.0307 21.1471 19.9304C21.1267 19.9141 20.3535 18.9077 19.6969 18.0609C19.206 17.4288 18.7805 16.8766 18.7805 16.8766V19.5131C18.7809 19.6249 18.7487 19.7343 18.6879 19.8281C18.627 19.9218 18.5402 19.9958 18.438 20.0409C18.3357 20.0861 18.2226 20.1004 18.1123 20.0823C18.002 20.0641 17.8995 20.0142 17.8171 19.9386C17.7577 19.8848 17.7103 19.8191 17.6779 19.7458C17.6455 19.6726 17.6288 19.5933 17.629 19.5131V15.1931C17.6271 15.0413 17.6835 14.8945 17.7866 14.783C17.8897 14.6715 18.0317 14.6038 18.1833 14.5938C18.269 14.5924 18.3541 14.61 18.4322 14.6454C18.5104 14.6808 18.5797 14.733 18.6353 14.7984C18.6599 14.827 19.8483 16.3734 20.5171 17.2529C20.783 17.5966 20.9671 17.8379 20.9671 17.8379V15.1788C20.9682 15.0267 21.0291 14.8811 21.1367 14.7736C21.2442 14.666 21.3898 14.6051 21.5419 14.6041C21.6926 14.604 21.8373 14.6632 21.9448 14.7688C22.0523 14.8744 22.114 15.0179 22.1167 15.1686Z" fill="#00C200" />
                        <path d="M24.1382 17.9166V18.9393H25.8625C25.941 18.9346 26.0196 18.9461 26.0936 18.9729C26.1675 18.9997 26.2352 19.0414 26.2924 19.0953C26.3496 19.1492 26.3952 19.2143 26.4264 19.2865C26.4576 19.3587 26.4737 19.4365 26.4737 19.5151C26.4737 19.5938 26.4576 19.6716 26.4264 19.7438C26.3952 19.816 26.3496 19.881 26.2924 19.9349C26.2352 19.9889 26.1675 20.0305 26.0936 20.0573C26.0196 20.0842 25.941 20.0956 25.8625 20.0909H23.5552C23.4026 20.0904 23.2564 20.0294 23.1487 19.9212C23.041 19.8131 22.9805 19.6667 22.9805 19.5141V15.1695C22.981 15.0173 23.0417 14.8714 23.1494 14.7637C23.2571 14.656 23.403 14.5953 23.5552 14.5948H25.8564C25.9349 14.5901 26.0135 14.6015 26.0874 14.6283C26.1614 14.6552 26.229 14.6968 26.2863 14.7507C26.3435 14.8047 26.3891 14.8697 26.4203 14.9419C26.4515 15.0141 26.4675 15.0919 26.4675 15.1706C26.4675 15.2492 26.4515 15.327 26.4203 15.3992C26.3891 15.4714 26.3435 15.5365 26.2863 15.5904C26.229 15.6443 26.1614 15.686 26.0874 15.7128C26.0135 15.7396 25.9349 15.751 25.8564 15.7464H24.1382V16.7691H25.8625C26.015 16.7691 26.1612 16.8296 26.2689 16.9374C26.3767 17.0452 26.4373 17.1914 26.4373 17.3439C26.4373 17.4963 26.3767 17.6425 26.2689 17.7503C26.1612 17.8581 26.015 17.9186 25.8625 17.9186L24.1382 17.9166Z" fill="#00C200" />
                    </svg>
                </a>
                <a href="https://web.facebook.com/giftwiseasia" target="_blank">
                    <svg class="group" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 36C27.9411 36 36 27.9411 36 18C36 8.05888 27.9411 0 18 0C8.05888 0 0 8.05888 0 18C0 27.9411 8.05888 36 18 36Z" fill="#3B5998" />
                        <path d="M22.5254 18.706H19.3135V30.4728H14.4472V18.706H12.1328V14.5706H14.4472V11.8946C14.4472 9.98095 15.3562 6.98438 19.3568 6.98438L22.9614 6.99946V11.0135H20.346C19.917 11.0135 19.3138 11.2278 19.3138 12.1407V14.5745H22.9505L22.5254 18.706Z" fill="white" />
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@giftwiseofficial" target="_blank">
                    <svg class="tiktok-1" width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_46_23563)">
                            <path d="M18 0C8.06041 0 0 8.06041 0 18C0 27.9396 8.06041 36 18 36C27.9396 36 36 27.9396 36 18C36 8.06041 27.9396 0 18 0ZM27.0302 13.7723V16.2096C25.881 16.21 24.7643 15.9848 23.7112 15.5405C23.034 15.2546 22.4031 14.8862 21.8261 14.4411L21.8434 21.9429C21.8361 23.6322 21.1678 25.2193 19.9582 26.4149C18.9738 27.388 17.7265 28.0068 16.3745 28.2071C16.0568 28.2542 15.7335 28.2783 15.4066 28.2783C13.9594 28.2783 12.5854 27.8094 11.4614 26.9445C11.2499 26.7816 11.0476 26.6051 10.8551 26.4149C9.54415 25.1192 8.86816 23.3632 8.982 21.5159C9.06884 20.1097 9.63183 18.7687 10.5704 17.7176C11.8121 16.3266 13.5492 15.5546 15.4066 15.5546C15.7335 15.5546 16.0568 15.5791 16.3745 15.6262V16.5273V19.0341C16.0733 18.9347 15.7516 18.8801 15.4166 18.8801C13.7197 18.8801 12.3469 20.2646 12.3723 21.9627C12.3884 23.0493 12.9819 23.9991 13.8573 24.5226C14.2687 24.7687 14.7419 24.9211 15.247 24.9488C15.6427 24.9706 16.0227 24.9154 16.3745 24.7993C17.5869 24.3988 18.4615 23.26 18.4615 21.9169L18.4655 16.8933V7.72172H21.822C21.8252 8.0543 21.859 8.37879 21.9217 8.69323C22.175 9.96595 22.8924 11.0701 23.8909 11.8229C24.7615 12.4796 25.8455 12.8688 27.0205 12.8688C27.0213 12.8688 27.031 12.8688 27.0302 12.868V13.7723H27.0302Z" fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_46_23563">
                                <rect width="36" height="36" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
        </div>
    </center>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
<script src="{{ asset('assets/backend/libs/jquery/jquery.min.js') }}"></script>
{{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script>
</script>
@endsection