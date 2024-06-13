<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Giftwise</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
  @yield('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/color1.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/fontawesome.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/themify-icons.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

</head>
<style>
  body {
    overflow-x: hidden !important;
    font-family: 'Kanit' !important;
  }

  .section-content {
    max-width: 1280px !important;
    margin: auto !important;
  }

  .section-content-slide {
    max-width: 1480px !important;
    margin: auto !important;
  }

  .section-content-product-filter {
    max-width: 1480px !important;
    margin: auto !important;
  }

  .section-content-discovery {
    max-width: 1680px !important;
    margin: auto !important;
  }

  .section-content-finder {
    max-width: 1680px !important;
    margin: auto !important;
  }

  .section-content-product-detail {
    max-width: 1480px !important;
    margin: auto !important;
  }

  .section-content-manual-product {
    max-width: 1680px !important;
    margin: auto !important;
  }

  .section-content-contact {
    max-width: 1680px !important;
    margin: auto !important;
  }

  .section-content-quickproduct {
    max-width: 1680px !important;
    margin: auto !important;
  }

  .section-content-customer {
    max-width: 1680px !important;
    margin: auto !important;
  }

  .container {
    max-width: 1880px !important;
    padding: 10px !important;
  }

  .card-body {
    padding-left: 50px !important;
    padding-right: 50px !important;
  }

  .onhover-div {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
  }

  .onhover-div .show-div {
    top: 45px !important;
    border: 1px solid #ebebeb;
    border-radius: 2px !important;
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

  .loading {
    position: fixed;
    z-index: 999;
    height: 2em;
    width: 2em;
    overflow: visible;
    margin: auto;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
  }

  /* Transparent Overlay */
  .loading:before {
    content: '';
    display: block;
    /* position: fixed; */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  /* :not(:required) hides these rules from IE9 and below */
  .loading:not(:required) {
    /* hide "loading..." text */
    font: 0/0 a;
    color: transparent;
    text-shadow: none;
    background-color: transparent;
    border: 0;

  }


  .loading:not(:required):after {
    content: '';
    display: block;
    font-size: 10px;
    width: 1em;
    height: 1em;
    margin-top: -0.5em;
    -webkit-animation: spinner 1500ms infinite linear;
    -moz-animation: spinner 1500ms infinite linear;
    -ms-animation: spinner 1500ms infinite linear;
    -o-animation: spinner 1500ms infinite linear;
    animation: spinner 1500ms infinite linear;
    border-radius: 0.5em;
    -webkit-box-shadow: #00C2C7 1.5em 0 0 0, #00C2C7 1.1em 1.1em 0 0, #00C2C7 0 1.5em 0 0, #00C2C7 -1.1em 1.1em 0 0, #00C2C7 -1.5em 0 0 0, #00C2C7 -1.1em -1.1em 0 0, #00C2C7 0 -1.5em 0 0, #00C2C7 1.1em -1.1em 0 0;
    box-shadow: #00C2C7 1.5em 0 0 0, #00C2C7 1.1em 1.1em 0 0, #00C2C7 0 1.5em 0 0, #00C2C7 -1.1em 1.1em 0 0, #00C2C7 -1.5em 0 0 0, #00C2C7 -1.1em -1.1em 0 0, #00C2C7 0 -1.5em 0 0, #00C2C7 1.1em -1.1em 0 0;
  }

  /* Animation */

  @-webkit-keyframes spinner {
    0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  @-moz-keyframes spinner {
    0% {
      -webkit-transform: rotate(0deg);
      -moz-transform: rotate(0deg);
      -ms-transform: rotate(0deg);
      -o-transform: rotate(0deg);
      transform: rotate(0deg);
    }

    100% {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  }

  .scroll-list-category {
    overflow-y: scroll;
    max-height: 150px;
  }

  .scroll-list {
    overflow-y: scroll;
    max-height: 150px;
  }

  .list-group-item {
    text-align: left !important;
    border-bottom: none !important;
    color: black !important;
  }

  span.deleteicon {
    position: relative;
    display: inline-flex;
    align-items: center;
  }

  span.deleteicon span {
    position: absolute;
    display: block;
    right: 3px;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    color: #fff;
    background-color: #ccc;
    font: 13px monospace;
    text-align: center;
    line-height: 1em;
    cursor: pointer;
  }

  span.deleteicon input {
    padding-right: 18px;
    box-sizing: border-box;
  }

  .sl-nav {
    display: inline;
  }

  .sl-nav ul {
    margin: 0;
    padding: 0;
    list-style: none;
    position: relative;
    display: inline-block;
  }

  .sl-nav li {
    cursor: pointer;
    padding-bottom: 10px;
  }

  .sl-nav li ul {
    display: none;
  }

  .sl-nav li:hover ul {
    position: absolute;
    top: 29px;
    right: -15px;
    display: block;
    background: #fff;
    width: 120px;
    padding-top: 0px;
    z-index: 1;
    border-radius: 5px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  }

  .sl-nav li:hover .triangle {
    position: absolute;
    top: 15px;
    right: -10px;
    z-index: 10;
    height: 14px;
    overflow: hidden;
    width: 30px;
    background: transparent;
  }

  .sl-nav li:hover .triangle:after {
    content: "";
    display: block;
    z-index: 20;
    width: 15px;
    transform: rotate(45deg) translateY(0px) translatex(10px);
    height: 15px;
    background: #fff;
    border-radius: 2px 0px 0px 0px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
  }

  .sl-nav li ul li {
    position: relative;
    text-align: left;
    background: transparent;
    padding: 15px 15px;
    padding-bottom: 0;
    z-index: 2;
    font-size: 15px;
    color: #3c3c3c;
  }

  .sl-nav li ul li:last-of-type {
    padding-bottom: 15px;
  }

  .sl-nav li ul li span {
    padding-left: 5px;
  }

  .sl-nav li ul li span:hover,
  .sl-nav li ul li span.active {
    color: black;
  }

  .sl-flag {
    display: inline-block;
    box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.4);
    width: 15px;
    height: 15px;
    background: #aaa;
    border-radius: 50%;
    position: relative;
    top: 2px;
    overflow: hidden;
  }

  .flag-de {
    background: url("{{ asset('assets/images/languagelogo/th.png') }}");
    background-size: cover;
    background-position: center center;
  }

  .flag-en {
    background-size: cover;
    background-position: center center;
    background: url("{{ asset('assets/images/languagelogo/th.png') }}");
  }

  p {
    margin-top: none;
    margin-bottom: none;
  }

  a:link {
    text-decoration: none;
    color: #000000;
  }

  a:visited {
    text-decoration: none;
    color: #000000;
  }

  a:hover {
    text-decoration: none;
    color: #000000;
  }

  a:active {
    text-decoration: none;
    color: #000000;
  }
  .slick-prev {
    /* display: none !important; */
  }
  .slick-next {
    /* display: none !important; */

  }
</style>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/frontend/images/giftwise-logo.png') }}" alt="Logo" width="140" height="28" class="img-fluid d-inline-block align-text-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{url('/') }}">{{ __('validation.menu_home') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/{{ app()->getLocale() }}/discover">{{ __('validation.menu_discover') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/{{ app()->getLocale() }}/finder">{{ __('validation.menu_gift_finder') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/{{ app()->getLocale() }}/product-quick">{{ __('validation.menu_quick_product') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/{{ app()->getLocale() }}/userflow">{{ __('validation.menu_menual_product') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/{{ app()->getLocale() }}/contact">{{ __('validation.menu_contact') }}</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#" style="padding-top: 5px;"><img src="{{ asset('assets/images/languagelogo/th.png') }}" alt="Logo" width="20" height="20" class="img-fluid d-inline-block align-text-top"> TH</a>                           
          </li> -->
        </ul>


        <div class="d-flex">
          <button class="btn btn-outline-secondary btn-sm me-2" style="background-color: #F9FAFB; color : #667085;border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ __('validation.menu_quatation_now') }}</button>
          <li class="onhover-div mobile-cart">
            <div>
              <button class="btn btn-sm" style="background-color: #00C2C7; color : white;border-radius: 10px;height:37px">{{ __('validation.menu_quatation_me') }} <span class="badge badge-pill bg-white text-info" id="count-qt" style="padding-right: 0.7em;padding-bottom: 0.4em;display: none;font-weight: bold;"></span></button>
            </div>
            <ul class="show-div shopping-cart">
              @foreach ($cart as $item)
              <li>
                <div class="media">
                  <div class="row">

                    <div class="col-3">
                      <a href="#"><img class="m-3" src="{{ $item->options->img }}" alt="cart product" style="max-width: 50px;"></a>
                    </div>
                    <div class="col-9">
                      <p class="m-3">{{ $item->name }}</p>
                      <p class="m-3">{{ $item->qty }} ชิ้น ฿{{ number_format($item->options->subproduct['price'],2) }}</p>
                    </div>

                  </div>
                </div>
              </li>
              @endforeach
              <li>
                <div class="total">
                  <h5 class="m-3">{{ __('validation.menu_total_price') }} : <span>฿{{ $totalprice_cart }}</span></h5>
                </div>
              </li>
              <li>
                <div style="width: 240px !important;text-align: center;">
                  <button class="btn" style="background-color: #00C2C7;color : white;border-radius: 5px;width: 45%;" onclick="location.href='/{{ app()->getLocale() }}/quotation'">{{ __('validation.menu_view_quotation') }}</button>
                  @if(session('customer') != null)
                  <button class="btn" style="background-color: #00C2C7;color : white;border-radius: 5px;width: 45%;" onclick="location.href='/{{ app()->getLocale() }}/customer/profile'">{{ __('validation.menu_view_profile') }}</button>
                  @else
                  <button class="btn" style="background-color: #00C2C7;color : white;border-radius: 5px;width: 45%;" data-bs-toggle="modal" data-bs-target="#m_customer_login">{{ __('validation.menu_customer_login') }}</button>
                  @endif
                </div>
              </li>
            </ul>
          </li>
          <li class="nav-item" style="margin-top: 5px;">
            <div class="sl-nav">
              <ul>
                <li style="color:#6C757D;margin-left: 5px;">
                  @if(app()->getLocale() == 'th')
                  <img src="{{ asset('assets/images/languagelogo/th.png') }}" alt="Logo" width="20" height="20" class="img-fluid d-inline-block align-text-top">
                  @else
                  <img src="{{ asset('assets/images/languagelogo/en.png') }}" alt="Logo" width="20" height="20" class="img-fluid d-inline-block align-text-top">
                  @endif
                  {{ app()->getLocale() == 'th' ?  'TH' : 'EN' }}
                  <i class="fa fa-angle-down" aria-hidden="true"></i>
                  <div class="triangle"></div>
                  <ul>
                    <li>
                      <img src="{{ asset('assets/images/languagelogo/th.png') }}" alt="Logo" width="20" height="20" class="img-fluid d-inline-block align-text-top">
                      <a href="{{ url('th') }}"><span class="active">TH</span></a>
                    </li>
                    <li>
                      <img src="{{ asset('assets/images/languagelogo/en.png') }}" alt="Logo" width="20" height="20" class="img-fluid d-inline-block align-text-top">
                      <a href="{{ url('en') }}"><span style="color:#1a1a1a">EN</span></a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </li>
        </div>


      </div>
    </div>
  </nav>

  <!--modal quick quotation start-->
  <div class="modal fade bd-example-modal theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body modal1">
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-12">
                <div class="modal-bg">

                  <!-- button close right -->
                  <div class="close-circle" style="text-align: right;">

                    <button type="button" class="btn-close c-m" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="hs-toast-wrapper  hs-toast-fixed-top " id="example"></div>


                  <div class="offer-content el-q-q">
                    <h2 class="mr-input" style="margin-left: 10px;font-family:kanit !important;">{{ __('validation.modal_request_quotation_title') }}</h2>

                    <div class="form-group mx-sm-3">

                      <input type="text" class="form-control mr-input" id="quick_fullname" placeholder="{{ __('validation.modal_request_quotation_name') }}" required="required">
                      <span class="error al_q_fullname" style="color:red"></span>
                      <input type="email" class="form-control mr-input" id="quick_email" placeholder="{{ __('validation.modal_request_quotation_email') }}" required="required">
                      <span class="error al_q_email" style="color:red"></span>
                      <input type="text" class="form-control mr-input" id="quick_company" placeholder="{{ __('validation.modal_request_quotation_company') }}" required="required">
                      <span class="error al_q_company" style="color:red"></span>
                      <input type="text" class="form-control mr-input" id="quick_tel" placeholder="{{ __('validation.modal_request_quotation_phone') }}" required="required">
                      <span class="error al_q_tel" style="color:red"></span>
                      <input type="text" class="form-control mr-input" id="quick_companyemail" placeholder="{{ __('validation.modal_request_quotation_email_company') }}" required="required">
                      <span class="error al_q_companyemail" style="color:red"></span>
                      <br>
                      <label for="quick_message_remark">{{ __('validation.modal_request_quotation_message') }}</label>
                      <textarea class="form-control" rows="4" cols="50" id="quick_message" placeholder="{{ __('validation.modal_request_quotation_text_texarea') }}"></textarea>
                      <label for="quick_message_file">{{ __('validation.modal_request_quotation_upload') }}</label>
                      <div class="file-drop-area">
                        <span class="fake-btn" style="color:#00C2C7">SELECT FILE</span>
                        <span class="file-msg">Select a file or drag and drop here<br>JPG, PNG or PDF, file size no more than 10MB</span>
                        <input class="file-input" type="file" id="quick_file" accept="image/*,.pdf" multiple onchange="quickQuoFile(this)">
                        <div class="item-delete"></div>
                      </div>
                      <input type="checkbox" name="shipping-option" class="mr-input" id="quick_account_option"> &ensp; <label for="quick_account_option">{{ __('validation.modal_request_quotation_checkbox') }}</label>
                      <button type="button" class="btn btn-solid form-control mr-input bt-q-quotation" style="background-color:#00C2C7;color:#fff" onclick="quickQueAdd()">{{ __('validation.modal_request_quotation_send') }}</button>

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




  <!--modal quick quotation start-->
  <div class="modal fade bd-example-modal theme-modal" id="m_customer_login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body modal1">
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-12">
                <div class="modal-bg">

                  <!-- button close right -->
                  <div class="close-circle" style="text-align: right;">

                    <button type="button" class="btn-close c-m-l" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="hs-toast-wrapper  hs-toast-fixed-top " id="example"></div>


                  <div class="offer-content el-q-q text-center">

                    <h2 class="mr-input" style="margin-left: 10px;font-family:kanit !important;">Customer Login</h2>
                    <input type="email" class="form-control mr-input" id="log_email" placeholder="{{ __('validation.modal_request_quotation_email') }}" required="required">
                    <span class="error al_log_email" style="color:red"></span>
                    <input type="password" class="form-control mr-input" id="log_password" placeholder="password" required="required">
                    <span class="error al_log_password" style="color:red"></span>
                    <br>
                    <button type="button" class="btn btn-solid form-control mr-input bt-q-quotation m-login" style="background-color:#00C2C7;color:#fff;width:40%">Login</button>
                    <button type="button" class="btn btn-solid form-control mr-input bt-q-quotation m-reset" style="background-color:#00C2C7;color:#fff;width:40%">Reset</button>

                    <div class="form-group mx-sm-3">



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

  @yield('content')


  <footer class="footer-light" style="background-color: #EBEBEB;color: #878F9E;">
    <section class="section-b-space light-layout">
      <div class="container">
        <div class="row footer-theme partition-f">
          <div class="col-lg-2 col-md-6">

            <div class="footer-contant">
              <div class="footer-logo" style="margin-bottom: 10px">
                <img src="{{ asset('assets/frontend/images/GIFTWISE LOGO-12.png') }}" alt="" style="max-width:190px">
              </div>
              <img src="{{ asset('assets/frontend/images/icon/facebook.png') }}" alt="" width="40px">
              <img src="{{ asset('assets/frontend/images/icon/youtube.png') }}" alt="" width="40px">
            </div>
          </div>
          @foreach ($catmanu as $key => $item)
          <div class="col">
            <div class="sub-title">
              <div class="footer-title">
                @if(app()->getLocale() == 'th')
                <b>{{$item->conf_category_name_th}}</b>
                @else
                <b>{{$item->conf_category_name_en}}</b>
                @endif
              </div>

              @if(in_array($item->conf_category_id, $arr_cate))

              <div class="footer-contant">
                <ul>

                  @foreach ($categorie_sub as $key2 => $sub)

                  @if($item->conf_category_id == $sub->conf_category_id)


                  @if(app()->getLocale() == 'th')

                  <li><a href="{{url('/quickcategorysub/'.$sub->conf_category_id)}}">{{ $sub->conf_categorysub_name_th }}</a></li>

                  @else

                  <li><a href="{{url('/quickcategorysub/'.$sub->conf_category_id)}}">{{ $sub->conf_categorysub_name_en }}</a></li>

                  @endif


                  @endif

                  @endforeach

                  @endif


                </ul>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-md-6 col-sm-12" style="text-align: left;">
            <div class="footer-end">
              <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 GIFTWISEASIA. ALL RIGHT RESERVED.</p>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-sm-12" style="text-align: right;">
            <div class="footer-end">
              <p><a href="#" style="color: #878F9E !important;">Privacy Policy</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#" style="color: #878F9E !important;">Terms of Service</a></p>

            </div>
          </div>

        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>

  @yield('script')

</body>
<div class="loading" hidden> Loading&#8230;</div>

</html>
<script>
  $(document).ready(function() {

    $('input.deletable').wrap('<span class="deleteicon"></span>').after($('<span>x</span>').click(function() {
      $(this).prev('input').val('').trigger('change').focus();
    }));

    $('.loading').removeAttr('hidden');
    setTimeout(function() {
      $('.loading').attr('hidden', 'hidden');
    }, 1000);


    $.ajax({
      url: "{{ route('cart.count') }}",
      type: "GET",
      dataType: "json",
      success: function(data) {
        if (data != null) {
          $('#count-qt').text(data.sku_cart);
          $('#count-qt').show();
        } else {
          $('#count-qt').hide();
        }
      }
    })

  })
  // Drag & Drop file upload
  const $fileInput = $('.file-input');
  const $droparea = $('.file-drop-area');
  const $delete = $('.item-delete');

  $fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
  });

  $fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
  });

  $fileInput.on('change', function() {
    let filesCount = $(this)[0].files.length;
    let $textContainer = $(this).prev();

    if (filesCount === 1) {
      let fileName = $(this).val().split('\\').pop();
      $textContainer.text(fileName);
      $('.item-delete').css('display', 'inline-block');
    } else if (filesCount === 0) {
      $textContainer.text('or drop files here');
      $('.item-delete').css('display', 'none');
    } else {
      $textContainer.text(filesCount + ' files selected');
      $('.item-delete').css('display', 'inline-block');
    }
  });


  $delete.on('click', function() {
    $('.file-input').val(null);
    $('.file-msg').text('or drop files here');
    $('.item-delete').css('display', 'none');
  });

  $('.c-m-l').click(function() {
    $('#m_customer_login').modal('hide');
  });

  $('.c-m').click(function() {
    $('#exampleModal').modal('hide');

    setTimeout(function() {
      $('.el-q-q').html(`
        <h2 class="mr-input" style="margin-left: 10px;font-family:kanit !important;">ขอใบเสนอราคาด่วน</h2>
                                      
                                      <div class="form-group mx-sm-3">
                                          
                                          <input type="text" class="form-control mr-input" id="quick_fullname" placeholder="ชื่อผู้ติดต่อ" required="required">
                                          <span class="error al_q_fullname" style="color:red"></span>
                                          <input type="email" class="form-control mr-input" id="quick_email" placeholder="อีเมล" required="required">
                                          <span class="error al_q_email" style="color:red"></span>
                                          <input type="text" class="form-control mr-input" id="quick_company" placeholder="ชื่อบริษัท" required="required">
                                          <span class="error al_q_company" style="color:red"></span>
                                          <input type="text" class="form-control mr-input" id="quick_tel" placeholder="เบอร์โทรศัพท์" required="required">
                                          <span class="error al_q_tel" style="color:red"></span>
                                          <input type="text" class="form-control mr-input" id="quick_companyemail" placeholder="อีเมลบริษัท" required="required">
                                          <span class="error al_q_companyemail" style="color:red"></span>
                                          <br>
                                          <label for="quick_message_remark">รายละเอียดอื่นๆ</label>
                                          <textarea class="form-control" rows="4" cols="50" id="quick_message" placeholder="รายละเอียดอื่นๆ ที่ต้องการเช่น ขอสินค้าตัวอย่างกับสไลด์นำเสนอไม่เกินวันที่ 30 ก.ค. ใช้งานเดือน ก.ย."></textarea>
                                          <label for="quick_message_file">หรืออัพโหลดไฟล์</label>
                                          <div class="file-drop-area">
                                              <span class="fake-btn" style="color:#00C2C7">SELECT FILE</span>
                                              <span class="file-msg">Select a file or drag and drop here<br>JPG, PNG or PDF, file size no more than 10MB</span>
                                              <input class="file-input" type="file" id="quick_file" accept="image/*,.pdf" multiple onchange="quickQuoFile(this)">
                                              <div class="item-delete"></div>
                                          </div>
                                          <input type="checkbox" name="shipping-option" class="mr-input" id="quick_account_option" > &ensp; <label for="quick_account_option">ต้องการให้ทีมงานเราติดต่อกลับไปเพื่อช่วยออกแบบและดูแลโปรเจกต์นี้</label>
                                          <button type="button" class="btn btn-solid form-control mr-input bt-q-quotation" style="background-color:#00C2C7;color:#fff" onclick="quickQueAdd()">ขอใบเสนอราคา</button>

                                      </div>
        `)
    }, 1000);

  });

  quickQuoFile = (e) => {

    let file = e.files[0];

    if (file.size > 10000000) {
      toastr.warning(
        'ไฟล์ขนาดใหญ่เกิน 10MB',
        'เกิดข้อผิดพลาด', {
          closeButton: true,
          "positionClass": "toast-top-center"

        }
      );

      $('#quick_file').val('');

    }

  }





  quickQueAdd = () => {

    let name = $('#quick_fullname').val();
    let email = $('#quick_email').val();
    let company = $('#quick_company').val();
    let tel = $('#quick_tel').val();
    let companyemail = $('#quick_companyemail').val();

    // check null is border solid red noti icon
    if (name == '') {
      $('#quick_fullname').css('border', '1px solid red');
      $('.al_q_fullname').text('กรุณากรอกชื่อผู้ติดต่อ');
    } else {
      $('#quick_fullname').css('border', '1px solid #ced4da');
      $('.al_q_fullname').text('');
    }

    if (email == '') {
      $('#quick_email').css('border', '1px solid red');
      $('.al_q_email').text('กรุณากรอกอีเมล');
    } else {
      $('#quick_email').css('border', '1px solid #ced4da');
      $('.al_q_email').text('');
    }

    if (company == '') {
      $('#quick_company').css('border', '1px solid red');
      $('.al_q_company').text('กรุณากรอกชื่อบริษัท');
    } else {
      $('#quick_company').css('border', '1px solid #ced4da');
      $('.al_q_company').text('');
    }

    if (tel == '') {
      $('#quick_tel').css('border', '1px solid red');
      $('.al_q_tel').text('กรุณากรอกเบอร์โทรศัพท์');
    } else {
      $('#quick_tel').css('border', '1px solid #ced4da');
      $('.al_q_tel').text('');
    }

    if (companyemail == '') {
      $('#quick_companyemail').css('border', '1px solid red');
      $('.al_q_companyemail').text('กรุณากรอกอีเมลบริษัท');
    } else {
      $('#quick_companyemail').css('border', '1px solid #ced4da');
      $('.al_q_companyemail').text('');
    }


    if (name != '' && email != '' && company != '' && tel != '' && companyemail != '') {

      $('.el-q-q').html();

      quickQuoModal();

      setTimeout(function() {
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


      }, 1000);

    } else {
      toastr.warning(
        'กรุณาลองใหม่อีกครั้ง',
        'เกิดข้อผิดพลาด', {
          closeButton: true,
          "positionClass": "toast-top-center"

        }
      );
    }


  }

  quickQuoModal = () => {

    let name = $('#quick_fullname').val();
    let email = $('#quick_email').val();
    let company = $('#quick_company').val();
    let tel = $('#quick_tel').val();
    let companyemail = $('#quick_companyemail').val();

    let formData = new FormData();
    formData.append('name', name);
    formData.append('email', email);
    formData.append('company', company);
    formData.append('tel', tel);
    formData.append('companyemail', companyemail);
    formData.append('message', $('#quick_message').val());
    formData.append('file', $('#quick_file')[0].files[0]);
    formData.append('account_option', $('#quick_account_option').is(':checked') ? 1 : 0);
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
      url: "{{ route('quickdata.quotation') }}",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
        if (response.status == 'success') {
          $('#count-qt').text(0);
          $('#count-qt').hide();
        }
      }
    });

  }

  search = (val) => {

    let search = val

    if (search != '') {

      setTimeout(function() {

        $.ajax({
          url: "{{ route('search.product') }}",
          type: "POST",
          data: {
            _token: "{{ csrf_token() }}",
            search: search
          },
          dataType: "json",
          success: function(response) {


            let unique_category = [...new Map(response.category.map(item => [item['conf_categorysub_name_th'], item])).values()];

            let unique_productname = [...new Map(response.productname.map(item => [item['conf_mainproduct_id'], item])).values()];

            let uniqid_tag = [...new Map(response.tag.map(item => [item['conf_mainproduct_tag_name_th'], item])).values()];


            let category_en = ''
            let category_th = ''
            let productname_en = ''
            let productname_th = ''
            let tag_en = ''
            let tag_th = ''

            $.each(unique_category, function(index, value) {

              if (value.conf_categorysub_name_en == null) {

              } else {
                category_en += `<li class="list-group-item"><a href="{{url('/product-quick-filter/` + value.conf_mainproduct_id + `')}}" style="color:black">` + value.conf_categorysub_name_en + `</a></li>`
              }

              if (value.conf_categorysub_name_th == null) {

              } else {
                category_th += `<li class="list-group-item"><a href="{{url('/product-quick-filter/` + value.conf_mainproduct_id + `')}}" style="color:black">` + value.conf_categorysub_name_th + `</a></li>`
              }


            })

            $.each(unique_productname, function(index, value) {

              if (value.conf_mainproduct_name_en == null) {

              } else {
                productname_en += `<li class="list-group-item"><a href="{{url('/product-quick-filter/` + value.conf_mainproduct_id + `')}}" style="color:black">` + value.conf_mainproduct_name_en + `</a></li>`
              }

              if (value.conf_mainproduct_name_th == null) {

              } else {
                productname_th += `<li class="list-group-item"><a href="{{url('/product-quick-filter/` + value.conf_mainproduct_id + `')}}" style="color:black">` + value.conf_mainproduct_name_th + `</a></li>`
              }


            })

            $.each(uniqid_tag, function(index, value) {

              if (value.conf_mainproduct_tag_name_en == null) {

              } else {
                tag_en += `<li class="list-group-item"><a href="{{url('/product-quick-tag/` + value.conf_mainproduct_id + `')}}" style="color:black">` + value.conf_mainproduct_tag_name_en + `</a></li>`
              }

              if (value.conf_mainproduct_tag_name_th == null) {

              } else {
                tag_th += `<li class="list-group-item"><a href="{{url('/product-quick-tag/` + value.conf_mainproduct_tag_id + `')}}" style="color:black">` + value.conf_mainproduct_tag_name_th + `</a></li>`
              }

            })


            $('.loading').removeAttr('hidden');

            setTimeout(function() {
              $('#result-search').removeAttr('hidden');

              if (unique_category == '' && unique_productname == '' && uniqid_tag == '') {

                $('#result-search').attr('hidden', 'hidden');

              } else {

                $('.scroll-list').html(
                  productname_th + category_th + category_en + productname_en + tag_th + tag_en
                )

              }



              $('.loading').attr('hidden', 'hidden');
            }, 500);



          }

        })

      }, 1000);

    }

  }

  clearSearch = () => {

    $('#result-search').attr('hidden', 'hidden');
    $('#search').val('');

  }

  $('.m-login').click(function() {

    let email = $('#log_email').val();
    let password = $('#log_password').val();

    if (email == '') {
      $('#log_email').css('border', '1px solid red');
      $('.al_log_email').text('กรุณากรอกอีเมล');
    } else {
      $('#log_email').css('border', '1px solid #ced4da');
      $('.al_log_email').text('');
    }

    if (password == '') {
      $('#log_password').css('border', '1px solid red');
      $('.al_log_password').text('กรุณากรอกรหัสผ่าน');
    } else {
      $('#log_password').css('border', '1px solid #ced4da');
      $('.al_log_password').text('');
    }

    if (email != '' && password != '') {

      $.ajax({
        url: "{{ url('customer/login') }}",
        type: "POST",
        data: {
          email: email,
          password: password,
          _token: "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function(response) {
          console.log(response);

          if (response.status == 'success') {
            $('#m_customer_login').modal('hide');
            toastr.success(
              'เข้าสู่ระบบสำเร็จ',
              'สำเร็จ', {
                closeButton: true,
                "positionClass": "toast-top-center"
              }
            );

            setTimeout(function() {
              window.location.href = "/{{ app()->getLocale() }}/customer/profile";
            }, 1000);

          } else {
            toastr.warning(
              'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
              'เกิดข้อผิดพลาด', {
                closeButton: true,
                "positionClass": "toast-top-center"

              }
            );
          }
        },
        error: function(response) {
          console.log(response);
          // toastr.warning(
          //   'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
          //   'เกิดข้อผิดพลาด', {
          //     closeButton: true,
          //     "positionClass": "toast-top-center"

          //   }
          // );
        }
      })


    }
  })
  $('.m-reset').click(function() {
    $('#log_email').val('');
    $('#log_password').val('');
  })

  $('.dropdown-list').click(function() {

    $('#dp1').slideToggle();
    $('.fa-caret-down').toggleClass('fa-caret-up');

  });

  $('.dropdown-list-warehouse').click(function() {

    $('#dp2').slideToggle();
    $('.fa-caret-down').toggleClass('fa-caret-up');

  });
</script>