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
                        <h5 class="mb-0 card-title flex-grow-1">เบิกสินค้า</h5>
                        
                    </div>
                </div>
                <div class="card-body">   
                    <div class="table-responsive">
                        <table id="table-docu" class="table align-middle table-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>Status</th>  
                                    <th>Job No</th>   
                                    <th>Product</th>     
                                    <th>Qty</th>      
                                    <th>Screen</th>        
                                    <th>Packing</th>        
                                    <th>E-mail</th>     
                                    <th>Tel.</th>      
                                    <th>Company Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hd as $item)
                                    <tr>
                                        <td>
                                            @if ($item->docu_customerstock_status == "Y")
                                                อนุมัติ
                                            @else
                                                รอรับเรื่อง
                                            @endif
                                        </td>
                                        <td>
                                            {{$item->mpddocuno}}
                                        </td>
                                        <td>
                                            {{$item->ms_product_code}}/{{$item->ms_product_name}}
                                        </td>
                                        <td>
                                            {{number_format($item->docu_customerstock_qty,2)}}
                                        </td>
                                        <td>
                                            {{$item->ms_typescreen_name}}
                                        </td>
                                        <td>
                                            {{$item->ms_packing_name}}
                                        </td>
                                        <td>
                                            {{$item->docu_customer_email}}
                                        </td>
                                        <td>
                                            {{$item->docu_customer_tel}}
                                        </td>
                                        <td>
                                            {{$item->docu_customer_companyname}}
                                        </td>
                                        <td>
                                            <a href="{{route('stockcustomer.edit',$item->docu_customerstock_id)}}" class="btn btn-info"><i class="bx bx-edit"></i></a>
                                        </td>
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
        var table =  $('#table-docu').DataTable({
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