@extends('layouts.home')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/price-range.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/fontawesome.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/themify-icons.css') }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
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
    .customer-product{
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
    .badge-active {
        background-color: #E8FEFF;
        color: #00C2C7;
    }
    .badge-none {
        background-color: #F2F4F7;
        color: #000;
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
                        <h3 class="text-black">{{ __('validation.cart_title') }} (<small>{{ $sku_cart }}</small>)</h3>
                    </div>
                    <span class="product-tag quolist">               
                            @if (app()->getLocale() == 'th')
                            <span class="badge badge-active">ขอใบเสนอราคา</span>
                            @else
                            <span class="badge badge-active">Request Quotation</span>
                            @endif                        
                    </span>
                    <span class="product-tag quosend">           
                            @if (app()->getLocale() == 'th')
                            <span class="badge badge-none">ใบเสนอราคาที่ส่งแล้ว</span>
                            @else
                            <span class="badge badge-none">Quotation sent</span>
                            @endif                        
                    </span>
                    <span class="product-tag quocancel">             
                            @if (app()->getLocale() == 'th')
                            <span class="badge badge-none">ยกเลิกการขอแล้ว</span>
                            @else
                            <span class="badge badge-none">Cancel request</span>
                            @endif                        
                    </span>
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->



        @if($cart_count == 0)
    <!-- emty cart start -->
    <section class="cart-section section-b-space" style="margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                <img src="{{asset('assets/frontend/images/cart/shopping-list 1.png') }}" class="img-fluid">
                <br><br>
                <h3>{{ __('validation.cart_mess_no_product1') }}</h3>
                    <p>{{ __('validation.cart_mess_no_product2') }}</p>
                    <a href="{{ url('/') }}" class="btn btn-solid" style="background: #fff !important;border: 1px solid grey !important;color: #000 !important;">{{ __('validation.cart_button_home') }}</a>
                    <a href="/{{ app()->getLocale() }}/product-quick" class="btn btn-solid">{{ __('validation.cart_button_idea') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- emty cart end -->
    @endif
    
    @if($cart_count > 0)
    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table cart-table table-responsive-xs">
                        <thead>
                            <tr class="table-head">
                                <th scope="col"></th>
                                <th scope="col">{{ __('validation.cart_product') }}</th>
                                <th scope="col">{{ __('validation.cart_price') }}</th>
                                <th scope="col">{{ __('validation.cart_qty') }}</th>
                                <th scope="col">{{ __('validation.cart_total_price') }}</th>
                                <th scope="col">{{ __('validation.cart_delete') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                            <tr>
                                <td>
                                    <a href="#"><img src="{{ $item->options->img }}" alt=""></a>
                                </td>
                                <td style="text-align: left;">
                                    {{ $item->name }}<br>
                                    สี : {{ $item->options->subproduct['color'] }}<br>
                                    ตัวเลือกสกรีน : {{ $item->options->addon['name'] }}<br>
                                    ระยะเวลาผลิต : {{ $item->options->totalday }} วันทำการ<br>
                                    บรรจุภัณฑ์ : {{ $item->options->packaging['name'] }}<br>


                                    <div class="mobile-cart-content row">
                                        <div class="col-xs-3">
                                            <div class="qty-box">
                                                <div>
                                                <h2>{{ $item->qty }}</h2>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color">{{ number_format($item->options->subproduct['price'],2) }}</h2>
                                        </div>
                                        <div class="col-xs-3">
                                            <h2 class="td-color"><a href="#" class="icon"><i class="ti-close"></i></a>
                                            </h2>
                                        </div>
                                    </div>

                                    
                                </td>
                                <td>
                                    <h2>{{ number_format($item->options->subproduct['price'],2) }}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <center>
                                        <div><h2>{{ $item->qty }}</h2>                                        
                                        </div>
                                        </center>
                                    </div>
                                </td>
                                <td>
                                    <h2 class="td-color">฿{{ number_format(($item->options->subproduct['price'] * $item->qty),2) }}</h2>
                                </td>
                                <td><a href="#" class="icon" onclick="delCart('{{ $item->options->subproduct['id'] }}')"><i class="ti-close"></i></a></td>

                            </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    <table class="table cart-table table-responsive-xs">
                        <tfoot>
                            <tr>
                                <td style="text-align:left;width:60% !important;" colspan="3"><b>{{ __('validation.cart_ans_list_product') }}</b></td>
                                <td>{{ __('validation.cart_net_price') }}<br> <h3 style="color:#00C2C7" colspan="2">฿{{ number_format($net_totalprice_cart,2) }}</h3></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row cart-buttons mt-3">
                <center>
                @if($cart_count > 0)
                <div class="col-12"><a href="#" class="btn btn-solid bt-send-quo" style="background-color:#00C2C7;color:#fff" data-bs-toggle="modal" data-bs-target="#frm-quo">{{ __('validation.cart_button_quotation') }}</a></div>
                @endif
                </center>
            </div>
        </div>
    </section>
    <!--section end-->  
    @endif
    </div>
</div>


 <!--modal quick quotation start-->
 <div class="modal fade bd-example-modal theme-modal" id="frm-quo" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg">

                                   <!-- button close right -->
                                   <div class="close-circle mt-5" style="text-align: right;">
                                        
                                      <button type="button" class="btn-close close-m" data-bs-dismiss="modal"
                                         aria-label="Close"></button>
                                   </div>
                                   
                                    <div class="hs-toast-wrapper  hs-toast-fixed-top " id="example"></div>


                                    <div class="offer-content el-q-q">
                                        <h2 class="mr-input" style="margin-left: 10px;">ขอใบเสนอราคา</h2>
                                      
                                            <div class="form-group mx-sm-3">   
                                                <label for="message_detail">ข้อมูล</label>                                 
                                                <input type="text" class="form-control mr-input" id="fm-fullname" placeholder="ชื่อผู้ติดต่อ" required="required">
                                                <span class="error al_fm_fullname" style="color:red"></span>                                            
                                                <input type="text" class="form-control mr-input" id="fm-company" placeholder="ชื่อบริษัท" required="required">
                                                <span class="error al_fm_company" style="color:red"></span>
                                                <input type="text" class="form-control mr-input" id="fm-tel" placeholder="เบอร์โทรศัพท์" required="required">
                                                <span class="error al_fm_tel" style="color:red"></span>
                                                <input type="text" class="form-control mr-input" id="fm-companyemail" placeholder="อีเมลบริษัท" required="required">
                                                <span class="error al_fm_companyemail" style="color:red"></span>
                                                <input type="text" class="form-control mr-input" id="fm-taxid" placeholder="เลขประจำตัวผู้เสียภาษี" required="required">
                                                <span class="error al_fm_taxid" style="color:red"></span>
                                                <label for="message_address">ที่อยู่</label>
                                                <input type="text" class="form-control mr-input" id="fm-address" placeholder="ที่อยู่" required="required">
                                                <span class="error al_fm_address" style="color:red"></span>
                                                <input type="text" class="form-control mr-input" id="fm-district" placeholder="ตำบล/แขวง" required="required">
                                                <span class="error al_fm_district" style="color:red"></span>    
                                                <input type="text" class="form-control mr-input" id="fm-amphoe" placeholder="อำเภอ/เขต" required="required">
                                                <span class="error al_amphoe" style="color:red"></span>      
                                                <input type="text" class="form-control mr-input" id="fm-province" placeholder="จังหวัด" required="required">
                                                <span class="error al_fm_province" style="color:red"></span>
                                                <input type="text" class="form-control mr-input" id="fm-zipcode" placeholder="รหัสไปรษณีย์" required="required">
                                                <span class="error al_fm_zipcode" style="color:red"></span>
                                                <label for="quick_message_remark">รายละเอียดอื่นๆ</label>
                                                <textarea class="form-control" rows="4" cols="50" id="fm-message" placeholder="รายละเอียดอื่นๆ ที่ต้องการเช่น ขอสินค้าตัวอย่างกับสไลด์นำเสนอไม่เกินวันที่ 30 ก.ค. ใช้งานเดือน ก.ย."></textarea>                                          
                                                <input type="checkbox" name="shipping-option" class="mr-input" id="fm_account_option"> &ensp; <label for="quick_account_option">ต้องการให้ทีมงานเราติดต่อกลับไปเพื่อช่วยออกแบบและดูแลโปรเจกต์นี้</label>
                                                <button type="button" class="btn btn-solid form-control mr-input bt-q-quotation" style="background-color:#00C2C7;color:#fff" onclick="saveQuotation()">ขอใบเสนอราคา</button>

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
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>




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
        $('.menu-cus2').removeClass('option');
        $('.menu-cus2').addClass('option1');
    });

    $('.quosend').click(function() {
        location.href = "/{{ app()->getLocale() }}/customer/quotation-send";
    });
    $('.quocancel').click(function() {
        location.href = "/{{ app()->getLocale() }}/customer/quotation-cancel";
    });








$(document).ready(function(){
    $.Thailand({
    $district: $('#fm-district'),
    $amphoe: $('#fm-amphoe'), 
    $province: $('#fm-province'), 
    $zipcode: $('#fm-zipcode'), 
});

})

$('.close-m').click(function(){

    $('#frm-quo').modal('hide');
   
})

delCart = (ref) => {

    //confirm swal

    Swal.fire({
        title: 'คุณต้องการลบสินค้าใช่หรือไม่ ?',
        text: "คุณต้องการลบสินค้าใช่หรือไม่ ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00C2C7',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {

        $.ajax({
        url: "{{ route('cart.delete') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id: ref
        },
        dataType:'json',
        success: function(data) {

            if (data.status == true) {

                $('.el-q-q').html(`
           <div id="f-q-q" style="text-align: center;">
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
            </div>    
                    `)     


                setTimeout(function() {
                    location.reload();
                }, 5000);


            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'สถานะการลบสินค้า',
                    text: data.msg,
                    showConfirmButton: false,
                    timer: 1500
                })

            }
        }
    });
        }
    })




}

