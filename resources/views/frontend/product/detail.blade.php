@extends('layouts.home')
@section('css')
<!-- Icons -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/fontawesome.css') }}">

<!--Slick slider css-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/slick-theme.css') }}">

<!-- Animate icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/animate.css') }}">

<!-- Themify icon -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/themify-icons.css') }}">
<!-- Bootstrap css -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/bootstrap.css') }}"> -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/color1.css') }}" /> -->
<style>
    .label-container {
        /* display: flex; */
        justify-content: space-between;
    }

    .label-value {
        flex: 1;
        cursor: pointer;
        text-align: center;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
        /* This will push items to both ends */
        background-color: lightgray;
        padding: 10px;
    }

    .left-item {
        float: left;
    }

    .right-item {
        float: right;
    }

    .center-item {
        text-align: center;
    }

    .inline-h2,
    .inline-h4 {
        display: inline;
        /* Make the headings display inline with each other */
        margin-right: 5px;
        /* Add some spacing between them (adjust as needed) */
        color: #FFC107;
    }

    .btn-addon {
        font-size: 16px;
        font-family: Sukhumvit Set;
        font-weight: 600;
        line-height: 24px;
        word-wrap: break-word;
    }

    .btn-addon:hover {
        color: white !important;
    }

    .btn-addon.active {
        color: white !important;
    }

    .btn-timeline {
        font-size: 16px;
        font-family: Sukhumvit Set;
        font-weight: 600;
        line-height: 24px;
        word-wrap: break-word;
    }

    .btn-timeline:hover {
        color: white !important;
    }

    .btn-timeline.active {
        color: white !important;
    }

    .btn-packaging {
        font-size: 16px;
        font-family: Sukhumvit Set;
        font-weight: 600;
        line-height: 24px;
        /* word-wrap: break-word */
    }

    .btn-packaging:hover {
        color: white !important;
    }

    .btn-packaging.active {
        color: white !important;
    }

    section {
        padding-left: 15px !important;
        padding-right: 15px !important;
    }
.product-center {
  display: flex !important;
  justify-content: center !important;  /* Horizontally centers the items */
  align-items: center !important;      /* Vertically centers the items (optional) */
}
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
.badge {
        background-color: #E8FEFF;
        color: #00C2C7;
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
    size : 14px !important;
    color: #000 !important;
   }

</style>
@endsection

@section('content')
<!-- section start -->
<section>
    <div class="collection-wrapper">
        <div class="section-content-product-filter">
            <div class="row">
                <div class="col-lg-1 col-sm-2 col-xs-12">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="slider-right-nav img-nav">
                                @if($hd->conf_mainproduct_img1 != null)
                                <div><img id="slider-right-nav-1" src="{{ $hd->conf_mainproduct_img1 }}" alt="" class="img-fluid lazyload"></div>
                                @endif
                                @if($hd->conf_mainproduct_img2 != null)
                                <div><img id="slider-right-nav-2" src="{{ $hd->conf_mainproduct_img2 }}" alt="" class="img-fluid  lazyload"></div>
                                @endif
                                <div><img id="slider-right-nav-3" src="{{ $hd->conf_mainproduct_img3 }}" alt="" class="img-fluid  lazyload"></div>
                                @if($hd->conf_mainproduct_img4 != null)
                                <div><img id="slider-right-nav-4" src="{{ $hd->conf_mainproduct_img4 }}" alt="" class="img-fluid  lazyload"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-10 col-xs-12 order-up">
                    <div class="product-right-slick img-slick">
                        @if($hd->conf_mainproduct_img1 != null)
                        <div class="product-center"><img id="product-right-slick-1" src="{{ $hd->conf_mainproduct_img1 }}" alt="" class="img-fluid  lazyload" style="max-width:496 !important;max-height:595 !important;"></div>
                        @endif
                        @if($hd->conf_mainproduct_img2 != null)
                        <div class="product-center"><img id="product-right-slick-2" src="{{ $hd->conf_mainproduct_img2 }}" alt="" class="img-fluid  lazyload" style="max-width:496 !important;max-height:595 !important;"></div>
                        @endif
                        @if($hd->conf_mainproduct_img3 != null)
                        <div class="product-center"><img id="product-right-slick-3" src="{{ $hd->conf_mainproduct_img3 }}" alt="" class="img-fluid  lazyload" style="max-width:496 !important;max-height:595 !important;"></div>
                        @endif
                        @if($hd->conf_mainproduct_img4 != null)
                        <div class="product-center"><img id="product-right-slick-4" src="{{ $hd->conf_mainproduct_img4 }}" alt="" class="img-fluid  lazyload" style="max-width:496 !important;max-height:595 !important;"></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <form id="form-detail">
                        <div class="product-right">
                            @if(app()->getLocale() == 'th')
                            <h2>{{ $hd->conf_mainproduct_name_th }} </h2>
                            @else
                            <h2>{{ $hd->conf_mainproduct_name_en }} </h2>
                            @endif
                            @foreach ($hd->mainProductTags as $pdtag)
                            <p>
                                @if(app()->getLocale() == 'th')
                                <span class="badge badge-secondary p-1">{{ $pdtag->conf_mainproduct_tag_name_th }}</span>
                                @else
                                <span class="badge badge-secondary p-1">{{ $pdtag->conf_mainproduct_tag_name_en }}</span>
                                @endif
                            </p>
                            @endforeach
                            <div class="rating mt-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span class="text-secondary"> | {{ $hd->conf_mainproduct_code }} </span>
                            </div>
                            <hr style="display: none;">
                            <div class="row mb-3">
                                <div class="col-6 col-md-4">
                                    <input type="hidden" id="product-price-sku" value="{{ $hd->conf_mainproduct_price }}">
                                    <h4 class="text-success">{{ __('validation.product_detail_price_sku') }}</h4>
                                    <h2 class="text-success price-sku">{{ $hd->conf_mainproduct_price }}</h2>
                                    <p>({{ __('validation.product_detail_addon') }} ฿<span id="total-price">0</span>)</p>
                                </div>
                                <div class="col-6 col-md-6">
                                    <h4 class="text-success">{{ __('validation.product_detail_delivery_in') }}</h4>
                                    <h2 class="text-success production-days">{{ number_format($hd->conf_mainproduct_days, 0) }} วัน</h2>
                                    <p id="total_timeline"></p>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8 col-md-10  mt-3">
                                    <h3>{{ __('validation.product_detail_price_rang') }}<h3>
                                </div>
                                <div class="col-4 col-md-2  mt-3">
                                    <input type="number" class="form-control rounded-2" id="range-value" value="0">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <input type="range" class="form-range" id="rangeInput" min="0" max="1000" value="0">
                                    </div>
                                    <div class="">
                                        <span class="label-value left-item" data-value="0">0</span>
                                        <span class="label-value right-item" data-value="1000">1000</span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button type="button" class="btn btn-block rounded-2 text-white mt-3" id="btn-check-stock" style="background-color: #00C2C7;width:100%;height:40px;">{{ __('validation.product_detail_button_check_stock') }}</button>
                                </div>
                            </div>
                            <hr style="display: none;">
                            <div class="row">

                                <div class="col-md-12 mb-2" id="stock-result">
                                    <div id="checkbox-container" class="btn-group-toggle" data-toggle="buttons">

                                    </div>
                                </div>
                                <div class="col-md-12 mb-2" id="stock-result">
                                    <div id="checkbox-container-size" class="btn-group-toggle" data-toggle="buttons">

                                    </div>
                                </div>
                                <div class="col-md-12" id="addons">
                                    <div id="radio-addon" class="btn-group-toggle" data-toggle="buttons">

                                    </div>
                                </div>
                                <div class="col-md-12" id="timeline">
                                    <div id="radio-timeline" class="btn-group-toggle" data-toggle="buttons">

                                    </div>
                                </div>
                                <div class="col-md-12" id="packaging">
                                    <div id="radio-packaging" class="btn-group-toggle" data-toggle="buttons">

                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-12" id="order-result" style="display: none;">
                                    <h4 class="font-weight-bold mt-2 mb-3">{{ __('validation.product_detail_foot_detail') }}</h4>
                                    <div class="row" id="row-result">

                                    </div>
                                    <div class="row">
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary font-weight-bold">{{ __('validation.product_detail_foot_total_price') }}</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary " id="result-price">-</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary font-weight-bold">{{ __('validation.product_detail_foot_timeline') }}</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary" id="timeline-result">-</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary font-weight-bold">{{ __('validation.product_detail_foot_color') }}</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary" id="color-result">-</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary font-weight-bold">{{ __('validation.product_detail_foot_screen') }}</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary" id="addon-result">-</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary font-weight-bold">Packaging</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <p class="text-secondary" id="packaging-result">-</p>
                                        </div>
                                        <div class="col-md-12 mt-3 mb-3">
                                            <p class="text-secondary">*{{ __('validation.product_detail_foot_note1') }}
                                                <br>{{ __('validation.product_detail_foot_note2') }}
                                            </p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="d-grid gap-2">
                                                <button class="btn mt-1" type="button" id="btn-add-qt" style="background-color : #E8FEFF;color : #009A9E;">{{ __('validation.product_detail_button_add_cart') }}</button>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-block rounded-2 text-white mt-1" id="btn-qt" style="background-color: #00C2C7">{{ __('validation.product_detail_button_add_cart2') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</section>

