@extends('layouts.home')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/slick-theme.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/price-range.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/fontawesome.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/multikart/css/themify-icons.css') }}">
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
 
    .productbox {
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    vertical-align: middle;
    }
    .score {
    color: orange;
    }

    .score-list {
    color: orange;
    }
    
    div:where(.swal2-container) .swal2-html-container {
        text-align: left !important;
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



                                <div class="product-wrapper-grid">
                                    <div class="row margin-res">
                                        @foreach($projectlist as $key => $pj)
                                        <div class="col-lg-3 col-6 col-grid-box">
                                            <div class="productbox">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#" onclick="productDetail('{{ $pj->conf_projectlist_id }}')"><img src="{{ $pj->conf_projectlist_img1 }}" class="img-fluid customer-product" alt=""></a>
                                                    </div>
                                                                                                   
                                                </div>
                                                <div class="product-detail">
                                                    <div>
                                                            <h5>{{ Str::limit($pj->conf_projectlist_remark_th, 30) }}</h5>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <h6>อัปเดตล่าสุด 12:34, 12/04/23</h6>
                                                        <div class="rating"><h6>รีวิว
                                                        @for($i=1;$i<=5;$i++)
                                                            @if($i <= $pj->conf_projectlist_score)
                                                            <span class="fa fa-star score-list"></span>
                                                            @else
                                                            <span class="fa fa-star l-rate" onclick="ratingL({{ $i }})"></span>
                                                            @endif
                                                        @endfor
                                                       

                                                        </h6></div>                                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach                                                                
                                    </div>
                                </div>
                                <!-- <div class="product-pagination">
                                    <div class="theme-paggination-block">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6 col-sm-12">
                                                <nav aria-label="Page navigation">
                                                    <ul class="pagination">
                                                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true"><i
                                                                        class="fa fa-chevron-left"
                                                                        aria-hidden="true"></i></span> <span
                                                                    class="sr-only">Previous</span></a></li>
                                                        <li class="page-item active"><a class="page-link" href="#">1</a>
                                                        </li>
                                                       
                                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true"><i
                                                                        class="fa fa-chevron-right"
                                                                        aria-hidden="true"></i></span> <span
                                                                    class="sr-only">Next</span></a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <div class="col-xl-6 col-md-6 col-sm-12">
                                                <div class="product-search-count-bottom">
                                                    <h5>Showing Products 1-4 of 4 Result</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
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
                  <div class="close-circle" style="text-align: right;">

                    <button type="button" class="btn-close c-m-l" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <span id="cus_title"><h3>ขวดน้ำสแตนเลสมินิมอลแบบมีหูจับ ก้นขวดแสตนเลส</h3> <h6>รหัสสินค้า: GS026-S</h6></span>
                        <hr>
                        <h4>รีวิวสินค้า/Rewiew</h4>
                        <div class="rating">
                           <h5>คะแนน/Rate
                            <span class="fa fa-star m-rate" onclick="rating(1)"></span>
                            <span class="fa fa-star m-rate" onclick="rating(2)"></span>
                            <span class="fa fa-star m-rate" onclick="rating(3)"></span>
                            <span class="fa fa-star m-rate" onclick="rating(4)"></span>
                            <span class="fa fa-star m-rate" onclick="rating(5)"></span>
                           </h5>
                        </div>
                        <textarea class="form-control" id="remark" rows="5" placeholder="ความเห็นเพิ่มเติม"></textarea>
                        <div style="text-align: right;margin-top:10px;" id="bt-saverating">
                          
                        </div>
                        <hr>
                        <div style="margin: 10px;">
                        <h4 id="proj">เลขที่ Order: 123456</h4>
                        <!-- <div class="row">
                            <div class="col-4">
                                <h6>ราคาต่อชิ้น</h6>
                                <h4 style="color:#007275">฿ 350.00</h4>
                            </div>
                            <div class="col-4">
                                <h6>จำนวนที่สั่ง</h6>
                                <h4 style="color:#007275">300.00 ชิ้น</h4>
                            </div>
                            <div class="col-4">
                                <h6>ราคารวม</h6>
                                <h4 style="color:#007275">4,000.00 บาท</h4>
                            </div>                  
                        </div> -->
                        </div>
                        <div style="margin: 10px;">
                        <h4 style="color:#007275">รายละเอียดเพิ่มเติม</h4>
                        <div class="row">
                            <div class="col-4">
                                <h6 style="color:black">รายการ</h6>
                                <!-- <h6>ใบเสนอราคา</h6>
                                <h6>ขอใบเสนอราคา</h6> -->
                            </div>
                            <div class="col-4">
                                <h6 style="color:black">รายละเอียด</h6>
                                <!-- <a href="#" >File123</a> -->
                            </div>
                            <div class="col-4">
                                <h6 style="color:black">วันที่</h6>
                                <h6 id="created_at"></h6>
                                <!-- <h6>28 ต.ค. 2566</h6> -->
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
<script type="text/javascript" src="{{ asset('assets/frontend/multikart/js/price-range.js') }}"></script>
<script src="{{ asset('assets/frontend/multikart/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="
https://cdn.jsdelivr.net/npm/moment@2.30.1/moment.min.js
"></script>

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

    $(document).ready(function () {
        $('.menu-cus1').removeClass('option');
        $('.menu-cus1').addClass('option1');
    });



    productDetail = (ref) => {

        $('#productDetail').modal('show');
        $('.slick-next').trigger('click');
        $('.m-rate').removeClass('score');


        $.ajax({
            url: "{{ url('customer/projectdetail') }}",
            type: "post",
            data: {
                _token: "{{ csrf_token() }}",
                ref: ref
            },
            dataType: "json",
            success: function (data) {
                let  remark = '';
                if(data[0].conf_projectlist_remark_th == null){
                    remark = '';
                }else{
                    remark = data[0].conf_projectlist_remark_th;
                }

                $('#cus_title').html(`<h3>${remark}</h3> <h6>รหัสสินค้า: ${data[0].conf_projectlist_pdcode}</h6>`);
                $('#proj').html(`เลขที่ Project: ${data[0].conf_projectlist_docuno}`);
                let date = moment(data[0].created_at).format('DD MMM YYYY');
                $('#created_at').html(date);

                $('#pd_slick').html(`
                <div class="product-slick">
                                <div><img src="${data[0].conf_projectlist_img1}" alt="" class="img-fluid"></div>
                                <div><img src="${data[0].conf_projectlist_img2}" alt="" class="img-fluid"></div>
                                <div><img src="${data[0].conf_projectlist_img3}" alt="" class="img-fluid"></div>
                                <div><img src="${data[0].conf_projectlist_img4}" alt="" class="img-fluid"></div>
                </div>
                `);
    
                $('#pd_nav').html(`
                                <div class="slider-nav">
                                    <div><img src="${data[0].conf_projectlist_img1}" alt="" class="img-fluid"></div>
                                    <div><img src="${data[0].conf_projectlist_img2}" alt="" class="img-fluid"></div>
                                    <div><img src="${data[0].conf_projectlist_img3}" alt="" class="img-fluid"></div>
                                    <div><img src="${data[0].conf_projectlist_img4}" alt="" class="img-fluid"></div>
                                </div>
                `);

              
                $('#remark').val(`${remark}`);

                $('#bt-saverating').html(`<button type="button" class="btn btn-solid" style="border-radius: 10px;" onclick="saveRating(${data[0].conf_projectlist_id})">ให้คะแนน</button>`);


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
                });                }, 500);




                // console.log(data);
            },
            error: function (error) {
                // console.log(error);
            }
        });

    }

    rating = (rate) => {

        $('.m-rate').removeClass('score');

        for (let i = 0; i < rate; i++) {
            $('.m-rate').eq(i).addClass('score');
        }
      
    }

    ratingL = (rate) => {

        $('.l-rate').removeClass('score-list');

        for (let i = 0; i < rate; i++) {
            $('.l-rate').eq(i).addClass('score-list');
        }
      
    }

    saveRating = (ref) => {
        let rate = $('.score').length;
        let remark = $('#remark').val();
        let project = ref;

        if(rate == 0){
            swal("กรุณาให้คะแนนสินค้า", "", "error");
        }

        if(remark == ''){
            swal("กรุณาใส่ความเห็น", "", "error");
        }

        $.ajax({
            url: "{{ url('customer/saverating') }}",
            type: "post",
            data: {
                _token: "{{ csrf_token() }}",
                rate: rate,
                remark: remark,
                project: project
            },
            dataType: "json",
            success: function (data) {
                // console.log(data);
                if(data.status == 'success'){
                    Swal.fire({
                            html: `
                            <img src="{{ asset('assets/frontend/images/profile_customer/icon-suc.png') }}" style="width: 50px;">
                            <br><br>
                            ให้คะแนนสำเร็จ
                            <br>
                            `,
                            confirmButtonText: 'ปิด',
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            allowEnterKey: false
                        }).then((result) => {
                            if (result.isConfirmed) {                           
                                location.reload();
                            }
                        })                    
                }

            },
            error: function (error) {
                // console.log(error);
            }
        });

    }




    
</script>
@endsection