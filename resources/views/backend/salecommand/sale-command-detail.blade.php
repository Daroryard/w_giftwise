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
    <form action="{{ route('salecommand.review') }}" id="frm-review" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">SaleCommand</h5>
                    </div>
                </div>
                <div class="card-body">     
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_date" class="col-form-label col-lg-3">วันที่</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" name="sal_salecommand_hd_date" id="sal_salecommand_hd_date" value="{{ $hd->sal_salecommand_hd_date }}" readonly>
                                    <input type="text" name="sal_salecommand_hd_id" value="{{$hd->sal_salecommand_hd_id}}" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_docuno" class="col-form-label col-lg-3">เลขที่</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="sal_salecommand_hd_docuno" id="sal_salecommand_hd_docuno" value="{{ $hd->sal_salecommand_hd_docuno }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_duedate" class="col-form-label col-lg-3">กำหนดส่ง</label>
                                <div class="col-lg-9">
                                    <input type="date" class="form-control" name="sal_salecommand_hd_duedate" id="sal_salecommand_hd_duedate" value="{{ $hd->sal_salecommand_hd_duedate }}" readonly>
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
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_save" class="col-form-label col-lg-3">ผู้รับชำระ</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="sal_salecommand_hd_save" id="sal_salecommand_hd_save" value="{{ $hd->sal_salecommand_hd_save }}" readonly>
                                </div>
                            </div>                           
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_paypal" class="col-form-label col-lg-3">ยอดชำระ</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" name="sal_salecommand_hd_paypal" id="sal_salecommand_hd_paypal" value="{{number_format($hd->sal_salecommand_hd_paypal,2) }}" readonly>
                                </div>
                            </div>                           
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_file1" class="col-form-label col-lg-3">ใบกำกับภาษี</label>
                                <div class="col-lg-3">
                                    @if($hd->sal_salecommand_hd_file1)
                                    <a href="{{asset('https://erp.giftwise.co.th/'.$hd->sal_salecommand_hd_file1)}}" target="_blank">
                                        <i class="fas fa-file-pdf"></i>
                                    </a> 
                                    <p>เปิดเอกสาร</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_file1" class="col-form-label col-lg-3">เลขที่ขนส่ง</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{$hd->docu_transport_number}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group row mb-4">
                                <label for="sal_salecommand_hd_file1" class="col-form-label col-lg-3">หมายเหตุ</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" value="{{$hd->docu_transport_remark}}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                    <div class="row">
                        <h5>รายการสินค้า</h5>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th></th>
                                        <th>สินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ส่วนลด</th>
                                        <th>สุทธิ</th>
                                        <th>Job No.</th>
                                        <th>Review</th>
                                        <th>Remark</th>
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
                                            <td>
                                                {{$item->ms_product_code}}/{{$item->ms_product_name1}}
                                                <input type="text" name="sal_salecommand_dt_id[]" value="{{$item->sal_salecommand_dt_id}}" hidden>
                                            </td>
                                            <td>{{number_format($item->sal_salecommand_dt_qty,2)}}/{{$item->ms_product_unit_name}}</td>
                                            <td>{{number_format($item->sal_salecommand_dt_price,2)}}</td>
                                            <td>{{number_format($item->sal_salecommand_dt_totaldiscount,2)}}</td>
                                            <td>{{number_format($item->sal_salecommand_dt_netamount,2)}}</td>
                                            <td>{{$item->mpd_docuno}}</td>
                                            <td class="text-center">
                                             <span class="badge badge-success text-black">ให้คะแนนสินค้า 1 - 5</span>
                                             <input type="number" class="form-control" id="" name="star[]" min="1" max="5">
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="" name="remark[]"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="9">
                                                <span class="badge badge-success text-black">review 1</span>
                                                <input type="file" name="file1{{$item->sal_salecommand_dt_id}}" id="" class="mt-2" onchange="readURL(this,1,'{{$item->sal_salecommand_dt_id}}')" accept="image/*">
                                                <img src="" alt="" width="50" id="img1{{$item->sal_salecommand_dt_id}}" style="display:none">
                                           
                                                <span class="badge badge-success text-black">review 2</span>
                                                <input type="file" name="file2{{$item->sal_salecommand_dt_id}}" id="" class="mt-2" onchange="readURL(this,2,'{{$item->sal_salecommand_dt_id}}')" accept="image/*">
                                                <img src="" alt="" width="50" id="img2{{$item->sal_salecommand_dt_id}}" style="display:none">

                                           
                                                <span class="badge badge-success text-black">review 3</span>
                                                <input type="file" name="file3{{$item->sal_salecommand_dt_id}}" id="" class="mt-2" onchange="readURL(this,3,'{{$item->sal_salecommand_dt_id}}')" accept="image/*">
                                                <img src="" alt="" width="50" id="img3{{$item->sal_salecommand_dt_id}}" style="display:none">

                                          
                                                <span class="badge badge-success text-black">review 4</span>
                                                <input type="file" name="file4{{$item->sal_salecommand_dt_id}}" id="" class="mt-2" onchange="readURL(this,4,'{{$item->sal_salecommand_dt_id}}')" accept="image/*">
                                                <img src="" alt="" width="50" id="img4{{$item->sal_salecommand_dt_id}}" style="display:none">
                                            <td>                                         
                                        </tr>

                                    @endforeach
                                </tbody>
                                
                                <tfoot>
                                    @if($dt->count() > 0)
                                    <tr>
                                        <td colspan="9" class="text-right"></td>
                                        <td><button type="button" class="btn btn-success" style="width:100%" onclick="checkNull()">บันทึก</button></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="10" class="text-center">ไม่พบรายการสินค้าที่ยังไม่ Review</td>
                                    </tr>
                                    @endif                            
                            </table>
                        </div>                                             
                </div>
            </form>
               
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

checkNull = () => {

    let star = $('input[name="star[]"]').map(function(){return $(this).val();}).get();
    let remark = $('textarea[name="remark[]"]').map(function(){return $(this).val();}).get();
    let sal_salecommand_dt_id = $('input[name="sal_salecommand_dt_id[]"]').map(function(){return $(this).val();}).get();
    let sal_salecommand_hd_id = $('input[name="sal_salecommand_hd_id"]').val();



    if(star.filter(star => star == "") != ""){   

    Swal.fire({
        icon: 'error',
        title: '',
        text: 'กรุณาให้คะแนนให้ถูกต้อง',
    })
        
    }else{

        console.log(star);

        Swal.fire({
            title: 'ยืนยันการบันทึกข้อมูล',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#frm-review').submit();
            }
        })


    }

}

readURL = (input,id,dt_id) => {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img'+id+dt_id).attr('src', e.target.result);
            $('#img'+id+dt_id).show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
@endsection

