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
                        <h5 class="mb-0 card-title flex-grow-1">Project Detail</h5>
                    </div>
                </div>
                <div class="card-body">
                        {{-- <div class="progress">  
                            @if($hd1 <> null)
                            <div class="progress-bar" role="progressbar" style="width: 20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20%</div>
                            @elseif($hd2 <> null)
                            <div class="progress-bar" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">40%</div>
                            @endif                          
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div> --}}
                        <div class="row">
                        <div class="mt-5">
                            <div class="position-relative m-4">
                                <div class="col-12 col-md-12">                                   
                                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>สถานะ</th>
                                                <th>วันที่</th>
                                                <th>เลขที่ใบเสนอราคา</th>
                                                <th>กำหนดส่ง</th>
                                                <th>พนักงานขาย</th>
                                                <th>ลูกค้า</th>
                                                <th>ราคา</th>
                                                <th>ส่วนลด</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($hd1 as $item)
                                            <tr>
                                                <td>{{$item->sal_quotation_status_name}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_date)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_docuno}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_duedate)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_save}}</td>
                                                <td>{{$item->ms_customer_name1}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_netamount,2)}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_discount,2)}}</td>
                                                <td>
                                                    <a href="{{route('salequotation.show',$item->sal_quotation_hd_id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> 
                                                    <a href="{{url('/printQuotation/'.$item->sal_quotation_hd_id)}}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a> 
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-5">
                            <div class="position-relative m-4">
                                <div class="col-12 col-md-12">                                   
                                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>สถานะ</th>
                                                <th>วันที่</th>
                                                <th>เลขที่ใบแจ้งหนี้</th>
                                                <th>กำหนดส่ง</th>
                                                <th>พนักงานขาย</th>
                                                <th>ลูกค้า</th>
                                                <th>ราคา</th>
                                                <th>ส่วนลด</th>
                                                <th>% ชำระ</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($hd2 as $item)
                                            <tr>
                                                <td>{{$item->sal_quotation_status_name}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_date)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_docuno}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_duedate)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_save}}</td>
                                                <td>{{$item->ms_customer_name1}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_netamount,2)}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_discount,2)}}</td>
                                                <td>{{number_format($item->docupercent,2)}}</td>
                                                <td>
                                                    <a href="{{url('/printInvoiceQt/'.$item->sal_quotation_hd_id)}}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a> 
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="mt-5">
                            <div class="position-relative m-4">
                                <div class="col-12 col-md-12">                                   
                                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">3</button><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>สถานะ</th>
                                                <th>วันที่</th>
                                                <th>เลขที่ใบยืนยันออเดอร์</th>
                                                <th>กำหนดส่ง</th>
                                                <th>พนักงานขาย</th>
                                                <th>ลูกค้า</th>
                                                <th>ราคา</th>
                                                <th>ส่วนลด</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($hd3 as $item)
                                            <tr>
                                                <td>{{$item->sal_quotation_status_name}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_date)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_docuno}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_duedate)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_save}}</td>
                                                <td>{{$item->ms_customer_name1}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_netamount,2)}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_discount,2)}}</td>
                                                <td>
                                                    <a href="{{route('saleconfirmorder.show',$item->sal_quotation_hd_id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> 
                                                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a> 
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-5">
                            <div class="position-relative m-4">
                                <div class="col-12 col-md-12">                                   
                                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">4</button><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>สถานะ</th>
                                                <th>วันที่</th>
                                                <th>เลขที่ใบสั่งขาย</th>
                                                <th>กำหนดส่ง</th>
                                                <th>ผู้รับชำระ</th>
                                                <th>ลูกค้า</th>
                                                <th>ราคา</th>
                                                <th>ส่วนลด</th>
                                                <th>ยอดชำระ</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($hd4 as $item)
                                            <tr>
                                                <td>{{$item->sal_quotation_status_name}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_date)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_docuno}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_duedate)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_save}}</td>
                                                <td>{{$item->ms_customer_name1}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_netamount,2)}}</td>
                                                <td>{{number_format($item->sal_quotation_hd_discount,2)}}</td>
                                                <td>{{number_format($item->docupercent,2)}}</td>
                                                <td>
                                                    <a href="{{route('salecommand.show',$item->sal_quotation_hd_id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> 
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="mt-5">
                            <div class="position-relative m-4">
                                <div class="col-12 col-md-12">                                   
                                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">5</button><br>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>สถานะ</th>
                                                <th>วันที่</th>
                                                <th>เลขที่ใบสั่งซื้อ</th>
                                                <th>กำหนดส่ง</th>
                                                <th>ลูกค้า</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($hd5 as $item)
                                            <tr>
                                                <td>{{$item->sal_quotation_status_name}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_date)->format('d/m/Y')}}</td>
                                                <td>{{$item->sal_quotation_hd_docuno}}</td>
                                                <td>{{\Carbon\Carbon::parse($item->sal_quotation_hd_duedate)->format('d/m/Y')}}</td>
                                                <td>{{$item->ms_customer_name1}}</td>
                                                <td>
                                                    <a href="{{route('purchaseorder.show',$item->sal_quotation_hd_id)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a> 
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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