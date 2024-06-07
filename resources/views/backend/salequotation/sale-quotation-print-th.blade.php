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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<!-- font-->
<link href='https://fonts.googleapis.com/css?family=Kanit' rel='stylesheet'>
<style>
    @media print {
  .no-print, .no-print * {
    display: none !important;
  }

  div.page-break-after {
    display: block !important;
    page-break-after: always;
    padding: 15px;
    /* border: 1px solid #ccc; */
  }
  table {
    width: 100%;
    /* border: 0px solid #000 !important;
    border-left: none !important;
    border-right: none !important; */

  }
}
</style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body border-bottom">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 card-title flex-grow-1">Print Quotation</h5>
                    </div>
                </div>
                <div class="card-body">  
                    <div class="d-print-none">
                        <div class="" id="list-bt" style="float:center !important">
                        <a href="javascript:window.print()" class="btn btn-info waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                        <!-- translate eng -->
                        <a href="{{ url('/printQuotationEn/'.$hd->sal_quotation_hd_id)}}" class="btn btn-success waves-effect waves-light me-1" id="btn-eng"><i class="fa fa-language"></i> EN</a>
                        {{-- <a href="{{ url('/quotation') }}" class="btn btn-primary w-md waves-effect waves-light" >กลับหน้าที่แล้ว</a>      --}}
                        </div>
</div>
<div class='page-break-after'  style="font-size: 12px;">
<div class="invoice-title" id="">
                         <br>
                        <div class="row">
                        <div class="col-sm-3 text-sm">
                        <img src="{{ asset('assets/images/logo/giftwise_logo.jpg') }}" alt="logo" height="100"/>                                         
                        </div>
                        <div class="col-sm-5 text-sm" id="company_1"></div>
                        <div class="col-sm-4 text-sm" style="background-color: #F0EFFD;">
                        <span style="text-align: right;">
                        <h2>ใบเสนอราคา<br>Quotation </h2>
                        <p>(ต้นฉบับ / original)</p>
                        <p id="headqt"></p>
                        </span>                               
                         </div>
                        </div>
                   
                     
                        </div>                   

                        <div class="mb-4">
                        <!-- <img src="{{ asset('assets/images/logo/giftwise_logo.jpg') }}" alt="logo" height="100"/>                                          -->
                        <br>

                        <div class="row" style="margin-top: 10px;">
                        <div class="col-sm-6 text-sm" id="cus_data"></div>
                        <div class="col-sm-6 text-sm" id="cus_contact"></div>

                        <hr style="margin:10px">


                        </div>
            
                        </div>
                        <div class="row" style="margin:5px;">
                        <div class="col-sm-12 text-sm" id="tbquo">
                       
                        </div>
                        <hr style="border: 1px solid #E8E8E8;">

                        <div class="row">
                        <div class="col-sm-12 text-sm" id="depo_list">

                        </div>                                     
                        </div>

                        <hr style="border: 1px solid #E8E8E8;">
                        <div class="col-sm-1 text-sm text-center">
                        <b>รับรอง</b> 
                        </div>

                        <div class="col-sm-3 text-sm">
                        <b>ผู้ออกเอกสาร (ผู้ขาย)</b>
                        <br>
                        <br>
                        <br>
                         <p id="create_by"></p>
                        </div>
                        <div class="col-sm-3 text-sm text-center">
                        <b>ผู้อนุมัติเอกสาร (ผู้ขาย)</b><br>
                        <br>
                        <br>
                        <br>
                         <p id="approv_by"></p>
                        </div>
                        <div class="col-sm-3 text-sm">
                        <b>ผู้รับเอกสาร (ลูกค้า)</b>
                        <br>
                        <br>
                        <br>
                        ....................................................... <br>
                        วันที่ / Date
                        </div>
                        <div class="col-sm-2 text-sm">
                        <b>ตราประทับ</b>
                        <img src="{{ asset('assets/images/border_logo.png') }}" height="80">
                        </div>



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
<script src="{{ asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
<script src="{{ asset('/assets/js/pages/form-validation.init.js') }}"></script>
<script src="{{ asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
<script src="{{ asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<!-- toastr plugin -->
<script src="{{ asset('/assets/libs/toastr/toastr.min.js') }}"></script>
<!-- toastr init -->
<script src="{{ asset('/assets/js/pages/toastr.init.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Sweet alert init js-->
<script src="{{ asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script>
 $(document).ready(function() {
        loadData('{{$id}}')
    });
    function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
    

