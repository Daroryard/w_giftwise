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
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Main Product</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">DASHBOARD</a></li>
                            <li class="breadcrumb-item active">MAIN PRODUCT LISTS</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tb_job" class="table align-middle table-nowrap table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Status</th>
                                            <th>Product Code</th>
                                            <th>Product Name (TH)</th>
                                            <th>Product Name (EN)</th>
                                            {{-- <th></th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                        <tr>
                                            <td>
                                                @if($item->postweb == 1)
                                                <span class="badge bg-success">ใช้งาน</span>
                                                @else                                         
                                                <span class="badge bg-danger">ไม่ใช้งาน</span>
                                                @endif
                                            </td>
                                            <td>{{$item->conf_mainproduct_code}}</td>
                                            <td>{{$item->conf_mainproduct_name_th}}</td>
                                            <td>{{$item->conf_mainproduct_name_en}}</td>
                                            {{-- <th>
                                                <a href="{{ route('product.edit', $item->conf_mainproduct_id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            </th> --}}
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
            $('#tb_job').DataTable({
                "pageLength": 10,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]       
            })
        });
    </script>
@endsection
