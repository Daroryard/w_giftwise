@extends('layouts.home')
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<style>
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
 .lookbook-gallery .a11y-only {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}
.lookbook-gallery .a11y-only.focusable:active,
.lookbook-gallery .a11y-only.focusable:focus {
  clip: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  position: static;
  width: auto;
}
.lookbook-gallery img {
  min-width: 100%;
  max-width: 100%;
  display: block;
  background: #ddd;
  border-radius: 0.25em;
}
.lookbook-gallery .model {
  margin: 0;
  position: relative;
}
.lookbook-gallery .model .model--caption {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: 0;
  background-color: rgba(0, 0, 0, 0.85);
  padding: 0.35em 1.2em 0.25em 0.9em;
  justify-self: start;
}
.lookbook-gallery .model .model--caption .model-hed {
  font-size: 1.25em;
  margin: 0.5em 0;
  font-family: Lora, serif;
}
.lookbook-gallery .model .model--caption .model-hed a {
  color: #fff;
  text-decoration-color: rgba(255, 255, 255, 0.5);
}
.lookbook-gallery .model .model--caption p {
  font-size: 0.9375em;
  font-style: normal;
  font-weight: 400;
  color: #fff;
  line-height: 1.5;
  margin: 0 0 0.5em 0;
}
@media (min-width: 45em) {
  .lookbook-gallery .lookbook-grid {
    align-items: center;
    justify-content: center;
    text-align: center;
    display: flex;
    flex-wrap: wrap;
  }
  .lookbook-gallery .model {
    flex: 47.5%;
    margin: 0.5%;
  }
}
@media (min-width: 65em) {
  .lookbook-gallery .model {
    flex: 24.25% 0;
    margin: 0.25%;
  }
  @supports (display: grid) {
    .lookbook-gallery .lookbook-grid {
      display: grid;
      grid-gap: 0.5em;
      grid-template-columns: repeat(4, minmax(200px, 1fr));
    }
    .lookbook-gallery .model {
      margin: 0;
    }
    .lookbook-gallery .model:nth-of-type(4n-1) {
      grid-row-end: span 2;
      grid-column-end: span 2;
    }
  }
}

  #footer-with-image {
  max-width: 1680px !important;
  height: 275px !important;
  margin: auto !important;
  display: block;
  background : url("{{ asset('assets/frontend/images/customer/banner-customer-footer.png') }}");
  background-size:cover;
  background-repeat:no-repeat;
  border-radius: 0.25em;
}

.img-footer {
    margin: 80px auto;
    margin-right: 190px;
}
a:link { text-decoration: none; }
a:visited { text-decoration: none; }
a:hover { text-decoration: none; }
a:active { text-decoration: none; }
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
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/72"><span class="badge p-2">{{ __('validation.top_popular_search_1') }}</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/71"><span class="badge p-2">{{ __('validation.top_popular_search_2') }}</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/73"><span class="badge p-2">Staff Pick</span></a>
                        <a href="/{{ app()->getLocale() }}/product-quick-tag/74"><span class="badge p-2">Gift Set</span></a>
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
<div class="container" style="margin-bottom:20px;">
    <div class="row mt-5">
        <div class="col-12">
            <img src="{{ asset('assets/frontend/images/Rectangle.png') }}" style="width: 100%;">
        </div>
    </div>
</div>

<div class="section-content-customer"  style="margin-bottom:20px !important;">
<div class="lookbook-gallery">
  <div class="lookbook-grid" role="region">

  @foreach($arr_img as $key => $r)
    <figure class="model">
    @if($key > 12)
    @if($r['img'])
      <img src="https://erp.giftwise.co.th/{{$r['img']}}" class="img-hidden" style="display:none;" onclick="getModal('{{ $r['id'] }}')"/>
    @endif
    @else
    @if($r['img'])
      <img src="https://erp.giftwise.co.th/{{$r['img']}}" class="img-hidden" style="display:block;" onclick="getModal('{{ $r['id'] }}')"/>
    @endif
    @endif
    </figure>
    @endforeach 


  </div>
