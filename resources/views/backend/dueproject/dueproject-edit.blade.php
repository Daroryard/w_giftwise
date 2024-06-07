@extends('layouts.app')
@section('css')
<!-- DataTables -->
<link href="{{ asset('assets/backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"type="text/css" />
<link href="{{ asset('assets/backend/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"type="text/css" />
<!-- Sweet Alert-->
<link href="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Reorder -->
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.bootstrap.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/libs/toastr/build/toastr.min.css') }}">
<!-- Lightbox css -->
<link href="{{ asset('assets/backend/libs/magnific-popup/magnific-popup.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">ใบเสนอราคา Email : {{$hd->docu_project_email}} @if($users) / เป็นสมาชิกเรียบร้อย @endif</h5>
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
                       <h5 class="mb-0 card-title flex-grow-1" style="color: red">ไม่มีข้อมูลในฐานข้อมูลผู้ติดต่อ</h5>
                      @endif 
                    <hr>
                    <h5 class="mb-0 card-title flex-grow-1">รายละเอียดลูกค้า</h5>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <label for="docu_project_name" class="form-label">ชื่อโปรเจค</label>
                            <input class="form-control" value="{{$hd->docu_project_name}}" readonly>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="docu_project_objective" class="form-label">จุดประสงค์ของงาน</label>
                            <input class="form-control" value="{{$hd->docu_project_objective}}" readonly>
                        </div>
                    </div>       
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="docu_project_looking" class="form-label">สินค้าที่มองหา</label>
                            <input class="form-control" value="{{$hd->docu_project_looking}}" readonly>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="docu_project_productqty" class="form-label">จำนวน</label>
                            <input class="form-control" value="{{$hd->docu_project_productqty}}" readonly>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="docu_project_productday" class="form-label">ระยะเวลา</label>
                            <input class="form-control" value="{{$hd->docu_project_productday}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label for="docu_project_themeproduct" class="form-label">ธีมสินค้า</label>
                            <input class="form-control" value="{{$hd->docu_project_themeproduct}}" readonly>
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label for="docu_project_need" class="form-label">รายละเอียด</label>
                            <input class="form-control" value="{{$hd->docu_project_need}}" readonly>
                        </div>
                    </div>                    
                </div>
            </div>
            @if($hd->ms_customersub_code)
            @else
            <div class="card">
                <div class="card-body">  
                    <form class="outer-repeater needs-validation" novalidate action="{{route('dueproject.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf                   
                    <h5 class="mb-0 card-title flex-grow-1">เพิ่มดีล</h5>
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <label for="ms_customerduelist_date" class="form-label" style="color: red">วันที่</label>
                            <input type="date" class="form-control @error('ms_customerduelist_date') is-invalid @enderror" autocomplete="off" id="ms_customerduelist_date" name="ms_customerduelist_date" value="{{date('Y-m-d')}}" autofocus required>
                            @error('ms_customerduelist_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="ms_customerduelist_duedate" class="form-label" style="color: red">วันที่เข้า</label>
                            <input type="date" class="form-control" autocomplete="off" id="ms_customerduelist_duedate" name="ms_customerduelist_duedate" value="{{date('Y-m-d')}}" >
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="ms_sales_funnel_id" class="form-label" style="color: red">ช่องทางที่เข้ามา</label>
                            <select class="form-control" name="ms_sales_funnel_id" id="ms_sales_funnel_id">
                                <option value="0" selected>เลือกช่องทางที่เข้ามา</option>
                                @foreach ($sales as $item)
                                <option value="{{$item->ms_sales_funnel_id}}">{{$item->ms_sales_funnel_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="ms_customerduelist_senddate" class="form-label" style="color: red">วันที่ต้องการใช้งาน</label>
                            <input type="text" class="form-control" autocomplete="off" id="ms_customerduelist_senddate" name="ms_customerduelist_senddate" value="{{date('Y-m-d')}}" >
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="ms_customersub_newsale" class="form-label" style="color: red">Sales ที่ดูแลล่าสุด</label>
                            <select class="form-control" name="ms_customersub_newsale" id="ms_customersub_newsale">
                                <option value="" selected>กรุณาเลือกพนักงานขาย</option>
                                @foreach ($emps as $emp)
                                <option value="{{ $emp->name }}">{{$emp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="sale_id" class="form-label" style="color: red">Assign to</label>
                            <select class="form-control" name="sale_id" id="sale_id">
                                <option value="" selected>กรุณาเลือกพนักงานขาย</option>
                                @foreach ($emps as $emp)
                                <option value="{{ $emp->id }}">{{$emp->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">        
                        <div class="col-12 col-md-8">
                            <label for="ms_customer_id" class="form-label" style="color: red">ลูกค้า</label>
                            <select class="select2 form-control" name="ms_customer_id" id="ms_customer_id">
                                <option value="" selected>กรุณาเลือกลูกค้า</option>
                                @foreach ($customer as $item)
                                <option value="{{$item->ms_customer_id}}">{{$item->ms_customer_fullname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="ms_customersub_id" class="form-label" style="color: red">ผู้ติดต่อ</label>
                            <select class="form-control" name="ms_customersub_id" id="ms_customersub_id">
                                <option value="" selected>กรุณาเลือกผู้ติดต่อ</option>
                            </select>
                        </div>                                    
                        <div class="col-12 col-md-2">
                            <label for="ms_customerduelist_price" class="form-label" style="color: red">มูลค่าดีลคาดการณ์</label>
                            <input type="number" class="form-control" autocomplete="off" id="ms_customerduelist_price" name="ms_customerduelist_price" value="{{old('ms_customerduelist_price',0)}}" >
                        </div>                                             
                    </div>
                    <div class="row">  
                        <div class="col-12 col-md-12">
                            <label for="ms_customerduelist_remark" class="form-label" style="color: red">รายละเอียด</label>
                            <textarea class="form-control" autocomplete="off" id="ms_customerduelist_remark" name="ms_customerduelist_remark"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                    </div>
                    </form>
                </div>
            </div>
            @endif
            
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
<script src="{{ asset('assets/backend/libs/select2/js/select2.min.js') }}"></script>
<script>
$('#ms_customer_id').change(function () {
    $.ajax({
        type: "POST",
        url: "{{ route('dueproject.getSubCustomer') }}",
        data: {
            ms_customer_id : $(this).val() ,
            _token : "{{ csrf_token() }}"
        },
        dataType: "json",
        success: function (response) {
            if (response.status == true) {
                            var subcustomerHtml = `<option value="">เลือกผู้ติดต่อ</option>`;
                                $.each(response.subcustomer, function (i, value) { 
                                    subcustomerHtml += `<option value="${value.ms_customersub_id}">${value.ms_customersub_code } / ${value.ms_customersub_name }</option>`;
                            });
                            $('#ms_customersub_id').attr('disabled', false);
                            $('#ms_customersub_id').html(subcustomerHtml);
                            } else{
                                $('#ms_customersub_id').attr('disabled', true);
                                $('#ms_customersub_id').html(`<option value="">ไม่พบข้อมูล</option>`);
                            }              
        }
    });
}) 
</script>
@endsection