<!-- product-tab starts -->
<section class="tab-product m-0">
    <div class="section-content-product-detail">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-selected="true">{{ __('validation.product_detail_tab_highlight') }}</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-selected="false">{{ __('validation.product_detail_tab_spac') }}</a>
                        <div class="material-border"></div>
                    </li>
                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-selected="false">{{ __('validation.product_detail_tab_detail') }}</a>
                        <div class="material-border"></div>
                    </li>
                </ul>
                
                <div class="tab-content nav-material" id="top-tabContent">
                <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                            <div class="row">
                            <div class="col-md-12 mt-5">
                            <div class="slider">
                    @if($hd->conf_mainproduct_img5 != null)           
                    <div class="item">
                        <img src="{{ $hd->conf_mainproduct_img5 }}" style="width:330.67px;height:323px" alt="" />
                        <p>
                                        {{ $hd->conf_highlight_th1 }}
                                    </p>
                    </div>
                    @endif
                    @if($hd->conf_mainproduct_img6 != null)
                    <div class="item">            
                    <img src="{{ $hd->conf_mainproduct_img6 }}" style="width:330.67px;height:323px" alt="" />
                    <p>
                                        {{ $hd->conf_highlight_th2 }}
                                    </p>
                    </div>
                    @endif
                    @if($hd->conf_mainproduct_img7 != null)
                    <div class="item">
                    <img src="{{ $hd->conf_mainproduct_img7 }}" style="width:330.67px;height:323px" alt="" />
                    <p>
                                        {{ $hd->conf_highlight_th3 }}
                                    </p>
                    </div>
                    @endif
                    @if($hd->conf_mainproduct_img8 != null)
                    <div class="item">
                    <img src="{{ $hd->conf_mainproduct_img8 }}" style="width:330.67px;height:323px" alt="" />
                    <p>
                                        {{ $hd->conf_highlight_th4 }}
                                    </p>
                    </div>
                    @endif                             
                    </div>                              
                    </div>
                    </div>
                    </div>
                    <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
                        <div class="single-product-tables">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>ขนาดบรรจุ @if (!empty($item->subProducts))
                                            @foreach ($item->subProducts as $tag)
                                            @if(app()->getLocale() == 'th')
                                            <span class="badge">{{ $tag->conf_size_name_th }}</span>
                                            @else
                                            <span class="badge">{{ $tag->conf_size_name_en }}</span>
                                            @endif
                                            @endforeach
                                            @endif
                                    </tr>
                                    <tr>
                                        <td>สี @if (!empty($item->subProducts))
                                            @foreach ($item->subProducts as $tag)
                                            @if(app()->getLocale() == 'th')
                                            <span class="badge">{{ $tag->conf_color_name_th }}</span>
                                            @else
                                            <span class="badge">{{ $tag->conf_color_name_en }}</span>
                                            @endif
                                            @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($hd->conf_mainproduct_quota, 0) }} ชิ้น ผลิตสีตาม Pantone
                                            ได้</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                        @if(app()->getLocale() == 'th')
                        <p>{{ $hd->conf_mainproduct_remark_th }}</p>
                        @else
                        <p>{{ $hd->conf_mainproduct_remark_en }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<section class="tab-product m-0">
    <div class="section-content-product-detail">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('validation.product_detail_section_sample') }} ({{ $project_count_total }})</h3>
            </div>
            <hr>
            
            <div class="col-md-12 text-secondary mt-1">     
            <ul class="nav nav-tabs nav-material" id="top-tab-project" role="tablist">
                @foreach ($projectGroup as $key => $item)
                    <li class="nav-item"><a class="nav-link" id="top-{{$item->typescreen_name_th}}" data-toggle="tab" href="#{{$item->typescreen_name_th}}" role="tab" aria-selected="true" onclick="proJect('{{$item->typescreen_name_th}}','{{$ref}}')">
                        @if(app()->getLocale() == 'th')
                        {{ $item->typescreen_name_th }} ({{ $item->count }})
                        @else
                        {{ $item->typescreen_name_en }} ({{ $item->count }})
                        @endif
                    </a>
                        <div class="material-border"></div>
                    </li>            
                @endforeach
                </ul>        
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row" id="project-result">
                        @foreach ($project as $key => $item)
                        <div class="col-6 col-md-2 mt-5">
                                <img class="img-fluid" src="{{ $item->conf_projectlist_img1 }}" alt="" style="max-width: 192px; max-height: 184px;">
                            </div>
                        @endforeach
                        </div>
                    </div> 
                </div>
                </div>
                {{-- <div class="row">
                        @for ($i = 0; $i < 10; $i++)
                            <div class="col-6 col-md-2 mt-5">
                                <img class="img-fluid" src="https://placehold.co/192x184" alt="">
                            </div>
                        @endfor
                    </div> --}}
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="button" class="text-secondary btn btn-block rounded-2 text-white mt-3" style="display:none;">แสดงเพิ่มเติม <i class="fa fa-angle-down"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="section-content-product-detail">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('validation.product_detail_section_review') }}</h3>
            </div>
            <div class="col-md-12">
                @if($review->count() > 0)
                <h2 class="inline-h2">{{ $review_avg }}</h2>
                @else
                <h4 class="inline-h2">ไม่พบรีวิว</h4>
                @endif

                <h3 class="inline-h4">

                    @if($review_avg < 0.5)

                    @elseif($review_avg > 0.5 && $review_avg < 1.0)

                    <i class="fa fa-star-half-o"></i>

                    @elseif($review_avg >= 1.0 && $review_avg < 1.5)

                    <i class="fa fa-star"></i>

                    @elseif($review_avg >= 1.5 && $review_avg < 2.0)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>

                    @elseif($review_avg >= 2.0 && $review_avg < 2.5)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>

                    @elseif($review_avg >= 2.5 && $review_avg < 3.0)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>

                    @elseif($review_avg >= 3.0 && $review_avg < 3.5)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>

                    @elseif($review_avg >= 3.5 && $review_avg < 4.0)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>

                    @elseif($review_avg >= 4.0 && $review_avg < $review_avg)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>


                    @elseif($review_avg >= $review_avg && $review_avg < 4.6)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>


                    @elseif(4.6 >= 5.0)

                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>

                    @endif

                </h3>
            </div>
                    @if($review->count() > 0)
                    <p class="text-secondary mt-2">จาก {{ $countreviw }} รีวิว</p>
                    @else
                    <p class="text-secondary mt-2">0 รีวิว</p>
                    @endif
                    <hr>
            <div class="col-md-12">
                <div class="row">
                @if($count > 0)
                    @foreach ($arr_img as $item)         
                    <div class="col-6 col-md-4 col-lg-3 col-xl-2 mt-3">
                        <div class="card review-card">
                            <img src="{{ $item['img'] }}" class="card-img-top img-fluid" alt="Reviewer Image" style="max-width: 258px;height: 258px;">
                            <div class="card-body">
                                <p class="card-text">

                                    <span class="text-secondary">
                                        @for($i = 0; $i < $item['star']; $i++)
                                           
                                        &#9733;

                                        @endfor
                                        
                                        
                                        
                                        {{ $item['star'] }}</span>
                                    <!-- 4-star rating -->
                                </p>
                                <p class="card-text review-caption">
                                    {{ $item['remark'] }}
                                </p>                  
                            </div>
                        </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <button type="button" class="text-secondary btn btn-block rounded-2 text-white mt-3" style="display:none;">แสดงเพิ่มเติม <i class="fa fa-angle-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section>
    <div class="section-content-product-detail">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('validation.product_detail_section_relevant') }}</h3>
            </div>
            <hr>
            <div class="col-md-12 mb-3">
                <div class="new-product-slider mb-3">
                    <div class="row">
                        @foreach ($pdsale as $key => $item)
                        @if($key >= 12)
                        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 product-relevants" style="display:none;">
                        @else
                        <div class="col-sm-4 col-md-4 col-lg-3 col-xl-2 product-relevants" style="display:block;">
                        @endif
                            <a href="/{{ app()->getLocale() }}/product/{{$item->conf_mainproduct_id}}/-">
                                <img src="{{ $item->conf_mainproduct_img1 }}" width="230.4" height="225" />
                            </a>
                            <div class="product-details mt-2">
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
                                @if(app()->getLocale() == 'th')
                                <p>{{ Str::limit($item->conf_mainproduct_name_th, 50) }}</p>
                                @else
                                <p>{{ Str::limit($item->conf_mainproduct_name_en, 50) }}</p>
                                @endif
                                <p class="product-price">{{ $item->price }}</p>
                                <p class="product-min-quantity text-secondary">สั่งขั้นต่ำ
                                    {{ number_format($item->timeline_qty, 0) }} ชิ้น
                                </p>
                                <p class="product-estimate-date text-secondary">ส่งภายใน
                                    {{ number_format($item->timeline_day, 0) }} วัน
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3">
                    <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-relevants">{{ __('validation.product_view_more') }}</a></div>
                    </div>
                    <div class="col-md-12 mt-3">
                    <div>
                        <center>
                        <a href="/{{ app()->getLocale() }}/customer/-/-" style="color: #009A9E;">ดูรูปลูกค้าของเรา  <img src="{{ asset('assets/frontend/images/icon/customer-more.png') }}" alt=""></a> 
                        </center>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