loadData = (id) =>{

$.ajax({
    url: "{{ url('/getQuotationDetailPrint') }}",
    type: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        refid: id,
    },
    dataType: "json",
    success: function(data) {

        console.log(data)

        if(data.hd.ms_customer_taxid == null){
            data.hd.ms_customer_taxid = '-'
        }else{
            data.hd.ms_customer_taxid = data.hd.ms_customer_taxid
        }

        if(data.hd.ms_customer_fulladdress == null){
            data.hd.ms_customer_fulladdress = '-'
        }else{
            data.hd.ms_customer_fulladdress = data.hd.ms_customer_fulladdress
        }

        if(data.hd.ms_customer_fullname == null){
            data.hd.ms_customer_fullname = '-'
        }else{
            data.hd.ms_customer_fullname = data.hd.ms_customer_fullname
        }

        if(data.hd.ms_customer_contact == null){
            data.hd.ms_customer_contact = '-'
        }else{
            data.hd.ms_customer_contact = data.hd.ms_customer_contact
        }

        if(data.hd.ms_customer_tel == null){
            data.hd.ms_customer_tel = '-'
        }else{
            data.hd.ms_customer_tel = data.hd.ms_customer_tel
        }


        if(data.hd.ms_customer_email == null){
            data.hd.ms_customer_email = '-'
        }else{
            data.hd.ms_customer_email = data.hd.ms_customer_email
        }


        let remark_all = ''

        $.each(data.remark, function() {
            remark_all += this.quotation_remark_note + '<br>'
        });



        // docuno 
        $('#headqt').html(`
        <b>เลขที่ / No. </b>${data.hd.sal_quotation_hd_docuno}<br>
        <b>วันที่ / Issue. </b>${moment(data.hd.sal_quotation_hd_date).format('DD/MM/YYYY')}<br>
        `)


        if(data.hd.ms_customersub_name == null || data.hd.ms_customersub_name == '' || data.hd.ms_customersub_name == 'NULL'){
            data.hd.ms_customersub_name = '-'
        }else{
            data.hd.ms_customersub_name = data.hd.ms_customersub_name
        }

        if(data.hd.ms_customersub_email == null || data.hd.ms_customersub_email == '' || data.hd.ms_customersub_email == 'NULL'){
            data.hd.ms_customersub_email = '-'
        }else{
            data.hd.ms_customersub_email = data.hd.ms_customersub_email
        }

        if(data.hd.ms_customersub_tel == null || data.hd.ms_customersub_tel == '' || data.hd.ms_customersub_tel == 'NULL'){
            data.hd.ms_customersub_tel = '-'
        }else{
            data.hd.ms_customersub_tel = data.hd.ms_customersub_tel
        }


        let cusname = ``
        
        // console.log(data.ms_customer)
        if(data.ms_customer.ms_branch_name == null){
            cusname = ''
        }else{

            if(data.ms_customer.ms_branch_name == 'สาขา' && data.ms_customer.ms_branch_number != null){
                cusname = data.ms_customer.ms_branch_name + ' ' + data.ms_customer.ms_branch_number
            }else if(data.ms_customer.ms_branch_name == 'สาขา' && data.ms_customer.ms_branch_number == null){
                cusname = data.ms_customer.ms_branch_name
            }else{
                cusname = data.ms_customer.ms_branch_name
            }
        }




        // รายละเอียดลูกค้า
        $('#cus_data').html(`
        <b>ลูกค้า / Customer :</b> ${data.hd.ms_customer_fullname} ${cusname}<br>
        <b>ที่อยู่ / Address :</b> ${data.hd.ms_customer_fulladdress}<br>
        <b>เลขผู้เสียภาษี / Tax ID :</b> ${data.hd.ms_customer_taxid}<br>
        <b>ผู้ติดต่อ / Attention :</b>  ${data.hd.ms_customersub_name}
        `)

        $('#cus_contact').html(`
        <b>อีเมล์/Email : </b> ${data.hd.ms_customersub_email}<br>
        <b>เบอร์/Tel. </b> ${data.hd.ms_customersub_tel}
        `)

        $('#company_1').html(`
        ${data.company[0].ms_company_name} ${data.company[0].ms_company_branch}<br>
        ${data.company[0].ms_company_address}<br>
        เลขผู้เสียภาษี / Tax ID : ${data.company[0].ms_company_taxid}<br>
        จัดเตรียมโดย / Prepared by : ${data.hd.sal_quotation_hd_save}<br>
        Tel : ${data.company[0].ms_company_tel} Email : ${data.company[0].ms_company_email}<br>
        Website : ${data.company[0].ms_company_web}
        `)


        $('#create_by').html(`${data.hd.sal_quotation_hd_save} <br> ${moment(data.hd.sal_quotation_hd_date).format('DD/MM/YYYY')}`)


        let date_app = '';
        
        if(data.hd.approval_save == null){
            data.hd.approval_save = '-'
            date_app = '-'
        }else{
            data.hd.approval_save = data.hd.approval_save
            date_app = moment(data.hd.approval_datenow).format('DD/MM/YYYY')
        }

        $('#approv_by').html(`${data.hd.approval_save} <br> ${date_app}`)






        let el_td = ''
        let cal_net = 0;

        $.each(data.dt , function(){

            cal_net = (this.sal_quotation_dt_price * this.sal_quotation_dt_qty) - this.sal_quotation_dt_totaldiscount

            if(this.sal_quotation_dt_remark == null){
                this.sal_quotation_dt_remark = '';
            }else{
                this.sal_quotation_dt_remark = this.sal_quotation_dt_remark;
            }



            el_td += `<tr>
            <td class="text-center" style="border-left-color:#fff">${this.ms_product_code}</td>
            <td class="text-center">${this.ms_product_name1}<br>${this.sal_quotation_dt_remark}</td>
            <td class="text-center">${this.sal_quotation_dt_qty}</td>
            <td class="text-center">${data.hd.ms_currency_logo} ${numberWithCommas(this.sal_quotation_dt_price)}</td>
            <td class="text-center">${data.hd.ms_currency_logo} ${numberWithCommas(this.sal_quotation_dt_totaldiscount)}</td>
            <td class="text-center" style="border-right-color:#fff">${data.hd.ms_currency_logo} ${numberWithCommas(cal_net)}</td>
            </tr>
            `


        })


        let tr_depo = ''

      

        $.each(data.podepo , function(depo_key , depo_value){

        if(depo_value.sal_quotation_Invoice_remark == null){
            depo_value.sal_quotation_Invoice_remark = '';
        }else{
            depo_value.sal_quotation_Invoice_remark = depo_value.sal_quotation_Invoice_remark;
        }


            tr_depo += `
            <tr class="text-center">
                <td class="text-sm">${depo_value.sal_quotation_Invoice_duedate}</td>
                <td class="text-sm">${data.hd.ms_currency_logo} ${numberWithCommas(parseFloat(depo_value.sal_quotation_Invoice_price).toFixed(2))}</td>
                <td class="text-sm">${numberWithCommas(parseFloat(depo_value.sal_quotation_Invoice_percent).toFixed(2))}</td>
                <td class="text-sm">${depo_value.sal_quotation_Invoice_remark}</td>
            `
        })







        if(data.hd.quotation_remark1 == null){
            data.hd.quotation_remark1 = '-'
        }else{
            data.hd.quotation_remark1 = data.hd.quotation_remark1
        }

        if(data.hd.quotation_remark2 == null){
            data.hd.quotation_remark2 = '-'
        }else{
            data.hd.quotation_remark2 = data.hd.quotation_remark2
        }

        if(data.hd.quotation_remark3 == null){
            data.hd.quotation_remark3 = '-'
        }else{
            data.hd.quotation_remark3 = data.hd.quotation_remark3
        }

        if(data.hd.quotation_remark4 == null){
            data.hd.quotation_remark4 = '-'
        }else{
            data.hd.quotation_remark4 = data.hd.quotation_remark4
        }

        if(data.hd.quotation_remark5 == null){
            data.hd.quotation_remark5 = '-'
        }else{
            data.hd.quotation_remark5 = data.hd.quotation_remark5
        }
        // sal_quotation_dt_totaldiscount

        let checktypevat;

        // if(data.hd.ms_typevat_id == 6){
        //     checktypevat = 
        // }

        let cal_basevat = parseFloat(data.hd.sal_quotation_hd_basevat)
        let cal_vat = parseFloat(data.hd.sal_quotation_hd_vat)
        let cal_netamount = cal_basevat + cal_vat

        let textprice = parseFloat(cal_netamount).toFixed(2)

        
        $('#tbquo').html(`
        <table class="table table-bordered" width="100%">
                                            <thead>
                                            <tr>
                                            <th class="text-center" style="border-left:none"><b>รหัส</b><br>ID no.</th>
                                            <th class="text-center"><b>คำอธิบาย</b><br>Description</th>
                                            <th class="text-center"><b>จำนวน</b><br>Quantity</th>
                                            <th class="text-center"><b>ราคาต่อหน่วย</b><br>Unit Price</th>
                                            <th class="text-center"><b>ส่วนลด</b><br>Discount</th>
                                            <th class="text-center" style="border-right:none"><b>มูลค่าก่อนภาษี</b><br>Pre-Tax Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            ${el_td}
                                            </tbody>
                                            </table>
                                            <table class="table table-responsive" width="100%">             
                                            <tr> 
                                            <td style="border-left:none;max-width:600px">
                                            <b>สรุป</b><br>
                                            </td>                                                                                                                       
                                            <td colspan="2" style="text-align:left">
                                            <b>ราคาสุทธิที่เสียภาษี</b><br>Pre-VAT Amount<br>
                                            <b>ภาษีมูลค่าเพิ่ม</b><br>VAT<br>
                                            <b>จำนวนเงินรวมทั้งสิ้น</b><br>Grand Total
                                            </td>
                                            <td colspan="3" style="border-right:none;text-align:right">
                                            ${data.hd.ms_currency_logo} ${numberWithCommas(cal_basevat.toFixed(2))}<br><br>
                                            ${data.hd.ms_currency_logo} ${numberWithCommas(cal_vat.toFixed(2))}<br><br>
                                            ${data.hd.ms_currency_logo} ${numberWithCommas(cal_netamount.toFixed(2))}
                                            </td>                                        
                                            <tr>
                                            <td>
                                            </td>
                                            <td colspan="1" style="border-left:none;text-align:left">
                                            <b>จำนวนเงินรวมทั้งสิ้น</b>
                                            </td>
                                            <td colspan="4" style="border-right:none;text-align:right">
                                            <b>${ThaiBaht(numberWithCommas(textprice))}</b>
                                            </td>                                      
                                            </tr>
                                            </tr>
                                            <tr>
                                            <td style="border-left:none"><b>ชำระเงิน</b></td>    
                                            <td colspan="5" style="border-right:none;text-align:left">
                                            <span><img src="{{ asset('assets/images/logo/bank.png') }}" alt="logo" height="25"/>                                         
                                             ธ.ไทยพาณิชย์<br>
                                            ออมทรัพย์ 0122770036<br>
                                            กิ๊ฟไวซ์เอเชีย
                                            </span>
                                            </td> 
                                            </tr>
                                            <tr>
                                            <td style="border-left:none"  colspan="6"><b>หมายเหตุ</b>
                                            <br>
                                            ${
                                              data.hd.quotation_remark1+ '<br>'+
                                              data.hd.quotation_remark2+ '<br>'+
                                              data.hd.quotation_remark3+ '<br>'+
                                              data.hd.quotation_remark4+ '<br>'+
                                              data.hd.quotation_remark5+ '<br>'
                                            }
                                            </td>     
                                            </tr>
                                            </tbody>
                                            </table>
        `)



                                            $('#depo_list').html(`
                                            <table class="table table-nowrap" style="width:100%">
                                                                                    <thead>
                                                    <tr class="text-center" style="background-color: #F1FAFF;">
                                                        <th>วันที่/Date.</th>
                                                        <th>จำนวนเงิน/Amount</th>
                                                        <th>%</th>                                                                                          
                                                        <th>หมายเหตุ/Remark</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                               ${tr_depo}
                                                </tbody>
                                            </table>`)
        

    }
})


}