</div>
@if(count($review) > 3)
<div class="load-more-sec"><a href="javascript:void(0)" class="loadMore-customer">{{ __('validation.product_view_more') }}</a></div>
@endif

</div>

<div id="footer-with-image" class="col-md-12" style="margin-top: 10px !important;">
 <center>
    <br><br><br><br>
    <div class="img-footer">
    <a href="#"><img src="{{ asset('assets/frontend/images/customer/circle-phone 1.png') }}"></a>
    <a href="#"><img src="{{ asset('assets/frontend/images/customer/24.line.png') }}"></a>
    <a href="#"><img src="{{ asset('assets/frontend/images/customer/Group.png') }}"></a>
    </div>
</center>
</div>



<div class="modal fade bd-example-modal theme-modal" id="dataReview" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body modal1" style="background-image:none !important;border-radius: 10px;">
          <div class="container-fluid p-0">
            <div class="row">

                <div class="col-6" id="m-img-review">
                </div>
                <div class="col-6">
                <p style="font-size: 16px; margin-top:15px" id="m-mss-review">
                </p>
                <div class="rate">
         
                </div>
                <div id="m-review">
               
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
{{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> --}}
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script type="text/javascript" src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
     $(function() {
       
$(".loadMore-customer").on('click', function(e) {
    if ($(".model .img-hidden:hidden").length === 0) {
        $(".loadMore-customer").text('no more products');
    }else{
        $(".model .img-hidden:hidden").slice(0, 4).slideDown().css('display', 'block');
    }
});

});
  
getModal = (ref) => {

    $.ajax({
        url: "{{ url('customer/get-modal-review') }}",
        type: "POST",
        data: {
            ref: ref,
            _token: "{{ csrf_token() }}",
        },
        dataType: "json",
        success: function(data) {

          // console.log(data);

          if(data.review == null) {
            Swal.fire({
                icon: 'info',
                text: 'No data found!',
            });

          }else{

            let start = '';

            for(let i = 0; i < data.review.docu_review_qty; i++) {
                start += '<i class="fa fa-star" style="color: #FFD700;"></i>';
            }

            let product_name = '';
            let lg = '{{ app()->getLocale() }}';

            if(lg == 'th') {
                product_name = data.review.conf_mainproduct_name_th;
            } else {
                product_name = data.review.conf_mainproduct_name_en;
            }

            $('#m-img-review').html(`<img src="${data.review.docu_review_img1}" class="img-fluid" style="width: 100%;">`);
            $('#m-mss-review').html(`${data.review.docu_review_remeak}`);
            $('.rate').html(`${start} <small>${data.review.docu_review_qty}</small>`);

            if(data.review.conf_mainproduct_price == null) {

             
            }else{

              $('#m-review').html(`<a href="/{{ app()->getLocale() }}/product/${data.review.conf_mainproduct_id}/-">
                <div style="margin-top: 50px;border: 1px solid #ccc;border-radius: 5px;padding: 15px;text-decoration: none;">
                <div class="row">
                    <div class="col-4">
                        <img src="${data.review.docu_review_img1}" class="img-fluid" style="width: 100%;border-radius: 50%;">
                    </div>
                    <div class="col-8">
                    <p style="font-size: 16px; margin-top:15px">${product_name}</p>
                        <p style="font-size: 16px; margin-top:15px;">${data.review.conf_mainproduct_price}</p>
                        <small style="font-size: 12px;color: gray;">ส่งขั้นต่ำ/Minimum ${data.review.conf_mainproduct_quota} ชิ้น/Piece</small>
                        <br>
                        <small style="font-size: 12px;color: gray;">ส่งภายใน/Within ${data.review.conf_mainproduct_days} วัน/Day</small>
                    </div>
                </div>
                </div>
                </a>
                `)
            }

         


    
setTimeout(function() {
    $('#dataReview').modal('show');
}, 500);

          }
        }
    });

}
</script>
@endsection
