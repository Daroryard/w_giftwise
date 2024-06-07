<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Con</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun" rel="stylesheet" />
    <style type="text/css">
        * {
            font-family: 'Sarabun', sans-serif;
            font-size: 10px;
            margin: 0 !important;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        h1{
            font-size: 1.5em;
        }
    </style>
</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"><img src="https://erp.giftwise.co.th/assets/images/logo/giftwise_logo.jpg" alt="logo" height="100"/></td>
        <td valign="top">
            <pre>
                บริษัท กิ๊ฟท์ไวซ์เอเชีย จํากัด สำนักงานใหญ่
                262/1 ถนนพุทธบูชา แขวงบางมด เขตจอมทอง กรุงเทพมหานคร 10150
                เลขผู้เสียภาษี / Tax ID : 0105564030060
                จัดเตรียมโดย / Prepared by : {{ $docuno->sal_quotation_hd_save }}
            </pre>
        </td>
        <td align="right" style="background-color: #F0EFFD;">
            <h1>ใบเสนอราคา<br>Quotation</h1>
            <small>(ต้นฉบับ / original)</small>
            <pre>
                FM-SM-03 REV 00 : 01/12/2566
                เลขที่ / No. {{ $docuno->sal_quotation_hd_docuno }}
                วันที่ / Issue. Date : {{ date('d/m/Y', strtotime($docuno->sal_quotation_hd_date)) }}
            </pre>
        </td>
    </tr>
  </table>

  <table width="100%">
    <tr>
        <td><strong>ลูกค้า / Customer:</strong> {{ $docuno->ms_customer_fullname }}<br>
            <strong>ที่อยู่ / Address:</strong> {{ $docuno->ms_customer_fulladdress }}<br>
            <strong>เลขผู้เสียภาษี / Tax ID:</strong> {{ $docuno->ms_customer_taxid }}<br>
            <strong>ผู้ติดต่อ / Attention:</strong> {{ $docuno->ms_customersub_name }}
        </td>
        <td>
        @if($docuno->ms_customersub_email != null)
            <strong>อีเมล์/Email :</strong> {{ $docuno->ms_customersub_email }}<br>
        @else
            <strong>อีเมล์/Email :</strong> -<br>
        @endif
        @if($docuno->ms_customersub_tel != null)
            <strong>เบอร์โทรศัพท์/Tel. :</strong> {{ $docuno->ms_customersub_tel }}
        @else
            <strong>เบอร์โทรศัพท์/Tel. :</strong> -
        @endif 
        </td>
    </tr>
  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: #f9f9f9;">
      <tr>
        <th><b>รหัส</b><br>ID no.</th>
        <th><b>คำอธิบาย</b><br>Description</th>
        <th><b>จำนวน</b><br>Quantity</th>
        <th><b>ราคาต่อหน่วย</b><br>Unit Price</th>
        <th><b>ส่วนลด</b><br>Discount</th>
        <th><b>มูลค่าก่อนภาษี</b><br>Pre-Tax Amount</th>
      </tr>
    </thead>
    <tbody>
    @foreach($quotation as $val)
      <tr>
        <th scope="row">{{ $val->ms_product_code }} </th>
        <td>{{$val->ms_product_name1}}<br>{{$val->sal_quotation_dt_remark}}</td>
        <td align="right">{{$val->sal_quotation_dt_qty}}</td>
        <td align="right">{{$val->ms_currency_logo}} {{ number_format($val->sal_quotation_dt_price, 2) }}</td>
        <td align="right">{{$val->ms_currency_logo}} {{ number_format($val->sal_quotation_dt_discount, 2) }}</td>
        <td align="right">{{$val->ms_currency_logo}} {{ number_format($val->sal_quotation_dt_netamount, 2) }}</td>
      </tr>
     @endforeach
    </tfoot>
  </table>

  <table width="100%">             
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
                                            {{ $docuno->ms_currency_logo }} {{ number_format($docuno->sal_quotation_hd_basevat, 2) }}<br><br>
                                            {{ $docuno->ms_currency_logo }} {{ number_format($docuno->sal_quotation_hd_vat, 2) }}<br><br>
                                            {{ $docuno->ms_currency_logo }} {{ number_format($docuno->sal_quotation_hd_netamount, 2) }}
                                            </td>                                        
                                            <tr>
                                            <td>
                                            </td>
                                            <td colspan="1" style="border-left:none;text-align:left">
                                            <b>จำนวนเงินรวมทั้งสิ้น</b>
                                            </td>
                                            <td colspan="4" style="border-right:none;text-align:right">
                                            <b> {{ baht_text($docuno->sal_quotation_hd_netamount) }}

                                            </b>
                                            </td>                                      
                                            </tr>
                                            </tr>
                                            <tr>
                                            <td style="border-left:none"><b>ชำระเงิน</b></td>    
                                            <td colspan="5" style="border-right:none;text-align:left">
                                            <br><br>
                                            <span><img src="https://erp.giftwise.co.th/assets/images/logo/bank.png" alt="logo" height="25"/>                                         
                                             ธ.ไทยพาณิชย์<br>
                                            ออมทรัพย์ 0122770036<br>
                                            กิ๊ฟท์ไวซ์เอเชีย
                                            </span>
                                            </td> 
                                            </tr>
                                            <tr>                                          
                                            <td style="border-left:none"  colspan="6"><br><b>หมายเหตุ</b>
                                            <br>
                                            {{ $docuno->quotation_remark1 }} <br>
                                            {{ $docuno->quotation_remark2 }} <br>
                                            {{ $docuno->quotation_remark3 }} <br>
                                            {{ $docuno->quotation_remark4 }} <br>
                                            {{ $docuno->quotation_remark5 }} <br>                               
                                            </td>     
                                            </tr>
                                            
                                            </tbody>
                                            </table>
                                            <table width="100%">
                                            <tr>
                                              <td style="border-left:none"><b>รับรอง</b></td>    
                                            </tr>
                                              <tr>
                                              <td style="width:10px"></td>    
                                                  <td> 
                                                    <b>ผู้ออกเอกสาร (ผู้ขาย)</b>
                                                    <br>
                                                    <br>
                                                    <br>                             
                                                    <p>{{ $docuno->sal_quotation_hd_save }}
                                                    <br>
                                                    {{ date('d/m/Y', strtotime($docuno->sal_quotation_hd_date)) }}
                                                    </p>                                     
                                                  </td>
                                                  <td> 
                                                    <b>ผู้อนุมัติเอกสาร (ผู้ขาย)</b>
                                                    <br>
                                                    <br>
                                                    <br>   
                                                    @if($docuno->approval_save != null)                          
                                                    <p>{{ $docuno->approval_save }}
                                                    <br>
                                                    {{ date('d/m/Y', strtotime($docuno->approval_datenow)) }}
                                                    </p>     
                                                    @else
                                                    <p>-
                                                    <br>
                                                    -
                                                    </p>
                                                    @endif                             
                                                  </td>
                                                  <td> 
                                                    <b>ผู้รับเอกสาร (ลูกค้า)</b>
                                                    <br>
                                                    <br>
                                                    <br>                             
                                                    <p>.....................................
                                                    <br>
                                                    วันที่ / Date
                                                    </p>                                     
                                                  </td>
                                                  <td> 
                                                    <b>ตราประทับ</b>
                                                    <br>
                                                    <img src="https://erp.giftwise.co.th/assets/images/border_logo.png" height="90">
                                                    <br>                                                                                      
                                                  </td>
                                                
                                              </tr>
                                          </table>


  

</body>
</html>