</div>

@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- menu js-->
<script src="{{ asset('assets/frontend/multikart/js/menu.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('assets/frontend/multikart/js/lazysizes.min.js') }}"></script>

<!-- popper js-->
<script src="{{ asset('assets/frontend/multikart/js/popper.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('assets/frontend/multikart/js/slick.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('assets/frontend/multikart/js/bootstrap.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('assets/frontend/multikart/js/bootstrap-notify.min.js') }}"></script>

<!-- Zoom js-->
<script src="{{ asset('assets/frontend/multikart/js/jquery.elevatezoom.js') }}"></script>
<script src="{{ asset('assets/frontend/multikart/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        $(document).ready(function() {



$(".loadMore-relevants").on('click', function(e) {
    
    if ($(".product-relevants:hidden").length === 0) {
        $(".loadMore-relevants").text('no more products');
    }else{
        $(".product-relevants:hidden").slice(0, 6).slideDown().css('display', 'block');

    }
});






            $(".slider").slick({
          infinite: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
          autoplay: true,
          centerPadding: "0",      
        });
    });

    var rangeInput = document.getElementById("rangeInput");
    var labelValues = document.querySelectorAll(".label-value");
    var rangePrice = 0;
    var rangeChange = true;
    var productList;

    $('#range-value').change(function() {
        rangeChange = false;
        rangeInput.value = $(this).val();
    });

    // Update the range input's step when clicking on a label
    labelValues.forEach((label) => {
        label.addEventListener("click", () => {
            var step = parseInt(label.getAttribute("data-value"), 10);
            rangeInput.step = step.toString();
        });
    });

    // Sync the label with the current value of the range input
    rangeInput.addEventListener("input", () => {
        labelValues.forEach((label) => {
            var step = parseInt(label.getAttribute("data-value"), 10);
            rangeChange = false;
            $('#range-value').val(rangeInput.value);
        });
    });

    $('#btn-check-stock').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  กำลังดำเนินการ...`);
        var qty = $('#range-value').val();
        if (qty == 0) {
            $('#checkbox-container').html(
                `<div class="alert alert-danger" role="alert" align="center">กรุณาเลือกจำนวนสินค้า</div>`);
            setTimeout(() => {
                $('.alert').fadeOut();
            }, 2000);
            $('#btn-check-stock').html(`เช็คสต็อกและราคา`);
            return false;
        }
        $.ajax({
            url: "/{{ app()->getLocale() }}/check-stock",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                qty: qty,
                id: "{{ $hd->conf_mainproduct_id }}",
            },
            dataType: "json",
            success: function(response) {

                let checklang = "{{ app()->getLocale() }}";

                if (response.product.length > 0) {
                    productList = response;
                    var checkbox = `<h4 class="font-weight-bold mt-2 mb-3">สีสินค้า</h4>`;
                    var checkbox_size = `<h4 class="font-weight-bold mt-2 mb-3">ขนาดไซส์</h4>
                        `;
                    var pricePerPiece = 0;


                    // color

                    let unique_color = [...new Map(response.product.map(item => [item.conf_color_name_th, item])).values()];


                    $.each(unique_color, function(key, value) {

                        if(checklang == 'th'){
                            value.conf_subproduct_name_th = value.conf_subproduct_name_th
                            value.conf_color_name_th = value.conf_color_name_th
                            value.conf_size_name_th = value.conf_size_name_th
                        }else{
                            value.conf_subproduct_name_th = value.conf_subproduct_name_en
                            value.conf_color_name_th = value.conf_color_name_en
                            value.conf_size_name_th = value.conf_size_name_en
                        }


                        let days = value.conf_subproduct_pcstime * qty;
                        if (value.conf_subproduct_stcqty != null) {

                            checkbox += `                                                                               
                                <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;" onclick="filterSize('${value.conf_color_id}','${value.conf_mainproduct_id}',this)">
                                          <input type="radio" class="btn btn-secondary input-option" id="subproduct-${value.conf_subproduct_id}" name="product" data-price="${
                        qty >= 0 && qty <= 99 ? value.conf_subproduct_price1 :
                        qty >= 100 && qty <= 199 ? value.conf_subproduct_price2 :
                        qty >= 200 && qty <= 299 ? value.conf_subproduct_price3 :
                        qty >= 300 && qty <= 499 ? value.conf_subproduct_price4 :
                        qty >= 500 && qty <= 1000 ? value.conf_subproduct_price5 :
                        null
                        }" data-name="${value.conf_subproduct_name_th}" data-color="${value.conf_color_name_th}" data-img1="${value.conf_subproduct_img1}"
                        data-img2="${value.conf_subproduct_img2}" data-img3="${value.conf_subproduct_img3}"
                        data-img4="${value.conf_subproduct_img4}" data-day="${value.conf_subproduct_days}" value="${value.conf_subproduct_id}" data-size="${value.conf_size_name_th}">
                                                                ${value.conf_color_name_th} <br> (จำนวน ${value.conf_subproduct_stcqty} ชิ้น)
                                                                </label>`;
                        }
                    });

                    //size

                    let unique_size = [...new Map(response.product.map(item => [item.conf_size_name_th, item])).values()];

                    $.each(unique_size, function(key, value) {
                        
                        if(checklang == 'th'){
                            value.conf_size_name_th = value.conf_size_name_th
                        }else{
                            value.conf_size_name_th = value.conf_size_name_en
                        }

                        checkbox_size += `
                            <label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                            <input type="radio" class="btn btn-secondary  input-option" name="size" data-name="${value.conf_size_name_th}" data-price="${value.conf_subproduct_price1}" data-day="${value.conf_subproduct_days}" value="${value.conf_subproduct_id}">
                            ${value.conf_size_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_price1 + " บาท/ชิ้น)"}</span>
                        </label>
                        `

                    });

                    // addno

                    let unique_screen = [...new Map(response.addons.map(item => [item.conf_subproduct_addno_name_th, item])).values()];


                    var addon = `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>`;
                    $.each(unique_screen, function(key, value) {

                        if(checklang == 'th'){
                            value.conf_subproduct_addno_name_th = value.conf_subproduct_addno_name_th
                        }else{
                            value.conf_subproduct_addno_name_th = value.conf_subproduct_addno_name_en
                        }

                        if (value.conf_subproduct_addno_type != 'ระยะเวลาผลิต' && value.conf_subproduct_addno_type != 'Packaging') {

                            addon += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                                <input type="radio" class="btn btn-secondary input-option" name="addon" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                                ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                                            </label>`;

                        }
                    });


                    if (addon == `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>`) {

                        addon += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือกสกรีน</div>`;

                    }



                    let unique_timeline = [...new Map(response.addons.map(item => [item.conf_subproduct_addno_name_th, item])).values()];

                    var timeline = `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`;
                    $.each(unique_timeline, function(key, value) {

                        if(checklang == 'th'){
                            value.conf_subproduct_addno_name_th = value.conf_subproduct_addno_name_th
                        }else{
                            value.conf_subproduct_addno_name_th = value.conf_subproduct_addno_name_en
                        }


                        if (value.conf_subproduct_addno_type == 'ระยะเวลาผลิต') {

                            timeline += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                                    <input type="radio" class="btn btn-secondary input-option" name="timeline" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                                    ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/คำสั่งซื้อ)"}</span>
                                                </label>`;

                        }
                    });

                    if (timeline == `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`) {

                        timeline += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือกระยะเวลาผลิต</div>`;

                    }


                    let unique_pack = [...new Map(response.addons.map(item => [item.conf_subproduct_addno_name_th, item])).values()];

                    var pack = `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`;
                    $.each(unique_pack, function(key, value) {

                        if(checklang == 'th'){
                            value.conf_subproduct_addno_name_th = value.conf_subproduct_addno_name_th
                        }else{
                            value.conf_subproduct_addno_name_th = value.conf_subproduct_addno_name_en
                        }

                        if (value.conf_subproduct_addno_type == 'Packaging') {

                            pack += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                                <input type="radio" class="btn btn-secondary  input-option" name="packing" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                                ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                                            </label>`;

                        }

                    });

                    if (pack == `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`) {

                        pack += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือก Packaging</div>`;

                    }


                    $('#checkbox-container').html(checkbox);
                    $('#checkbox-container-size').html(checkbox_size);
                    $('#radio-addon').html(addon);
                    $('#radio-timeline').html(timeline);
                    $('#radio-packaging').html(pack);


                    bindaddon();

                    $('#order-result').show();
                } else {
                    $('#checkbox-container').html(`ไม่พบสินค้า`);
                }
                $('#btn-check-stock').html(`เช็คสต็อกและราคา`);
            }
        });
        rangeChange = true;
    })

    $('#btn-add-qt').click(function() {

    if($('#timeline input[type=radio]:checked').length == 0 || $('#timeline input[type=radio]:checked').length == 0){
        var timeline = {
                    id: 0,
                    name: 'ผลิตปกติ',
                    price: 0,
                    by: 'order',
                    day: 0
        }
    }else{
        var timeline = {
                    id: $('#timeline input[type=radio]:checked').val(),
                    name: $('#timeline input[type=radio]:checked').data('name'),
                    price: $('#timeline input[type=radio]:checked').data('price'),
                    by: 'order',
                    day: $('#timeline input[type=radio]:checked').data('day')
        }
    }

    if($('#packaging input[type=radio]:checked').length == 0 || $('#packaging input[type=radio]:checked').length == 0){
        var packaging = {
                    id: 0,
                    name: 'ไม่รวม packaging',
                    price: 0,
                    by: 'piece',
                    day: 0
        }
    }else{
        var packaging = {
                    id: $('#packaging input[type=radio]:checked').val(),
                    name: $('#packaging input[type=radio]:checked').data('name'),
                    price: $('#packaging input[type=radio]:checked').data('price'),
                    by: 'piece',
                    day: $('#packaging input[type=radio]:checked').data('day')
        }
    }

    if($('#addons input[type=radio]:checked').length == 0 || $('#addons input[type=radio]:checked').length == 0){
        var addon = {
                    id: 0,
                    name: 'ไม่สกรีน',
                    price: 0,
                    by: 'piece',
                    day: 0
        }
    }else{
        var addon = {
                    id: $('#addons input[type=radio]:checked').val(),
                    name: $('#addons input[type=radio]:checked').data('name'),
                    price: $('#addons input[type=radio]:checked').data('price'),
                    by: 'piece',
                    day: $('#addons input[type=radio]:checked').data('day')
        }

    }


        if ($('input[name="product"]:checked').length != 0 && $('input[name="size"]:checked').length != 0){

            var subproduct = {
                id: $('#checkbox-container input[type=radio]:checked').val(),
                name: $('#checkbox-container input[type=radio]:checked').data('name'),
                price: $('#product-price-sku').val(),
                day: $('#checkbox-container input[type=radio]:checked').data('day'),
                color: $('#checkbox-container input[type=radio]:checked').data('color'),
                qty: $('#range-value').val(),
                size: $('#checkbox-container input[type=radio]:checked').data('size'),
            }

        
            var qty = $('#range-value').val();


            if (qty == 0 || subproduct == null) {
                Swal.fire({
                    icon: 'error',
                    text: 'กรุณาเลือกจำนวนสินค้าและตัวเลือกสินค้าให้ครบถ้วน',
                    showConfirmButton: false,
                    timer: 1500
                })
                return false;
            } else if (addon.id == null || addon.id == 0 || addon.id === undefined) {
                var addon = {
                    id: 0,
                    name: 'ไม่สกรีน',
                    price: 0,
                    by: 'piece',
                    day: 0
                }

            } else if (timeline.id == null || timeline.id == 0 || timeline.id === undefined) {
                var timeline = {
                    id: 0,
                    name: 'ผลิตปกติ',
                    price: 0,
                    by: 'order',
                    day: 0
                }

            } else if (packaging.id == null || packaging.id == 0 || packaging.id === undefined) {
                var packaging = {
                    id: 0,
                    name: 'ไม่รวม packaging',
                    price: 0,
                    by: 'piece',
                    day: 0
                }
            }


            $.ajax({
                url: "{{ route('quotation.store') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    subproduct: subproduct,
                    addon: addon,
                    timeline: timeline,
                    packaging: packaging,
                    total: totalPrice,
                    rangePrice: rangePrice,
                    qty: qty,
                    id: "{{ $hd->conf_mainproduct_id }}",
                },
                dataType: "json",
                success: function(response) {

                    if (response.status == true) {
                        $('#count-qt').text(response.sku_cart);
                        $('#count-qt').show();
                        Swal.fire({
                            icon: 'success',
                            text: 'เพิ่มใบเสนอราคาเรียบร้อยแล้ว',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            location.reload();
                        })
                    } else if (response.status == false) {
                        Swal.fire({
                            icon: 'error',
                            text: 'เกิดข้อผิดพลาด',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else if (response.status == 'duplicate') {
                        Swal.fire({
                            icon: 'error',
                            text: 'มีใบเสนอราคานี้อยู่แล้ว',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }


                }
            })
          
        }  else {

            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกสีสินค้าและขนาดสินค้า',
                showConfirmButton: false,
                timer: 1500
            })
            return false;



        }

    })


    // $(document).ready(function() {
    // Initialize the total price
    var totalPrice = 0.00;
    var price = 0.00;

    // Handle checkbox clicks
    $(document).on('change', '.input-option', function() {
        if (rangeChange == false) {
            totalPrice = 0.00;
            $('#range-value').val(0);
            $('#rangeInput').val(0);
            $('#addons').hide();
            $('#timeline').hide();
            $('#packaging').hide();
            $('#order-result').hide();
            $(this).remove()
            $('#resul')
            $('#checkbox-container').html(
                `<div class="alert alert-danger" role="alert" align="center">กรุณากดปุ่มเช็คสต็อกและราคาอีกครั้ง</div>`
            );
        } else if ($('input[name="product"]:checked').length == 0 && $('input[name="size"]:checked').length != 0){

            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกสีสินค้า',
                showConfirmButton: false,
                timer: 1500
            })


            $('input[name="size"]').prop('checked', false);
            $('input[name="addon"]').prop('checked', false);
            $('input[name="timeline"]').prop('checked', false);
            $('input[name="packing"]').prop('checked', false);

        } else if ($('input[name="size"]:checked').length != 0 && $('input[name="product"]:checked').length == 0) {

            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกสีสินค้า',
                showConfirmButton: false,
                timer: 1500
            })

            $('input[name="product"]').prop('checked', false);
            $('input[name="addon"]').prop('checked', false);
            $('input[name="timeline"]').prop('checked', false);
            $('input[name="packing"]').prop('checked', false);



        }else if($('input[name="size"]:checked').length == 0 && $('input[name="product"]:checked').length == 0){

            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกสินค้าและขนาดสินค้า',
                showConfirmButton: false,
                timer: 1500
            })

            $('input[name="product"]').prop('checked', false);
            $('input[name="size"]').prop('checked', false);
            $('input[name="addon"]').prop('checked', false);
            $('input[name="timeline"]').prop('checked', false);
            $('input[name="packing"]').prop('checked', false);

        } else {

            calculateTotalPrice();
        }
        
    

    });

    // Function to calculate the total price
    function calculateTotalPrice(qty = 0) {
        totalPrice = 0.00;
        price = 0.00;
        textPrice = 0.00;
        var color = []
        var product = ``
        var timeline;
        var timelinePrice;
        var addon;
        var addonPrice;
        var packaging;
        var packagingPrice;


        $('#packaging input[type="radio"]:checked').each(function() {
            totalPrice += parseFloat($(this).data('price') * $('#range-value').val());
            textPrice += parseFloat($(this).data('price'));
            $('#packaging-result').text($(this).data('name'));
            packaging = $(this).data('name');
            packagingPrice = $(this).data('price');
        });

        $('#addons input[type="radio"]:checked').each(function() {
            totalPrice += parseFloat($(this).data('price')) * $('#range-value').val();
            textPrice += parseFloat($(this).data('price'));
            $('#addon-result').text($(this).data('name'));
            addon = $(this).data('name');
            addonPrice = $(this).data('price');
        });

        $('#timeline input[type="radio"]:checked').each(function() {
            totalPrice += parseFloat($(this).data('price'));
            textPrice += parseFloat($(this).data('price'));
            $('#timeline-result').text($(this).data('name'));
            timeline = $(this).data('name');
            timelinePrice = $(this).data('price');
        });

        $('#checkbox-container input[type="checkbox"]:checked').each(function(index) {
            var price = parseFloat($(this).data('price'));
            rangePrice = price
            totalPrice += parseFloat(price * $('#range-value').val());
            textPrice += parseFloat(price);
            var totalPrductPrice = parseFloat(price * $('#range-value').val()) + parseFloat(
                addonPrice * $('#range-value').val()) + parseFloat(packagingPrice * $('#range-value')
                .val()) + parseFloat(timelinePrice);
            product += `
                            <div class="col-6 col-md-6">
                                <p class="text-secondary font-weight-bold">ชื่อสินค้า</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary " id="product-name-${$(this).val()}">${$(this).data('name')}</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary font-weight-bold">ไซส์</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary " id="product-size-${$(this).val()}">${$(this).data('size')}</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary font-weight-bold">ราคาต่อชิ้น</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary product-sku-price" id="product-price-${$(this).val()}">${price.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' บาท'}</p>
                            </div>
                            <div class="col-6 col-md-6 mt-1 mb-1">
                                <p class="text-secondary font-weight-bold">จำนวน</p>
                            </div>
                            <div class="col-6 col-md-3 mt-1 mb-1">
                                <p class="text-secondary " id="product-qty-${$(this).val()}"><input type="number" name="productQty" class="form-control form-control-sm" onchange="QtyChange(this , ${$(this).val()} , ${addonPrice} , ${timelinePrice} , ${packagingPrice})" value="${ qty == 0 ? $('#range-value').val() : qty}"></p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary font-weight-bold">ราคารวม</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <p class="text-secondary product-sku-total" id="product-total-${$(this).val()}">${!isNaN(totalPrductPrice) ? totalPrductPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' บาท' : 0}</p>
                            </div>
                            <hr class="mt-2 mb-2">
                `
            if (!isNaN(totalPrductPrice)) {
                // $('#product-total-' + $(this).val()).text(totalPrductPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' บาท');
                $('#row-result').html(product);
            }
            // color.push($(this).data('color'));

            // if (index === $('.checkbox:checked').length - 1) {
            // $('#slider-right-nav-1').attr('src', $(this).data('img1'));
            // $('#slider-right-nav-2').attr('src', $(this).data('img2'));
            // $('#slider-right-nav-3').attr('src', $(this).data('img3'));
            // $('#slider-right-nav-4').attr('src', $(this).data('img4'));
            // $('#product-right-slick-1').attr('src', $(this).data('img1'));
            // $('#product-right-slick-2').attr('src', $(this).data('img2'));
            // $('#product-right-slick-3').attr('src', $(this).data('img3'));
            // $('#product-right-slick-4').attr('src', $(this).data('img4'));
            // $('.slider-right-nav').slick('refresh');
            // $('.product-right-slick').slick('refresh');
            // console.log($(this).val());
            // }
            // }
        });
        // Update the total price display
        $('#total-price').text(textPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#result-price').text(totalPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' บาท');
        if (color.length > 0) {
            $('#color-result').text(color.join(', '));
        } else {
            $('#color-result').text('ยังไม่เลือกสี');
        }


        
        $.ajax({
            url: "{{ route('check.leadtime') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                qty: $('#range-value').val(),
                subid : $('input[name="product"]:checked').val(),
                screen_day : $('input[name="addon"]:checked').data('day'),
                timeline_day : $('input[name="timeline"]:checked').data('day'),
                packaging_day : $('input[name="packing"]:checked').data('day'),
            },
            dataType: "json",
            success: function(response) {

                let totalpricesku = parseFloat($('input[name="product"]:checked').data('price')) + parseFloat(textPrice);

                $('.production-days').text(response.total_day);

                $('.price-sku').text('฿'+ totalpricesku.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#product-price-sku').val(totalpricesku);
             

            }
        });





    }
    // });

    function bindaddon() {
        $.ajax({
            url: "{{ route('product.getaddon') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: "{{ $hd->conf_mainproduct_id }}",
            },
            dataType: "json",
            success: function(response) {

                // console.log(response);


                var count_screen = 0;
                var count_pack = 0;
                var count_timeline = 0;
                var screenData = [];
                var timelineData = [];
                var packData = [];

                // Loop through the response and count occurrences of each type
                response.forEach(function(item) {
                    if (item.hasOwnProperty('conf_subproduct_addno_type')) {
                        // Increment respective counter based on the type
                        switch (item.conf_subproduct_addno_type) {
                            case 'ตัวเลือก':
                                count_screen++;
                                screenData.push(item);
                                break;
                            case 'ระยะเวลาผลิต':
                                count_timeline++;
                                timelineData.push(item);
                                break;
                            case 'Packaging':
                                count_pack++;
                                packData.push(item);
                                break;
                            default:
                                break;
                        }
                    }
                });

                if (count_screen > 0) {
                    var addon = `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>
                        `;
                    $.each(screenData, function(key, value) {
                        // addon += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                        //         <input type="radio" class="btn btn-secondary  input-option" name="addon" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                        //         ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                        //     </label>`;
                    });
                }


                if (count_timeline > 0) {
                    var timeline = `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`;
                    $.each(timelineData, function(key, value) {
                        timeline += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                    <input type="radio" class="btn btn-secondary  input-option" name="timeline" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                    ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/คำสั่งซื้อ)"}</span>
                                </label>`;
                    });
                }


                if (count_pack > 0) {
                    var pack = `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`;
                    $.each(packData, function(key, value) {
                        pack += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                    <input type="radio" class="btn btn-secondary  input-option" name="packing" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                    ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                                </label>`;
                    });
                }

                // $('#radio-addon').html(addon);
                // $('#radio-timeline').html(timeline);
                // $('#radio-packaging').html(pack);
                // $('#addons').show();
                // $('#timeline').show();
                // $('#packaging').show();
            }
        })
    }

    function QtyChange(btn, id, addonPrice, timelinePrice, packagingPrice) {
        var product = productList.filter(function(item) {
            return item.conf_subproduct_id == id;
        })[0];
        var qty = btn.value;
        var price = parseFloat(qty >= 0 && qty <= 99 ? product.conf_subproduct_price1 :
            qty >= 100 && qty <= 199 ? product.conf_subproduct_price2 :
            qty >= 200 && qty <= 299 ? product.conf_subproduct_price3 :
            qty >= 300 && qty <= 499 ? product.conf_subproduct_price4 :
            qty >= 500 && qty <= 1000 ? product.conf_subproduct_price5 :
            null)
        var productPrice = parseFloat(price * qty);
        var totalPrductPrice = productPrice + parseFloat(
            addonPrice * qty) + parseFloat(packagingPrice * qty) + parseFloat(timelinePrice);

        $('#product-price-' + id).text(price + ' บาท');
        $('#product-total-' + id).text(totalPrductPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' บาท');
        $('#subproduct-' + id).attr('data-price', price.toFixed(2));
        // calculateTotalPrice(qty);
        var allQty = 0;
        var allPrice = 0;
        var allAddon = 0;

        $('input[name="productQty"]').each(function() {
            allQty += parseInt($(this).val());
        });

        allAddon = (parseFloat(addonPrice) * allQty) + (parseFloat(packagingPrice) * allQty)

        $('.product-sku-total').each(function() {
            allPrice += parseFloat($(this).text().replace(' บาท', '').replace(',', ''));
        });
        allPrice += allAddon + parseFloat(timelinePrice);
        totalPrice = allPrice;
        $('#total-price').text(allPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#result-price').text(allPrice.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' บาท');

    }



    filterSize = (color, ref, el) => {

        reloadColor()

        $('.loading').removeAttr('hidden');


        $('input[name="size"]').prop('checked', false);
        $('input[name="addon"]').prop('checked', false);
        $('input[name="timeline"]').prop('checked', false);
        $('input[name="packing"]').prop('checked', false);


        setTimeout(function() {

        $.ajax({
            url: "{{ route('product.getsize') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                color: color,
                ref: ref,
                subid: $('#checkbox-container input[type=radio]:checked').val()
            },
            dataType: "json",
            success: function(response) {
                // console.log(response);

                var size = `<h4 class="font-weight-bold mt-2 mb-3">ขนาดไซส์</h4>`;

                $.each(response.size, function(key, value) {
                    size += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;" onclick="filterAddno('${color}','${ref}','{{ $hd->conf_mainproduct_id }}','${value.conf_size_id}')">
                            <input type="radio" class="btn btn-secondary  input-option" name="size" data-name="${value.conf_size_name_th}" data-price="${value.conf_subproduct_price1}" data-day="${value.conf_subproduct_days}" value="${value.conf_subproduct_id}">
                            ${value.conf_size_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_price1 == ".00" ? "" : "(+" + value.conf_subproduct_price1.replace('.00','') + " บาท/ชิ้น)"}</span>
                        </label>`;
                });

                $('#checkbox-container-size').html(size);


                if(response.getimg.conf_subproduct_img1 && response.getimg.conf_subproduct_img2 && response.getimg.conf_subproduct_img3 && response.getimg.conf_subproduct_img4){
        
                    $('.img-nav').html(
                        `               
                                        <div><img id="slider-right-nav-1" src="${response.getimg.conf_subproduct_img1}" alt="" class="img-fluid  lazyload"></div>
                                        <div><img id="slider-right-nav-2" src="${response.getimg.conf_subproduct_img2}" alt="" class="img-fluid  lazyload"></div>
                                        <div><img id="slider-right-nav-3" src="${response.getimg.conf_subproduct_img3}" alt="" class="img-fluid  lazyload"></div>
                                        <div><img id="slider-right-nav-4" src="${response.getimg.conf_subproduct_img4}" alt="" class="img-fluid  lazyload"></div>       
                    `)

                    
                    $('.img-slick').html(
                        `               
                                <div><img id="product-right-slick-1" src="${response.getimg.conf_subproduct_img1}" alt="" class="img-fluid  lazyload image_zoom_cls-0"></div>
                                <div><img id="product-right-slick-2" src="${response.getimg.conf_subproduct_img2}" alt="" class="img-fluid  lazyload image_zoom_cls-1"></div>
                                <div><img id="product-right-slick-3" src="${response.getimg.conf_subproduct_img3}" alt="" class="img-fluid  lazyload image_zoom_cls-2"></div>
                                <div><img id="product-right-slick-4" src="${response.getimg.conf_subproduct_img4}" alt="" class="img-fluid  lazyload image_zoom_cls-3"></div>
                    `)


                }




                $('.loading').attr('hidden', 'hidden');

            }
        })



    }, 500);


    }




    filterAddno = (color, ref, id, size) => {

        $('.loading').removeAttr('hidden');



        $.ajax({
            url: "{{ route('product.getaddonsku') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                color: color,
                ref: ref,
                id: id,
                size: size,
            },
            dataType: "json",
            success: function(response) {


                var addon = `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>`;
                $.each(response.screen, function(key, value) {

                    if (value.conf_subproduct_addno_type != 'ระยะเวลาผลิต' && value.conf_subproduct_addno_type != 'Packaging') {

                        addon += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                            <input type="radio" class="btn btn-secondary  input-option" name="addon" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                            ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                        </label>`;

                    }
                });


                if (addon == `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>`) {

                    addon += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือกสกรีน</div>`;

                }



                $('#radio-addon').html(addon);

                var timeline = `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`;
                $.each(response.addons, function(key, value) {

                    if (value.conf_subproduct_addno_type == 'ระยะเวลาผลิต') {

                        timeline += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                            <input type="radio" class="btn btn-secondary  input-option" name="timeline" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                            ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/คำสั่งซื้อ)"}</span>
                        </label>`;

                    }
                });

                if (timeline == `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`) {

                    timeline += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือกระยะเวลาผลิต</div>`;

                }

                $('#radio-timeline').html(timeline);


                var pack = `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`;
                $.each(response.addons, function(key, value) {

                    if (value.conf_subproduct_addno_type == 'Packaging') {

                        pack += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                            <input type="radio" class="btn btn-secondary  input-option" name="packing" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                            ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                        </label>`;

                    }

                });

                if (pack == `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`) {

                    pack += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือก Packaging</div>`;

                }

                $('#radio-packaging').html(pack);


            }

        })


        $('.loading').attr('hidden', 'hidden');


    }


    reloadColor = () => {
     
        var qty = $('#range-value').val();
   
        $.ajax({
            url: "{{ url('check-stock') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                qty: qty,
                id: "{{ $hd->conf_mainproduct_id }}",
            },
            dataType: "json",
            success: function(response) {

                if (response.product.length > 0) {
                    productList = response;
                    var checkbox = `<h4 class="font-weight-bold mt-2 mb-3">สีสินค้า</h4>`;
                    var checkbox_size = `<h4 class="font-weight-bold mt-2 mb-3">ขนาดไซส์</h4>
                        `;
                    var pricePerPiece = 0;

                    let unique_screen = [...new Map(response.addons.map(item => [item.conf_subproduct_addno_name_th, item])).values()];


                    var addon = `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>`;
                    $.each(unique_screen, function(key, value) {

                        if (value.conf_subproduct_addno_type != 'ระยะเวลาผลิต' && value.conf_subproduct_addno_type != 'Packaging') {

                            addon += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                                <input type="radio" class="btn btn-secondary input-option" name="addon" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                                ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                                            </label>`;

                        }
                    });


                    if (addon == `<h4 class="font-weight-bold mt-2 mb-3">ตัวเลือกสกรีน</h4>`) {

                        addon += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือกสกรีน</div>`;

                    }



                    let unique_timeline = [...new Map(response.addons.map(item => [item.conf_subproduct_addno_name_th, item])).values()];

                    var timeline = `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`;
                    $.each(unique_timeline, function(key, value) {

                        if (value.conf_subproduct_addno_type == 'ระยะเวลาผลิต') {

                            timeline += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                                    <input type="radio" class="btn btn-secondary input-option" name="timeline" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                                    ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/คำสั่งซื้อ)"}</span>
                                                </label>`;

                        }
                    });

                    if (timeline == `<h4 class="font-weight-bold mt-2 mb-3">ระยะเวลาผลิต</h4>`) {

                        timeline += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือกระยะเวลาผลิต</div>`;

                    }


                    let unique_pack = [...new Map(response.addons.map(item => [item.conf_subproduct_addno_name_th, item])).values()];

                    var pack = `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`;
                    $.each(unique_pack, function(key, value) {

                        if (value.conf_subproduct_addno_type == 'Packaging') {

                            pack += `<label class="btn btn-outline-info  rounded-3 border border-1 border-info checkbox-label mr-2 mb-2 btn-addon" style="color: #344054;">
                                                <input type="radio" class="btn btn-secondary  input-option" name="packing" data-name="${value.conf_subproduct_addno_name_th}" data-price="${value.conf_subproduct_addno_price}" data-day="${value.conf_subproduct_addno_timeline}" value="${value.conf_subproduct_addno_id}">
                                                ${value.conf_subproduct_addno_name_th} <span style="color : #D0D5DD;">${value.conf_subproduct_addno_price == ".00" ? "" : "(+" + value.conf_subproduct_addno_price.replace('.00','') + " บาท/ชิ้น)"}</span>
                                            </label>`;

                        }

                    });

                    if (pack == `<h4 class="font-weight-bold mt-2 mb-3">Packaging</h4>`) {

                        pack += `<div class="alert alert-danger" role="alert" align="center">ไม่พบตัวเลือก Packaging</div>`;

                    }


                    $('#radio-addon').html(addon);
                    $('#radio-timeline').html(timeline);
                    $('#radio-packaging').html(pack);


                    bindaddon();

                    $('#order-result').show();
                } else {
                    $('#checkbox-container').html(`ไม่พบสินค้า`);
                }
                $('#btn-check-stock').html(`เช็คสต็อกและราคา`);
            }
        });

        rangeChange = true;
    }


    $('#btn-qt').click(function() {

if($('#timeline input[type=radio]:checked').length == 0 || $('#timeline input[type=radio]:checked').length == 0){
    var timeline = {
                id: 0,
                name: 'ผลิตปกติ',
                price: 0,
                by: 'order',
                day: 0
    }
}else{
    var timeline = {
                id: $('#timeline input[type=radio]:checked').val(),
                name: $('#timeline input[type=radio]:checked').data('name'),
                price: $('#timeline input[type=radio]:checked').data('price'),
                by: 'order',
                day: $('#timeline input[type=radio]:checked').data('day')
    }
}

if($('#packaging input[type=radio]:checked').length == 0 || $('#packaging input[type=radio]:checked').length == 0){
    var packaging = {
                id: 0,
                name: 'ไม่รวม packaging',
                price: 0,
                by: 'piece',
                day: 0
    }
}else{
    var packaging = {
                id: $('#packaging input[type=radio]:checked').val(),
                name: $('#packaging input[type=radio]:checked').data('name'),
                price: $('#packaging input[type=radio]:checked').data('price'),
                by: 'piece',
                day: $('#packaging input[type=radio]:checked').data('day')
    }
}

if($('#addons input[type=radio]:checked').length == 0 || $('#addons input[type=radio]:checked').length == 0){
    var addon = {
                id: 0,
                name: 'ไม่สกรีน',
                price: 0,
                by: 'piece',
                day: 0
    }
}else{
    var addon = {
                id: $('#addons input[type=radio]:checked').val(),
                name: $('#addons input[type=radio]:checked').data('name'),
                price: $('#addons input[type=radio]:checked').data('price'),
                by: 'piece',
                day: $('#addons input[type=radio]:checked').data('day')
    }

}


    if ($('input[name="product"]:checked').length != 0 && $('input[name="size"]:checked').length != 0){

        var subproduct = {
            id: $('#checkbox-container input[type=radio]:checked').val(),
            name: $('#checkbox-container input[type=radio]:checked').data('name'),
            price: $('#product-price-sku').val(),
            day: $('#checkbox-container input[type=radio]:checked').data('day'),
            color: $('#checkbox-container input[type=radio]:checked').data('color'),
            qty: $('#range-value').val(),
            size: $('#checkbox-container input[type=radio]:checked').data('size'),
        }

    
        var qty = $('#range-value').val();


        if (qty == 0 || subproduct == null) {
            Swal.fire({
                icon: 'error',
                text: 'กรุณาเลือกจำนวนสินค้าและตัวเลือกสินค้าให้ครบถ้วน',
                showConfirmButton: false,
                timer: 1500
            })
            return false;
        } else if (addon.id == null || addon.id == 0 || addon.id === undefined) {
            var addon = {
                id: 0,
                name: 'ไม่สกรีน',
                price: 0,
                by: 'piece',
                day: 0
            }

        } else if (timeline.id == null || timeline.id == 0 || timeline.id === undefined) {
            var timeline = {
                id: 0,
                name: 'ผลิตปกติ',
                price: 0,
                by: 'order',
                day: 0
            }

        } else if (packaging.id == null || packaging.id == 0 || packaging.id === undefined) {
            var packaging = {
                id: 0,
                name: 'ไม่รวม packaging',
                price: 0,
                by: 'piece',
                day: 0
            }
        }


        $.ajax({
            url: "{{ route('quotation.store') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                subproduct: subproduct,
                addon: addon,
                timeline: timeline,
                packaging: packaging,
                total: totalPrice,
                rangePrice: rangePrice,
                qty: qty,
                id: "{{ $hd->conf_mainproduct_id }}",
            },
            dataType: "json",
            success: function(response) {

                if (response.status == true) {
                    $('#count-qt').text(response.sku_cart);
                    $('#count-qt').show();

                    window.location.href = "{{ route('quotation.index') }}";
                  
                } else if (response.status == false) {
                    Swal.fire({
                        icon: 'error',
                        text: 'เกิดข้อผิดพลาด',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else if (response.status == 'duplicate') {
                    Swal.fire({
                        icon: 'error',
                        text: 'มีใบเสนอราคานี้อยู่แล้ว',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }


            }
        })
      
    }  else {

        Swal.fire({
            icon: 'error',
            text: 'กรุณาเลือกสีสินค้าและขนาดสินค้า',
            showConfirmButton: false,
            timer: 1500
        })
        return false;



    }

})


// $(document).ready(function() {
// Initialize the total price
var totalPrice = 0.00;
var price = 0.00;

// Handle checkbox clicks
$(document).on('change', '.input-option', function() {
    if (rangeChange == false) {
        totalPrice = 0.00;
        $('#range-value').val(0);
        $('#rangeInput').val(0);
        $('#addons').hide();
        $('#timeline').hide();
        $('#packaging').hide();
        $('#order-result').hide();
        $(this).remove()
        $('#resul')
        $('#checkbox-container').html(
            `<div class="alert alert-danger" role="alert" align="center">กรุณากดปุ่มเช็คสต็อกและราคาอีกครั้ง</div>`
        );
    } else if ($('input[name="product"]:checked').length == 0 && $('input[name="size"]:checked').length != 0){

        Swal.fire({
            icon: 'error',
            text: 'กรุณาเลือกสีสินค้า',
            showConfirmButton: false,
            timer: 1500
        })


        $('input[name="size"]').prop('checked', false);
        $('input[name="addon"]').prop('checked', false);
        $('input[name="timeline"]').prop('checked', false);
        $('input[name="packing"]').prop('checked', false);

    } else if ($('input[name="size"]:checked').length != 0 && $('input[name="product"]:checked').length == 0) {

        Swal.fire({
            icon: 'error',
            text: 'กรุณาเลือกสีสินค้า',
            showConfirmButton: false,
            timer: 1500
        })

        $('input[name="product"]').prop('checked', false);
        $('input[name="addon"]').prop('checked', false);
        $('input[name="timeline"]').prop('checked', false);
        $('input[name="packing"]').prop('checked', false);



    }else if($('input[name="size"]:checked').length == 0 && $('input[name="product"]:checked').length == 0){

        Swal.fire({
            icon: 'error',
            text: 'กรุณาเลือกสินค้าและขนาดสินค้า',
            showConfirmButton: false,
            timer: 1500
        })

        $('input[name="product"]').prop('checked', false);
        $('input[name="size"]').prop('checked', false);
        $('input[name="addon"]').prop('checked', false);
        $('input[name="timeline"]').prop('checked', false);
        $('input[name="packing"]').prop('checked', false);

    } else {

        calculateTotalPrice();
    }
    


});

proJect = (type,id) => {

    $.ajax({
        url: "{{ url('/detail/project-list') }}",
        type: "POST",
        dataType: "json",
        data: {
            'type': type,
            'id': id,
            '_token': "{{ csrf_token() }}"
        },
        success: function(response) {

            let html = '';

            $.each(response, function(key, value) {
                html += `
                <div class="col-6 col-md-2 mt-5">
                                <img class="img-fluid" src="${value.conf_projectlist_img1}" alt="" style="max-width: 192px; max-height: 184px;">
                </div>`;
            });

            $('#project-result').html(html);

          
        }
    })
    }
    
</script>
@endsection