saveQuotation = () => {

    let fm_fullname = $('#fm-fullname').val();
    let fm_company = $('#fm-company').val();
    let fm_tel = $('#fm-tel').val();
    let fm_companyemail = $('#fm-companyemail').val();
    let fm_message = $('#fm-message').val();
    let fm_account_option = $('#fm_account_option').val();
    let fm_taxid = $('#fm-taxid').val();
    let fm_district = $('#fm-district').val();
    let fm_amphoe = $('#fm-amphoe').val();
    let fm_province = $('#fm-province').val();
    let fm_zipcode = $('#fm-zipcode').val();
    let fm_address = $('#fm-address').val();




    if(fm_fullname == ''){

        $('#fm-fullname').css('border', '1px solid red');
        $('.al_fm_fullname').html('กรุณากรอกชื่อผู้ติดต่อ');
        
    }else{
        $('.al_fm_fullname').html('');
        $('#fm-fullname').css('border', '1px solid #ced4da');
    }

    if(fm_company == ''){

        $('#fm-company').css('border', '1px solid red');
        $('.al_fm_company').html('กรุณากรอกชื่อบริษัท');

    }else{

        $('.al_fm_company').html('');
        $('#fm-company').css('border', '1px solid #ced4da');

    }

    if(fm_tel == ''){

        $('#fm-tel').css('border', '1px solid red');
        $('.al_fm_tel').html('กรุณากรอกเบอร์โทรศัพท์');

    }else{

        $('.al_fm_tel').html('');
        $('#fm-tel').css('border', '1px solid #ced4da');

    }

    if(fm_companyemail == ''){

        $('#fm-companyemail').css('border', '1px solid red');
        $('.al_fm_companyemail').html('กรุณากรอกอีเมลบริษัท');

    }else{

        $('.al_fm_companyemail').html('');
        $('#fm-companyemail').css('border', '1px solid #ced4da');

    }

    if(fm_province == ''){

        $('#fm-province').css('border', '1px solid red');
        $('.al_fm_province').html('กรุณากรอกจังหวัด');

    }else{
            
            $('.al_fm_province').html('');
            $('#fm-province').css('border', '1px solid #ced4da');
    
    }

    if(fm_amphoe == ''){

        $('#fm-amphoe').css('border', '1px solid red');
        $('.al_fm_amphoe').html('กรุณากรอกอำเภอ/เขต');

    }else{
            
            $('.al_fm_amphoe').html('');
            $('#fm-amphoe').css('border', '1px solid #ced4da');

    }

    if(fm_address == ''){

        $('#fm-address').css('border', '1px solid red');
        $('.al_fm_address').html('กรุณากรอกที่อยู่');

    }else{
            
            $('.al_fm_address').html('');
            $('#fm-address').css('border', '1px solid #ced4da');

    }



    if(fm_fullname != '' && fm_company != '' && fm_tel != '' && fm_companyemail != '' && fm_province != '' && fm_amphoe != '' && fm_address != ''){

    Swal.fire({
        title: 'คุณต้องการขอใบเสนอราคาใช่หรือไม่ ?',
        text: "คุณต้องการขอใบเสนอราคาใช่หรือไม่ ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#00C2C7',
        cancelButtonColor: '#d33',
        confirmButtonText: 'ใช่',
        cancelButtonText: 'ยกเลิก'
    }).then((result) => {
        if (result.isConfirmed) {

        $.ajax({
        url: "{{ route('quotation.save') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            fm_fullname: fm_fullname,
            fm_company: fm_company,
            fm_tel: fm_tel,
            fm_companyemail: fm_companyemail,
            fm_message: fm_message,
            fm_account_option: fm_account_option,
            fm_taxid: fm_taxid,
            fm_address: fm_address,
            fm_district: fm_district,
            fm_amphoe: fm_amphoe,
            fm_province: fm_province,
            fm_zipcode: fm_zipcode
        },
        dataType:'json',
        success: function(data) {

            if (data.status == true) {
                $('.bt-send-quo').hide();
                $('.el-q-q').html(`
           <div id="f-q-q" style="text-align: center;">
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
            </div>    
                    `)     


                setTimeout(function() {     
        
                    location.reload();
                }, 5000);


            } else {

                Swal.fire({
                    icon: 'error',
                    title: 'สถานะการลบสินค้า',
                    text: data.msg,
                    showConfirmButton: false,
                    timer: 1500
                })



            }
        }

    });
        }
    })


}








}
  



    
</script>
@endsection