@extends('layouts.home')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/price-range.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/fontawesome.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/themify-icons.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    :root {
        --background-color1: #fafaff;
        --background-color2: #ffffff;
        --background-color3: #ededed;
        --background-color4: #cad7fda4;
        --primary-color: #4b49ac;
        --secondary-color: #0c007d;
        --Border-color: #3f0097;
        --one-use-color: #3f0097;
        --two-use-color: #5500cb;
    }

    body {
        max-width: 100%;
        overflow-x: hidden;
    }


    .logo {
        font-size: 27px;
        font-weight: 600;
        color: rgb(47, 141, 70);
    }

    .icn {
        height: 30px;
    }

    .menuicn {
        cursor: pointer;
    }

    .searchbar,
    .message,
    .logosec {
        display: flex;
        align-items: center;
        justify-content: left;
    }

    .searchbar2 {
        display: none;
    }

    .logosec {
        gap: 60px;
        margin-bottom: 20px;
    }

    .searchbar input {
        width: 250px;
        height: 42px;
        border-radius: 50px 0 0 50px;
        background-color: var(--background-color3);
        padding: 0 20px;
        font-size: 15px;
        outline: none;
        border: none;
    }

    .searchbtn {
        width: 50px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 0px 50px 50px 0px;
        background-color: var(--secondary-color);
        cursor: pointer;
    }

    .menuicns {
        display: none;
    }



    .message {
        gap: 40px;
        position: relative;
        cursor: pointer;
    }

    .circle {
        height: 7px;
        width: 7px;
        position: absolute;
        background-color: #fa7bb4;
        border-radius: 50%;
        left: 19px;
        top: 8px;
    }

    .dp {
        height: 40px;
        width: 40px;
        background-color: #626262;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .main-container {
        display: flex;
        width: 100vw;
        top: 70px;
        z-index: 1;
    }

    .dpicn {
        height: 42px;
    }

    .main {
        height: calc(100vh - 70px);
        width: 100%;
        overflow-y: scroll;
        overflow-x: hidden;
        padding: 40px 30px 30px 30px;
    }

    .main::-webkit-scrollbar-thumb {
        background-image:
            linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
    }

    .main::-webkit-scrollbar {
        width: 5px;
    }

    .main::-webkit-scrollbar-track {
        background-color: #9e9e9eb2;
    }

    .box-container {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        flex-wrap: wrap;
        gap: 50px;
    }

    .nav {

        min-height: 91vh;
        width: 350px;
        position: absolute;
        top: 0px;
        left: 00;
        /* box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825); */
        display: flex;
        /* flex-direction: column;  */
        justify-content: space-between;
        overflow: hidden;
        padding: 30px 0 20px 10px;
    }

    .navcontainer {
        height: calc(100vh - 70px);
        width: 350px;
        position: relative;
        overflow-y: scroll;
        overflow-x: hidden;
        transition: all 0.5s ease-in-out;
        background-color: #E8FEFF;

    }

    .navcontainer::-webkit-scrollbar {
        display: none;
    }

    .navclose {
        width: 80px;
    }

    .nav-option {
        width: 250px;
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0 30px 0 20px;
        gap: 20px;
        transition: all 0.1s ease-in-out;
    }

    .nav-option:hover {
        border-left: 5px solid #a2a2a2;
        background-color: #00C2C7;
        cursor: pointer;
    }

    .nav-img {
        height: 30px;
    }


    .nav-hidden {
        display: none;
    }

    .nav-upper-options {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 30px;
    }

    .option1 {
        border-left: 5px solid #00C2C7;
        background-color: #00C2C7;
        color: white;
        cursor: pointer;
    }

    .option1:hover {
        border-left: 5px solid #00C2C7;
        background-color: #00C2C7;
    }

    .box {
        height: 130px;
        width: 230px;
        border-radius: 20px;
        box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    .box:hover {
        transform: scale(1.08);
    }

    .box:nth-child(1) {
        background-color: var(--one-use-color);
    }

    .box:nth-child(2) {
        background-color: var(--two-use-color);
    }

    .box:nth-child(3) {
        background-color: var(--one-use-color);
    }

    .box:nth-child(4) {
        background-color: var(--two-use-color);
    }

    .box img {
        height: 50px;
    }

    .box .text {
        color: white;
    }

    .topic {
        font-size: 13px;
        font-weight: 400;
        letter-spacing: 1px;
    }

    .topic-heading {
        font-size: 30px;
        letter-spacing: 3px;
    }

    .report-container {
        min-height: 300px;
        max-width: 1200px;
        margin: 70px auto 0px auto;
        background-color: #ffffff;
        border-radius: 30px;
        box-shadow: 3px 3px 10px rgb(188, 188, 188);
        padding: 0px 20px 20px 20px;
    }

    .report-header {
        height: 80px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 20px 10px 20px;
        border-bottom: 2px solid rgba(0, 20, 151, 0.59);
    }

    .recent-Articles {
        font-size: 30px;
        font-weight: 600;
        color: #5500cb;
    }

    .view {
        height: 35px;
        width: 90px;
        border-radius: 8px;
        background-color: #5500cb;
        color: white;
        font-size: 15px;
        border: none;
        cursor: pointer;
    }

    .report-body {
        max-width: 1160px;
        overflow-x: auto;
        padding: 20px;
    }

    .report-topic-heading,
    .item1 {
        width: 1120px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .t-op {
        font-size: 18px;
        letter-spacing: 0px;
    }

    .items {
        width: 1120px;
        margin-top: 15px;
    }

    .item1 {
        margin-top: 20px;
    }

    .t-op-nextlvl {
        font-size: 14px;
        letter-spacing: 0px;
        font-weight: 600;
    }

    .label-tag {
        width: 100px;
        text-align: center;
        background-color: rgb(0, 177, 0);
        color: white;
        border-radius: 4px;
    }

    @media screen and (max-width: 950px) {
        .nav-img {
            height: 25px;
        }

        .nav-option {
            gap: 30px;
        }

        .nav-option h4 {
            font-size: 15px;
        }

        .nav-hidden {
            gap: 30px;
        }

        .nav-hidden {
            font-size: 15px;
        }

        .report-topic-heading,
        .item1,
        .items {
            width: 800px;
        }
    }

    @media screen and (max-width: 850px) {
        .nav-img {
            height: 30px;
        }

        .nav-option {
            gap: 30px;
        }

        .nav-option h4 {
            font-size: 20px;
        }

        .nav-hidden {
            gap: 30px;
        }

        .nav-hidden {
            font-size: 20px;
        }

        .nav-hidden {
            width: 250px;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 30px 0 20px;
            gap: 20px;
            transition: all 0.1s ease-in-out;
        }

        .report-topic-heading,
        .item1,
        .items {
            width: 700px;
        }

        .navcontainer {
            width: 100vw;
            position: absolute;
            transition: all 0.6s ease-in-out;
            top: 0;
            left: -100vw;
        }

        .nav {
            width: 100%;
            position: absolute;
        }

        .navclose {
            left: 00px;
        }

        .searchbar {
            display: none;
        }

        .main {
            padding: 40px 30px 30px 30px;
        }

        .searchbar2 {
            width: 100%;
            display: flex;
            margin: 0 0 40px 0;
            justify-content: center;
        }

        .searchbar2 input {
            width: 250px;
            height: 42px;
            border-radius: 50px 0 0 50px;
            background-color: var(--background-color3);
            padding: 0 20px;
            font-size: 15px;
            border: 2px solid var(--secondary-color);
        }

        .menuicns {
            display: flex;
            margin: 0 0 40px 0;
            justify-content: right;
        }
    }

    @media screen and (max-width: 490px) {
        .message {
            display: none;
        }

        .logosec {
            width: 100%;
            justify-content: space-between;
        }

        .logo {
            font-size: 20px;
        }

        .menuicn {
            height: 25px;
        }

        .nav-img {
            height: 25px;
        }

        .nav-option {
            gap: 25px;
        }

        .nav-option h4 {
            font-size: 12px;
        }

        .nav-hidden {
            width: 250px;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 30px 0 20px;
            gap: 20px;
            transition: all 0.1s ease-in-out;
        }

        .nav-hidden {
            gap: 25px;
        }

        .nav-hidden {
            font-size: 12px;
        }

        .nav-upper-options {
            gap: 15px;
        }

        .recent-Articles {
            font-size: 20px;
        }

        .report-topic-heading,
        .item1,
        .items {
            width: 550px;
        }
    }

    @media screen and (max-width: 400px) {
        .recent-Articles {
            font-size: 17px;
        }

        .view {
            width: 60px;
            font-size: 10px;
            height: 27px;
        }

        .report-header {
            height: 60px;
            padding: 10px 10px 5px 10px;
        }

        .searchbtn img {
            height: 20px;
        }
    }

    @media screen and (max-width: 320px) {
        .recent-Articles {
            font-size: 12px;
        }

        .view {
            width: 50px;
            font-size: 8px;
            height: 27px;
        }

        .report-header {
            height: 60px;
            padding: 10px 5px 5px 5px;
        }

        .t-op {
            font-size: 12px;
        }

        .t-op-nextlvl {
            font-size: 10px;
        }

        .report-topic-heading,
        .item1,
        .items {
            width: 300px;
        }

        .report-body {
            padding: 10px;
        }

        .label-tag {
            width: 70px;
        }

        .searchbtn {
            width: 40px;
        }

        .searchbar2 input {
            width: 180px;
        }
    }

    h4 {
        color: black m !important;
    }

    .customer-product {
        height: 228px !important;
        width: 228px !important;
        border-radius: 10px;
    }

    .ms-n5 {
        margin-left: -40px;
    }

    .mr-input {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .qty-box .input-group {
        width: 80px !important;
        -webkit-box-flex: unset !important;
        -ms-flex: unset !important;
        flex: unset !important;
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

    .product-tag {
        color: #FF5733;
        /* Adjust the tag color */
        font-weight: bold;
    }

    .badge {
        background-color: #E8FEFF;
        color: #00C2C7;
    }

  
    .productbox {
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    vertical-align: middle;
    }
</style>
@endsection
@section('content')


<div class="main-container">
    @include('layouts.menu-customer')
    <div class="main">
        <div class="logosec">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">
        </div>

        <!-- breadcrumb start -->
        <div class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h3 class="text-black">
                                @if (app()->getLocale() == 'th')
                                คำสั่งซื้อทั้งหมด ({{ $count_confirm }} รายการ)
                                @else
                                All Orders ({{ $count_confirm }} items)                            
                                @endif
                            </h3>
                        </div>
                    </div>                     
                    <div class="col-sm-6">
                    
                    </div>

                </div>
            </div>
        </div>
        
        <!-- breadcrumb End -->


        <div class="product-wrapper-grid">
            <div class="row margin-res">
            @foreach($production_all as $product)
                <div class="col-lg-3 col-6 col-grid-box">
                    <div class="productbox">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="#" onclick="productDetail({{ $product->sal_confirmorder_dt_id }})"><img src="https://erp.giftwise.co.th/{{$product->sal_confirmorder_dt_imgpic}}" class="img-fluid customer-product" alt=""></a>
                            </div>                      
                        </div>
                        <div class="product-detail">
                            <div>
                                <h5>{{ Str::limit($product->ms_product_name1, 30) }}</h5>
                            </div>
                            <br>
                            <div>
                                <h6>สถานะ/Status  <span class="badge">{{ $product->webconfirmorder_status_name }}</span></h6>
                                <h6>โดย/By  {{ $product->ms_customersub_name }}</h6>
                                <h6>จำนวนผลิต/Quantity  {{ number_format($product->sal_confirmorder_dt_qty,2) }} {{ $product->ms_product_unit_name }}</h6>
                                <h6>ราคารวม/Total  {{ number_format($product->sal_confirmorder_dt_netamount, 2) }} บาท</h6>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>





    </div>
</div>



<!--modal quick quotation start-->
<div class="modal fade bd-example-modal theme-modal" id="productDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body modal1">
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-12">
                <div class="modal-bg">

                  <!-- button close right -->
                  <div class="close-circle" style="text-align: right;" id="hd-con">


                  </div>

                  <div class="hs-toast-wrapper  hs-toast-fixed-top ">รายละเอียดสินค้า</div>


                  <div class="offer-content row">
                  <div class="col-5">
                    <div id="pd_slick">
                          
                        </div>
                        <div class="row">
                            <div class="col-12 p-0" id="pd_nav">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-7">
                      <div class="offer-content-box">
                        <span id="pd_title"><h3>ขวดน้ำสแตนเลสมินิมอลแบบมีหูจับ ก้นขวดแสตนเลส</h3> <h6>รหัสสินค้า: GS026-S</h6></span>                      
                        <hr>
                        <div style="margin: 10px;">
                        <h4 id="docs_no">เลขที่ Order: 123456</h4>
                        <div class="row">
                            <div class="col-4">
                                <h6>ราคาต่อชิ้น</h6>
                                <h4 style="color:#007275" id="price_sku"></h4>
                            </div>
                            <div class="col-4">
                                <h6>จำนวนที่สั่ง</h6>
                                <h4 style="color:#007275" id="qty_sku"></h4>
                            </div>
                            <div class="col-4">
                                <h6>ราคารวม</h6>
                                <h4 style="color:#007275" id="totalprice"></h4>
                            </div>                  
                        </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-12">

                            <div class="tracking">
                <div class="title">
                    @if (app()->getLocale() == 'th')
                    สถานะ
                    @else
                    Status
                    @endif
                </div>
            </div>
            <div class="progress-track">
            <ul id="progressbar">
                  
                </ul>
            </div>


                            </div>                                           
                        </div>




                        <div style="margin: 10px;">
                        <h4 style="color:#007275">รายละเอียดเพิ่มเติม</h4>
                        <div class="row">
                            <div class="col-4">
                                <h6 style="color:black">รายการ</h6>
                            
                            </div>
                            <div class="col-4">
                                <h6 style="color:black">รายละเอียด</h6>
                                <div id="docs_detail"></div>
                            </div>
                            <div class="col-4">
                                <h6 style="color:black">วันที่</h6>
                                <h6 id="date_docs"></h6>
                            </div>
                        <div style="text-align: right;margin-top:10px;" id="bt_action">
                           
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
    </div>
  </div>
</div>


@endsection


@section('script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script src="{{ asset('assets/frontend/multikart/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.30.1/moment.min.js"></script>



<script>
    let menuicn = document.querySelector(".menuicn");
    let nav = document.querySelector(".navcontainer");
    let menuicns = document.querySelector(".menuicns");

    menuicn.addEventListener("click", () => {
        nav.classList.toggle("navclose");
    })
    menuicns.addEventListener("click", () => {
        nav.classList.toggle("navclose");
    })


    $(document).ready(function() {
        $('.menu-cus3').removeClass('option');
        $('.menu-cus3').addClass('option1');
    });


    $('.quolist').click(function() {
        location.href = "/{{ app()->getLocale() }}/customer/quotation";
    });
    $('.quosend').click(function() {
        location.href = "/{{ app()->getLocale() }}/customer/quotation-send";
    });


    productDetail = (ref) => {
        
        $('.slick-next').trigger('click');
    
    
        $.ajax({
            url: "{{ url('customer/modal/production-confirm-detail') }}",
            type: 'post',
            data: {
                _token: "{{ csrf_token() }}",
                ref: ref
            },
            dataType: 'json',
            success: function(data) {
    
                // console.log(data);
    
    
                $('#productDetail').modal('show');
                $('#pd_title').html(`<h3>${data[0].ms_product_name1}</h3> <h6>รหัสสินค้า: ${data[0].ms_product_code}</h6>`);
                $('#docs_no').html(`Order : ` + data[0].sal_confirmorder_hd_docuno);
                $('#price_sku').html(`฿ ${addComma(parseFloat(data[0].sal_confirmorder_dt_price))}`);
                $('#qty_sku').html(`${addComma(parseFloat(data[0].sal_confirmorder_dt_qty))} ${data[0].ms_product_unit_name}`);
                $('#totalprice').html(`${addComma(parseFloat(data[0].sal_confirmorder_dt_netamount))} บาท`);
                let date = moment(data[0].deliverydocu_hd_date).format('DD MMM YYYY');
                $('#date_docs').html(date);
    
                    $('#pd_slick').html(`
                    <div class="product-slick">
                                    <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                    <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                    <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                    <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                    </div>
                    `);
        
                    $('#pd_nav').html(`
                                    <div class="slider-nav">
                                        <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                        <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                        <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                        <div><img src="https://erp.giftwise.co.th/${data[0].sal_confirmorder_dt_imgpic}" alt="" class="img-fluid"></div>
                                    </div>
                    `);
    
                    let file = ``;
    
            
                    if(data[0].quotation != null) {
                            file += `
                            <a href="javascript:void(0)" id="download-quo" style="color: #007275;font-size: 12px;" onclick="downloadQuo(${data[0].quotation.sal_quotation_hd_id})">
                                <i class="fa fa-file-pdf-o"></i> ${data[0].quotation.sal_quotation_hd_docuno}.pdf
                            </a>`;
                  
                    } 
    
    
                    file += `<br>`;
    
                    if(data[0].sal_confirmorder_hd_docuno != null) {
                        file += `
                        <a href="javascript:void(0)" target="_blank" style="color: #007275;font-size: 12px;" onclick="downloadCo(${data[0].sal_confirmorder_dt_id}, ${data[0].sal_confirmorder_hd_id})">
                            <i class="fa fa-file-pdf-o"></i> ${data[0].sal_confirmorder_hd_docuno}.pdf
                        </a>`;
                    }
    
                    if(data[0].inv != null) {
                        file += `
                        <a href="javascript:void(0)" target="_blank" style="color: #007275;font-size: 12px;" onclick="downloadInv(${data[0].quotation.sal_quotation_hd_id})">
                            <br>
                            <i class="fa fa-file-pdf-o"></i> ${data[0].inv.invoice_docuno}.pdf
                        </a>`;
                    }
                      
    
            
    
                    setTimeout(() => {
                        $('.product-slick').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        fade: true,
                        asNavFor: '.slider-nav'
                    });
    
                    $('.slider-nav').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        asNavFor: '.product-slick',
                        dots: false,
                        centerMode: true,
                        focusOnSelect: true
                    }); 
                    
                    $('#docs_detail').html(file);
    
                }, 500);
        
              
    
                $('#hd-con').html(`
                <a href="javascript:void(0)" class="share p-4" onclick="generateLink(${data[0].sal_confirmorder_dt_id})">
                    <i class="fas fa-share-alt"></i>
                </a>
                <button type="button" class="btn-close c-m-l" data-bs-dismiss="modal" aria-label="Close"></button>
                `);
            
    
    
    
            },
            error: function(data) {
                // console.log('Error:', data);
            }
        });
    
    
        }

        addComma = (num) => {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    }

    downloadQuo = (ref) => {
        window.location.href = "{{ url('customer/download-quotation') }}/" + ref;
    }

    downloadCo = (ref, hd) => {
        window.location.href = "{{ url('customer/download-co') }}/" + ref + '/' + hd;
    }

    downloadInv = (ref) => {
        window.location.href = "{{ url('customer/download-invoice') }}/" + ref;
    }



    generateLink = (ref) => {


$.ajax({
    url: "{{ url('/customer/generate-link-product') }}",
    type: 'post',
    data: {
        _token: "{{ csrf_token() }}",
        ref: ref
    },
    dataType: 'json',
    success: function(data) {

        Swal.fire({
        html: `
            <img src="{{ asset('assets/frontend/images/profile_customer/icon-suc.png') }}" style="width: 50px;">
            <br><br>
            สร้างลิงค์สำเร็จ
            <br>
            <small>ลิงค์สำหรับแชร์ข้อมูลสินค้า</small>`,
            confirmButtonText: 'ปิด',
            input: 'text',
            inputLabel: 'Link expires 1 day',
            inputValue: `{{ url('/customer/product-link') }}/${data.token}`,
            inputAttributes: {
                readonly: true,
                disabled: true,
            },
            showCancelButton: true,
            confirmButtonText: 'Copy',
            showLoaderOnConfirm: true,
            preConfirm: (url) => {

                if(url) {
                    navigator.clipboard.writeText(url);
                    setTimeout(() => {
                        Swal.fire({
                            html: `
                            <img src="{{ asset('assets/frontend/images/profile_customer/icon-suc.png') }}" style="width: 50px;">
                            <br><br>
                            คัดลอกลิงค์สำเร็จ
                            <br>
                            <small>คัดลอกลิงค์สำเร็จแล้ว</small>`,
                            confirmButtonText: 'ปิด'
                        });
                    }, 500);
                }
                    

            }

    });


     


    }
});

}


</script>
@endsection