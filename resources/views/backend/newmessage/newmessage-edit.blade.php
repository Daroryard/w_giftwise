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
                        <h5 class="mb-0 card-title flex-grow-1">รับข่าวสารและไอเดีย Email : {{$hd->docu_newmessage_email}} @if($users) / เป็นสมาชิกเรียบร้อย @endif</h5>
                    </div>
                </div>
                <div class="card-body">     
                      @if($cust)
                      <form class="outer-repeater needs-validation" novalidate action="{{ route('newmessage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <label for="conf_customersub_code" class="form-label">Code</label>
                                <input type="text" class="form-control @error('conf_customersub_code') is-invalid @enderror" autocomplete="off" id="conf_customersub_code" name="conf_customersub_code" value="{{$cust->ms_customersub_code}}" autofocus required placeholder="Enter Code">
                                @error('conf_customersub_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" autocomplete="off" id="name" name="name" value="{{$cust->ms_customersub_name}}" autofocus required placeholder="Enter Name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="email" class="form-label">E-Mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" id="email" name="email" value="{{$cust->ms_customersub_email}}" autofocus required placeholder="Enter Email" readonly>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" id="password" name="password" value="123456" autofocus required placeholder="Enter Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> <br>
                        <div class="row">
                            @if ($users)                              
                            @else
                            <button type="submit" class="btn btn-primary waves-effect waves-light">สมัครสมาชิก</button>
                            @endif                            
                        </div>
                      </form>   
                      @else
                          <h5>ไม่มีข้อมูลในฐานข้อมูลผู้ติดต่อ</h5>
                      @endif
                      <div class="row">
                        <form class="outer-repeater needs-validation" novalidate action="{{ route('newmessage.update' , $hd->docu_newmessage_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('PUT')
                        <div class="col-12 col-md-12">
                        <label for="docu_newmessage_qty" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" name="docu_newmessagesub_remark" id="docu_newmessagesub_remark"></textarea><br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                        </div>
                        </form>
                      </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0 card-title flex-grow-1">รายละเอียด</h5>
                    <div class="table-responsive">
                        <table id="table-homeslide" class="table align-middle table-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รายละเอียด</th>
                                    <th>Date.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dt as $key => $item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->docu_newmessagesub_remark}}</td>
                                    <td>{{$item->created_at}}</td>
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
</script>
@endsection