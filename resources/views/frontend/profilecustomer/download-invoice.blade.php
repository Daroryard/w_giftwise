<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Inv</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    
    <style type="text/css">
        * {
            font-family: 'Sarabun', sans-serif;
            font-size: 9px;
            margin: 3 !important;



      
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
             
            </pre>
        </td>
        <td align="right" style="background-color: #F0EFFD;">
            <h1>ใบแจ้งหนี้<br>INVOICE</h1>
            <small>(ต้นฉบับ / original)</small>
            <pre>
                เลขที่ / No. {{ $quotation->invoice_docuno }}
                อ้างอิง QT. {{ $quotation->sal_quotation_hd_docuno }}
                เครดิต / Credit : {{ $quotation->ms_customer_creditday }} วัน / days
                วันที่ / Date : {{ date('d/m/Y', strtotime($quotation->sal_quotation_hd_date)) }}
                มัดจำ / Deposit : {{ number_format($quotation->invoice_printpercent,0) }} %
            </pre>
        </td>
    </tr>
  </table>

  <table width="100%">
    <tr>   
        <td>
          <div style="padding-right: 10px;"><strong>ผู้ขาย</strong></div>
          <div style="padding-left: 40px;">
          {{ $company[0]->ms_company_name }}<br>
          {{ $company[0]->ms_company_address }}
          </div>
        </td>
        <td>

        <strong>เลขผู้เสียภาษี / Tax ID : </strong>{{ $company[0]->ms_company_taxid }}<br>
        <strong>จัดเตรียมโดย / Prepared by : </strong>{{ $quotation->sal_quotation_hd_save }}<br>
        <strong>เบอร์โทรศัพท์ / Tel : </strong>{{ $company[0]->ms_company_tel }}<br>
        <strong>อีเมล์ / Email : </strong>{{ $company[0]->ms_company_email }}


        </td>
    </tr>
  </table>

  <table width="100%">
    <tr>
        <td><strong>ลูกค้า / Customer:</strong> {{ $quotation->ms_customer_fullname }}<br>
            <strong>ที่อยู่ / Address:</strong> 
            {{ $quotation->ms_customer_fulladdress }}<br>
            <strong>เลขผู้เสียภาษี / Tax ID:</strong> {{ $quotation->ms_customer_taxid }}<br>
            <strong>ผู้ติดต่อ / Attention:</strong> {{ $quotation->ms_customersub_name }}
        </td>
        <td>
        @if($quotation->ms_customersub_email != null)
            <strong>อีเมล์/Email :</strong> {{ $quotation->ms_customersub_email }}<br>
        @else
            <strong>อีเมล์/Email :</strong> -<br>
        @endif
        @if($quotation->ms_customersub_tel != null)
            <strong>เบอร์โทรศัพท์/Tel. :</strong> {{ $quotation->ms_customersub_tel }}
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
      @php
        $per = $quotation->invoice_printpercent;
        $dp = $quotation->sal_quotation_hd_basevat;
        $base = $dp - ($dp * ($per / 100));
      @endphp
    <tr>
        <td align="center" style="border-left-color:#fff">-</td>
        <td align="center"><p>เงินรับล่วงหน้า - เงินมัดจำรับชำระเงินมัดจำ {{ $quotation->invoice_printpercent }}%</p></td>
        <td align="center">1.00</td>
        <td align="center"><p id="dp_netprice">{{ $quotation->ms_currency_logo }} {{ number_format($base, 2) }}</p></td>
        <td align="center" style="border-right-color:#fff">
        -
        </td>
        <td align="center"><p id="dp_netprice">{{ $quotation->ms_currency_logo }} {{ number_format($base, 2) }}</p></td>
      </tr>

    @foreach($dt as $val)
      <tr>
        <td scope="row" align="center">{{ $val->ms_product_code }} </ก>
        <td align="center">{{$val->ms_product_name1}}<br>{{$val->sal_quotation_dt_remark}}</td>
        <td align="center">{{$val->sal_quotation_dt_qty}}</td>
        <td align="center">-</td>
        <td align="center">{{$val->ms_currency_logo}} {{ number_format($val->sal_quotation_dt_discount, 2) }}</td>
        <td align="center">-</td>
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
                                            </td>
                                            <td colspan="1" style="border-right:none;text-align:right">
                                            @php
                                              $per = $quotation->invoice_printpercent;
                                              $dp = $quotation->sal_quotation_hd_basevat;
                                              $base = $dp - ($dp * ($per / 100));
                                              $vat = ($base * 7) / 100;
                                              $net = $base + $vat;
                                            @endphp
                                            {{ $quotation->ms_currency_logo }} {{ number_format($base, 2) }}<br><br>
                                            {{ $quotation->ms_currency_logo }} {{ number_format($vat, 2) }}<br><br>
                                            </td>      
                                            <td colspan="2" style="border-right:none;text-align:right;background-color: #F0EFFD;">
                                            จำนวนเงินรวมทั้งสิ้น : {{ $quotation->ms_currency_logo }} {{ number_format($net, 2) }}
                                            </td>                                        
                                            <tr>
                                            <td>
                                            </td>
                                            <td colspan="1" style="border-left:none;text-align:left">
                                            <b>จำนวนเงินรวมทั้งสิ้น</b>
                                            </td>
                                            <td colspan="4" style="border-right:none;text-align:right">
                                            <b> {{ baht_text($quotation->sal_quotation_hd_netamount) }}

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
                                            {{ $quotation->quotation_remark1 }} <br>
                                            {{ $quotation->quotation_remark2 }} <br>
                                            {{ $quotation->quotation_remark3 }} <br>
                                            {{ $quotation->quotation_remark4 }} <br>
                                            {{ $quotation->quotation_remark5 }} <br>                               
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
                                                    <p>{{ $quotation->sal_quotation_hd_save }}
                                                    <br>
                                                    {{ date('d/m/Y', strtotime($quotation->sal_quotation_hd_date)) }}
                                                    </p>                                     
                                                  </td>
                                                  <td> 
                                                    <b>ผู้อนุมัติเอกสาร (ผู้ขาย)</b>
                                                    <br>
                                                    <br>
                                                    <br>   
                                                    @if($quotation->approval_save != null)                          
                                                    <p>{{ $quotation->approval_save }}
                                                    <br>
                                                    {{ date('d/m/Y', strtotime($quotation->approval_datenow)) }}
                                                    </p>     
                                                    @else
                                                    <p>-
                                                    <br>
                                                    -
                                                    </p>
                                                    @endif                             
                                                  </td>                                              
                                                  <td> 
                                                    <b>อนุมัติโดย / Approved by</b>
                                                     <br>
                                                     <img src="https://erp.giftwise.co.th/assets/images/logo/logo_sign.jpg" height="90">                                   
                                                  </td>                                              
                                                  <td> 
                                                    <b>ผู้รับเอกสาร (ลูกค้า) / ตราประทับ (ลูกค้า)</b>
                                                    <br>
                                                    <br>
                                                    <br>                             
                                                    <p>.....................................
                                                    <br>
                                                    วันที่ / Date
                                                    </p>                                     
                                                  </td>
                                                
                                              </tr>
                                          </table>


  

</body>
</html>
