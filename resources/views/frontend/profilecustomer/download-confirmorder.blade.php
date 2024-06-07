<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Cofrim</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun" rel="stylesheet" />
<style>

* {
            font-family: 'Sarabun', sans-serif;
            font-size: 11.5px;
        }
@page {
    margin: 0cm 0cm;
}



    table{
        padding:9.5px !important;
        }
      
</style>

</head>

<body>

@foreach ($dt as $item)


<table width="100%" style="border: 0px solid #fff">
    <tr>
        <td valign="top" style="width:40%">
            <table class="table table-bordered table-striped" style="border: 0px solid #fff;width:100%;max-height: 552.078px;">
                <thead>
                    <tr class="table-header text-center" style="background-color: #F1B44C;">
                        <th colspan="2"><p style="color:#fff">•ข้อมูลยืนยันออเดอร์•</p></th>       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">หมายเลขคำสั่งซื้อ</td>
                        <td>{{ $confirmorder->sal_confirmorder_hd_docuno}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">ชื่อบริษัท</td>
                        <td>{{ $confirmorder->ms_customer_name1 }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">รหัสลูกค้า</td>
                        <td>{{ $confirmorder->ms_customer_code}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">ชื่อผู้ติดต่อ</td>
                        <td>@if(empty($confirmorder->ms_customersub_name) || $confirmorder->ms_customersub_name == ' ') ไม่พบรายชื่อ @else {{ $confirmorder->ms_customersub_name }} @endif</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">ชื่อสินค้า</td>
                        <td>{{ $item->ms_product_code}}/{{ $item->ms_product_name1}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">ปริมาณการสั่งซื้อ</td>
                        <td>{{ $item->sal_confirmorder_dt_qty}} {{ $item->ms_product_unit_name}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">สีผลิตภัณฑ์</td>
                        <td>{{ $item->ms_product_color_name }} / {{ $item->ms_product_color_nameen }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">ประเภทสกีน</td>
                        <td>{{ $item->ms_typescreen_name}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">การแพ็คสินค้า</td>
                        <td>{{ $item->ms_packing_name}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">รูปแบบคอมเฟริมตัวอย่าง</td>
                        <td>{{ $item->ms_confirmorder_name}}</td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">วันจัดส่งสินค้า</td>
                        <td>
                        @foreach($arr_sub[$item->sal_confirmorder_dt_id] as $keyx => $value)

                            @if($value->sal_confirmorder_dt_id == $item->sal_confirmorder_dt_id)
                            {{ $value->sal_confirmorder_sub_listno}}.  Date : {{ $value->sal_confirmorder_sub_duedate}}  QTY : {{ $value->sal_confirmorder_sub_qty}} <br>
                            @endif

                        
                            
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td style="background-color: #E6E6E6;width:40%;height:10px">สถานที่จัดส่ง</td>
                        <td>{{ $confirmorder->transport_address}}</td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td style="width:60%">
            <table class="table table-bordered table-striped" style="border: 0px solid  #fff;" width="100%">
                <thead >
                    <tr class="table-header text-center" style="background-color: #45BEC7;">
                        <th colspan="2"><p style="color:#fff">•รูปแบบดีไซน์•</p></th>       
                    </tr>
                </thead>
                <tbody>
                    @php 
                        $suburl = $item->sal_confirmorder_dt_imgpic;
                        $suburl = str_replace('https://erp.giftwise.co.th/', '', $suburl);
                    @endphp
                    <tr style="border-bottom: 1px solid #BABABA; height:fit-content !important;" align="center">
                        <td colspan="2" class="text-center">
                            <img src="https://erp.giftwise.co.th/{{ $suburl }}" style="height: 42%; width:auto;object-fit: contain;max-width:1027.288px;max-height:436.104px" >
                        </td>
                    </tr>
                    <tr  style="border: 1px solid #BABABA !important;height:32px">
                        <td style="background-color: #45BEC7;width:40%"><p style="color:#fff;size: 10px !important;">ความต้องการเพิ่มเติม/หมายเหตุ</p></td>
                        <td>{{ $item->sal_confirmorder_dt_remark }}</td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
  </table>



  <table width="100%" style="border: 0px solid #fff">
    <tr> 
        <td valign="top" style="width:100%">
            <table class="table" style="border: 0px solid  #fff;width:100%">
                <thead style="background-color: #FBFCFC;">
                    <tr class="table-header">
                        <th class="text-center"><span><p style="color:#F1B44C">! *ข้อควรระวัง</p></span></th>
                        <th  class="text-left"><p>(โปรดอ่านให้ระเอียดก่อนยืนยันการผลิต)</p></th>       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="background-color:#D9D9D9;" colspan="2"><p>{{ $confirmorder->sal_confirmorder_hd_remark1 }}</p></td>
                    </tr>
                    <tr>
                        <td style="background-color:#D9D9D9;" colspan="2"><p>{{ $confirmorder->sal_confirmorder_hd_remark2 }}</p></td>
                    </tr>
                    <tr>
                        <td style="background-color:#D9D9D9;" colspan="2"><p>{{ $confirmorder->sal_confirmorder_hd_remark3 }}</p></td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td style="width:40%">
            <img src="https://erp.giftwise.co.th/assets/images/logo/sign.jpg" width="100%" style="padding-top:60px;object-fit: cover !important;"><br>
            <p>FM-SM-04 REV  00 : 01/12/2566</p>
        </td>
    </tr>
</table>







@endforeach













</body>

</html>


  

