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
                        <h5 class="mb-0 card-title flex-grow-1">Quotation</h5>
                    </div>
                </div>
                <div class="card-body">    
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_quotation_hd_date" class="col-form-label col-lg-3">วันที่</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" name="sal_quotation_hd_date" id="sal_quotation_hd_date" value="{{ $hd->sal_quotation_hd_date }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_quotation_hd_docuno" class="col-form-label col-lg-3">เลขที่</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="sal_quotation_hd_docuno" id="sal_quotation_hd_docuno" value="{{ $hd->sal_quotation_hd_docuno }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_quotation_hd_duedate" class="col-form-label col-lg-3">กำหนดส่ง</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" name="sal_quotation_hd_duedate" id="sal_quotation_hd_duedate" value="{{ $hd->sal_quotation_hd_duedate }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="ms_customersub_name" class="col-form-label col-lg-3">ผู้ติดต่อ</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ms_customersub_name" id="ms_customersub_name" value="{{ $hd->ms_customersub_name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="ms_customersub_email" class="col-form-label col-lg-3">อีเมล์</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ms_customersub_email" id="ms_customersub_email" value="{{ $hd->ms_customersub_email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="ms_customersub_tel" class="col-form-label col-lg-3">เบอร์โทร</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ms_customersub_tel" id="ms_customersub_tel" value="{{ $hd->ms_customersub_tel }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="ms_customer_fullname" class="col-form-label col-lg-3">ลูกค้า</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="ms_customer_fullname" id="ms_customer_fullname" value="{{ $hd->ms_customer_fullname }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group row mb-4">
                                <label for="ms_customer_address" class="col-form-label col-lg-1">ที่อยู่</label>
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" name="ms_customer_address" id="ms_customer_address" value="{{ $hd->ms_customer_address }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_quotation_hd_save" class="col-form-label col-lg-3">ผู้ขาย</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="sal_quotation_hd_save" id="sal_quotation_hd_save" value="{{ $hd->sal_quotation_hd_save }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="form-group row mb-4">
                                <label for="ms_customer_address" class="col-form-label col-lg-1">ชำระ</label>
                                <div class="col-lg-11">
                                    <input type="text" class="form-control" name="ms_customer_address" id="ms_customer_address" value="ธ.ไทยพาณิชย์ ออมทรัพย์ 0122770036 กิ๊ฟไวซ์เอเชีย" readonly>
                                </div>
                            </div>
                        </div>
                    </div><hr>   
                    <div class="row">
                        <h5>รายการสินค้า</h5>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th></th>
                                        <th>สินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ส่วนลด</th>
                                        <th>สุทธิ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dt as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                @if($item->ms_productsub_img1)
                                                <a class="zoom-gallery" href="{{ asset('https://erp.giftwise.co.th/'.$item->ms_productsub_img1) }}"><img src="{{ asset('https://erp.giftwise.co.th/'.$item->ms_productsub_img1) }}" class="img-fluid" width="40"></a>
                                                @else
                                                <img src="https://placehold.co/600x400?text=No image" alt="" class="img-fluid" width="40">
                                            @endif
                                            </td>
                                            <td>{{$item->ms_product_code}}/{{$item->ms_product_name1}}</td>
                                            <td>{{number_format($item->sal_quotation_dt_qty,2)}}/{{$item->ms_product_unit_name}}</td>
                                            <td>{{number_format($item->sal_quotation_dt_price,2)}}</td>
                                            <td>{{number_format($item->sal_quotation_dt_totaldiscount,2)}}</td>
                                            <td>{{number_format($item->sal_quotation_dt_netamount,2)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <label for="ms_customer_address" class="col-form-label">หมายเหตุ</label><br>
                            <label for="ms_customer_address" class="col-form-label">{{$hd->quotation_remark1}}</label><br>
                            <label for="ms_customer_address" class="col-form-label">{{$hd->quotation_remark2}}</label><br>
                            <label for="ms_customer_address" class="col-form-label">{{$hd->quotation_remark3}}</label><br>
                            <label for="ms_customer_address" class="col-form-label">{{$hd->quotation_remark4}}</label><br>
                            <label for="ms_customer_address" class="col-form-label">{{$hd->quotation_remark5}}</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group row mb-4">
                                <label for="ms_customer_address" class="col-form-label col-lg-4">ฐานภาษี</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="ms_customer_address" id="ms_customer_address" value="{{number_format($hd->sal_quotation_hd_basevat)}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="ms_customer_address" class="col-form-label col-lg-4">ภาษี</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="ms_customer_address" id="ms_customer_address" value="{{number_format($hd->sal_quotation_hd_vat)}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="ms_customer_address" class="col-form-label col-lg-4">สุทธิ</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="ms_customer_address" id="ms_customer_address" value="{{number_format($hd->sal_quotation_hd_netamount)}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="ms_customer_address" class="col-form-label col-lg-4">ส่วนลด</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" name="ms_customer_address" id="ms_customer_address" value="{{number_format($hd->sal_quotation_hd_discount)}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                    <div class="row">
                        <h5>รอบการจ่าย</h5>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>รายละเอียด</th>
                                        <th>วันที่</th>
                                        <th>%</th>
                                        <th>ยอดชำระ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pay as $key => $item)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$item->sal_quotation_Invoice_remark}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->sal_quotation_Invoice_duedate)->format('d/m/Y')}}</td>
                                            <td>{{$item->sal_quotation_Invoice_percent}}</td>
                                            <td>{{number_format($item->sal_quotation_Invoice_price,2)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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