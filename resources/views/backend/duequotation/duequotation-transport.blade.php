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
                        <h5 class="mb-0 card-title flex-grow-1">อัพเดทเลขที่ขนส่ง</h5>
                    </div>
                </div>
                <div class="card-body">  
                    <div class="row">
                        <h5>รายการใบสั่งขาย</h5>
                        <form class="outer-repeater needs-validation" novalidate action="{{ route('duequotation.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-hover">
                                <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>เลขที่เอกสาร</th>
                                        <th>ลูกค้า</th>
                                        <th>เลขที่ขนส่ง</th>
                                        <th>หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hd as $item)
                                        <tr>
                                            <td>{{\Carbon\Carbon::parse($item->sal_salecommand_hd_date)->format('d/m/Y')}}</td>
                                            <td>
                                                {{$item->sal_salecommand_hd_docuno}}
                                                <input type="hidden" value="{{$item->sal_salecommand_hd_id}}" id="sal_salecommand_hd_id" name="sal_salecommand_hd_id[]">
                                                <input type="hidden" value="{{$item->sal_salecommand_hd_docuno}}" id="sal_salecommand_hd_docuno" name="sal_salecommand_hd_docuno[]">
                                            </td>
                                            <td>{{$item->ms_customer_name1}}</td>
                                            <td>
                                                <input class="form-control" id="docu_transport_number" name="docu_transport_number[]" type="text">
                                            </td>
                                            <td>
                                                <input class="form-control" id="docu_transport_remark" name="docu_transport_remark[]" type="text">
                                            </td>
                                        </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">บันทึก</button>
                        </form>
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