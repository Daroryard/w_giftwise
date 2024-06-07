@extends('layouts.app')

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
        <!-- Sweet Alert-->
        <link href="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Reorder -->
        <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.bootstrap.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/libs/toastr/build/toastr.min.css') }}">
          <!-- Lightbox css -->
          <link href="{{ asset('assets/backend/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">เบิกสินค้าจากคลัง Giftwise</h5>
                    </div>
                </div>
                <div class="card-body">  
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-body">
                                <form class="outer-repeater needs-validation" novalidate action="{{ route('stockcustomer.update',$hd->docu_customerstock_id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="text-center">                                  
                                    @if($hd->ms_productsub_img1 == null)
                                    <img src="https://placehold.co/600x400?text=No image" alt="" class="img-fluid" width="300">
                                    @else           
                                    <a class="zoom-gallery" href="{{ asset($hd->ms_productsub_img1) }}"><img src="{{ asset($hd->ms_productsub_img1) }}" class="img-fluid" width="300"></a>
                                    @endif
                                    <h5 class="mt-3 mb-1">{{$hd->ms_product_name1}} ({{$hd->ms_typescreen_name}})</h5>
                                    <p class="text-muted mb-0">{{$hd->ms_product_code}}</p>                                                                                                                                        
                                </div> <br>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <ul class="list-unstyled mt-6">
                                            <li>
                                                <div class="d-flex">
                                                    <i class="bx bx-building-house text-primary fs-4"></i>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-2">{{$hd->ms_customer_fullname}}</h6>
                                                        <p class="text-muted fs-14 mb-0">ติดต่อ : {{$hd->ms_customersub_name}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-3">
                                                <div class="d-flex">
                                                    <i class="bx bx-phone text-primary fs-4"></i>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-2">Phone</h6>
                                                        <p class="text-muted fs-14 mb-0">{{$hd->ms_customersub_tel}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-3">
                                                <div class="d-flex">
                                                    <i class="bx bx-mail-send text-primary fs-4"></i>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-2">Email</h6>
                                                        <p class="text-muted fs-14 mb-0">{{$hd->ms_customersub_email}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mt-3">
                                                <div class="d-flex">
                                                    <i class="bx bx-map text-primary fs-4"></i>
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-2">Location</h6>
                                                        <p class="text-muted fs-14 mb-0">{{$hd->transport_address}}</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group row mb-4">
                                            <label for="sal_salecommand_hd_docuno" class="col-form-label col-lg-5">เลขที่ใบสั่งขาย</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control text-center" id="sal_salecommand_hd_docuno" name="sal_salecommand_hd_docuno" value="{{$hd->sal_salecommand_hd_docuno}}" readonly>
                                            <input type="hidden" id="sal_salecommand_dt_id" name="sal_salecommand_dt_id" value="{{$hd->sal_salecommand_dt_id}}">
                                            <input type="hidden" id="ms_product_code" name="ms_product_code" value="{{$hd->ms_product_code}}">
                                        </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="mpddocuno" class="col-form-label col-lg-5">Job No</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control text-center" id="mpddocuno" name="mpddocuno" value="{{$hd->mpddocuno}}" readonly>
                                        </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="ms_packing_name" class="col-form-label col-lg-5">Packing</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control text-center" id="ms_packing_name" name="ms_packing_name" value="{{$hd->ms_packing_name}}" readonly>
                                        </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label for="docu_customerstock_qty" class="col-form-label col-lg-5">จำนวนที่เบิก</label>
                                        <div class="col-lg-7">
                                            <input type="number" class="form-control text-center" id="docu_customerstock_qty" name="docu_customerstock_qty" value="{{number_format($hd->docu_customerstock_qty)}}" readonly>
                                        </div>
                                        </div>
                                                                              
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group row mb-4">
                                            <label for="refremark" class="col-form-label col-lg-3">หมายเหตุ</label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" id="refremark" name="refremark"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                            </form>
                            </div>
                        </div>
                    </div>               
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<!-- Required datatable js -->
<script src="{{ asset('assets/backend/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
<script src="{{ asset('assets/backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/backend/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

 <!-- toastr plugin -->
 <script src="{{ asset('assets/backend/libs/toastr/build/toastr.min.js') }}"></script>

     <!-- Magnific Popup-->
     <script src="{{ asset('assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

<!-- Responsive examples -->
<script src="{{ asset('assets/backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
</script>
@endsection