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
                        <h5 class="mb-0 card-title flex-grow-1">ประวัติการซื้อ</h5>
                    </div>
                </div>
                <div class="card-body">  
                    <div class="table-responsive">
                        <table id="table-order" class="table align-middle table-nowrap table-hover">
                            <thead>
                                <tr>                                   
                                    <th>ผู้ติดต่อ</th>
                                    <th>วันที่</th>
                                    <th>อีเมล</th>
                                    <th>เบอร์</th>
                                    <th>บริษัท</th>
                                    <th>รูป</th>
                                    <th>สินค้า</th>
                                    <th>จำนวน</th>
                                    <th>ราคาต่อหน่วย</th>
                                    <th>ราคารวม</th>
                                    <th>ส่วนลด</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hd as $item)
                                    <tr>
                                        <td>{{$item->ms_customersub_name}}</td>
                                        <td>{{\Carbon\Carbon::parse($item->sal_salecommand_hd_date)->format('d/m/Y')}}</td>
                                        <td>{{$item->ms_customersub_email}}</td>
                                        <td>{{$item->ms_customersub_tel}}</td>
                                        <td>{{$item->ms_customer_fullname}}</td>
                                        <td>
                                            @if($item->ms_productsub_img1)
                                            <a class="zoom-gallery" href="{{ asset($item->ms_productsub_img1) }}"><img src="{{ asset($item->ms_productsub_img1) }}" class="img-fluid" width="40"></a>
                                            @else
                                            <img src="https://placehold.co/600x400?text=No image" alt="" class="img-fluid" width="40">
                                            @endif
                                        </td>
                                        <td>{{$item->ms_product_code}}/{{$item->ms_product_name1}}</td>
                                        <td>{{number_format($item->sal_salecommand_dt_qty,2)}}/{{$item->ms_product_unit_name}}</td>
                                        <td>{{number_format($item->sal_salecommand_dt_price,2)}}</td>
                                        <td>{{number_format($item->sal_salecommand_dt_netamount,2)}}</td>
                                        <td>{{number_format($item->sal_salecommand_dt_totaldiscount,2)}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
$(document).ready(function() {
        var table =  $('#table-order').DataTable({
            order: [[ 1, 'asc' ]],
            columnDefs: [
            { orderable: false, targets: [0 , -1] }, // Disable ordering for the hidden column
        ],
        rowReorder: {
            selector: 'tr td:nth-child(1)',
            dataSrc: 1, // Specify the index of the column containing the icon
        }
    })
});
</script>
@endsection