function ThaiBaht(Number)
{
for (var i = 0; i < Number.length; i++)
{
Number = Number.replace (",", ""); //ไม่ต้องการเครื่องหมายคอมมาร์
Number = Number.replace (" ", ""); //ไม่ต้องการช่องว่าง
Number = Number.replace ("บาท", ""); //ไม่ต้องการตัวหนังสือ บาท
Number = Number.replace ("฿", ""); //ไม่ต้องการสัญลักษณ์สกุลเงินบาท
}
//สร้างอะเรย์เก็บค่าที่ต้องการใช้เอาไว้
var TxtNumArr = new Array ("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า", "สิบ");
var TxtDigitArr = new Array ("", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
var BahtText = "";
//ตรวจสอบดูซะหน่อยว่าใช่ตัวเลขที่ถูกต้องหรือเปล่า ด้วย isNaN == true ถ้าเป็นข้อความ == false ถ้าเป็นตัวเลข
if (isNaN(Number))
{
return "ข้อมูลนำเข้าไม่ถูกต้อง";
} else
{
//ตรวสอบอีกสักครั้งว่าตัวเลขมากเกินความต้องการหรือเปล่า
if ((Number - 0) > 9999999.9999)
{
return "ข้อมูลนำเข้าเกินขอบเขตที่ตั้งไว้";
} else
{
//พรากทศนิยม กับจำนวนเต็มออกจากกัน (บาปหรือเปล่าหนอเรา พรากคู่เขา)
Number = Number.split (".");
//ขั้นตอนต่อไปนี้เป็นการประมวลผลดูกันเอาเองครับ แบบว่าขี้เกียจจะจิ้มดีดแล้ว อิอิอิ
if (Number[1].length > 0)
{
Number[1] = Number[1].substring(0, 2);
}
var NumberLen = Number[0].length - 0;
for(var i = 0; i < NumberLen; i++)
{
var tmp = Number[0].substring(i, i + 1) - 0;
if (tmp != 0)
{
if ((i == (NumberLen - 1)) && (tmp == 1))
{
BahtText += "เอ็ด";
} else
if ((i == (NumberLen - 2)) && (tmp == 2))
{
BahtText += "ยี่";
} else
if ((i == (NumberLen - 2)) && (tmp == 1))
{
BahtText += "";
} else
{
BahtText += TxtNumArr[tmp];
}
BahtText += TxtDigitArr[NumberLen - i - 1];
}
}
BahtText += "บาท";
if ((Number[1] == "0") || (Number[1] == "00"))
{
BahtText += "ถ้วน";
} else
{
DecimalLen = Number[1].length - 0;
for (var i = 0; i < DecimalLen; i++)
{
var tmp = Number[1].substring(i, i + 1) - 0;
if (tmp != 0)
{
if ((i == (DecimalLen - 1)) && (tmp == 1))
{
BahtText += "เอ็ด";
} else
if ((i == (DecimalLen - 2)) && (tmp == 2))
{
BahtText += "ยี่";
} else
if ((i == (DecimalLen - 2)) && (tmp == 1))
{
BahtText += "";
} else
{
BahtText += TxtNumArr[tmp];
}
BahtText += TxtDigitArr[DecimalLen - i - 1];
}
}
BahtText += "สตางค์";
}
return BahtText;
}
}
}

</script>
@endsection