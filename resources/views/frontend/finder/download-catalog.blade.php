<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun" rel="stylesheet" />
</head>
<style>

  body {
    font-family: 'Sarabun';
    font-size: 12px;
}


  h4 {
    margin: 0;
}
.w-full {
    width: 100%;
}
.w-half {
    width: 50%;
}
.margin-top {
    margin-top: 1.25rem;
}
.footer {
    font-size: 0.875rem;
    padding: 1rem;
    background-color: rgb(241 245 249);
}
table {
    width: 100%;
    border-spacing: 0;
}
table.products {
    font-size: 0.875rem;
}
table.products tr {
    background-color: rgb(96 165 250);
}
table.products th {
    color: #ffffff;
    padding: 0.5rem;
}
table tr.items {
    background-color: rgb(241 245 249);
}
table tr.items td {
    padding: 0.5rem;
}
.total {
    text-align: right;
    margin-top: 1rem;
    font-size: 0.875rem;
}

div.page-break-after {
    display: block !important;
    page-break-after: always;}
    
  input{
  border: none;
  border: 2px solid #02FFFF;
  border-radius: 10px;
  text-align: center;
  height: 80px;
  color : #FFAB40;

}
</style>
<body>

@foreach($catalog as $row)
<div class='page-break-after'>
    <table class="w-full">
        <tr>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <input type="text"  value="{{$row->conf_mainproduct_code}}" style="font-size: 20px;width:50% !important;text-align: center;" disabled>
                  <br>
                  <br>
                  <img src="{{ $row->conf_mainproduct_img2 }}" width="400" />                 
                </div>
              </div>
            </td>
            <td class="w-half">
            <div class="row">
   <div class="col-12">
    <label class="form-label"><h1><b>{{$row->conf_mainproduct_name_th}}</b></h1></label>
    <br>
    <br>
  </div>
  <div class="col-12">
    <label class="form-label">Product Detail</label>
    <textarea type="text"   disabled style="height:210px;font-size: 16px;width:100%;text-align: center;" disabled>
    {{$row->conf_mainproduct_remark_th}}
    </textarea>  
  </div>
  @if($row->subproduct->count() > 0)
  <div class="col-12">
    <table class="table" style="margin-top: 15px">
    <tr class="text-center">
      <th scope="col" style="border: 1px solid black;">รหัสสินค้า</th>
      <th scope="col" style="border: 1px solid black;">จำนวน</th>
      <th scope="col" style="border: 1px solid black;">50</th>
      <th scope="col" style="border: 1px solid black;">100</th>
      <th scope="col" style="border: 1px solid black;">300</th>
      <th scope="col" style="border: 1px solid black;">500</th>
      <th scope="col" style="border: 1px solid black;">1000</th>
    </tr>
  </thead>
  <tbody>     
     @foreach($row->subproduct as $sub)
    <tr class="text-center">
      <td style="border: 1px solid black;">{{$sub->conf_subproduct_code}}</td>
      <td style="border: 1px solid black;">ราคา</td>
      <td style="border: 1px solid black;">{{number_format($sub->conf_subproduct_price1,2)}}</td>
      <td style="border: 1px solid black;">{{number_format($sub->conf_subproduct_price2,2)}}</td>
      <td style="border: 1px solid black;">{{number_format($sub->conf_subproduct_price3,2)}}</td>
      <td style="border: 1px solid black;">{{number_format($sub->conf_subproduct_price4,2)}}</td>
      <td style="border: 1px solid black;">{{number_format($sub->conf_subproduct_price5,2)}}</td>
    </tr>
    @endforeach
  </tbody>
    </table>
  </div>
  @endif


              </td>
        </tr>
   
    </div>

    </table>

</div>

<div class='page-break-after'>
<table class="w-full">
        <tr>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <img src="{{ $row->conf_mainproduct_img3 }}" width="300" style="margin-bottom: 10px;"/>          
                </div>
              </div>
            </td>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <img src="{{ $row->conf_mainproduct_img4 }}" width="300" style="margin-bottom: 15px;"/>                   
                </div>
              </div>
            </td>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <img src="{{ $row->conf_mainproduct_img5 }}" width="300" style="margin-bottom: 15px;"/>                   
                </div>
              </div>
            </td>
        </tr>
        <tr>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <img src="{{ $row->conf_mainproduct_img6 }}" width="300" style="margin-top: 15px;"/>                 
                </div>
              </div>
            </td>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <img src="{{ $row->conf_mainproduct_img7 }}" width="300" style="margin-top: 15px;"/>                 
                </div>
              </div>
            </td>
            <td class="w-half text-center">
              <div class="row">
                <div class="col-12">
                  <img src="{{ $row->conf_mainproduct_img8 }}" width="300" style="margin-top: 15px;"/>                 
                </div>
              </div>
            </td>
        </tr>
        
</table>


<!-- <div class="row">
<div class="col-4">
<img src="{{ $row->conf_mainproduct_img3 }}" width="200" />
</div>
<div class="col-4">
<img src="{{ $row->conf_mainproduct_img4 }}" width="200" />
</div>
<div class="col-4">
<img src="{{ $row->conf_mainproduct_img5 }}" width="200" />
</div>
</div>

<div class="row">
<div class="col-4">
<img src="{{ $row->conf_mainproduct_img6 }}" width="200" />
</div>
<div class="col-4">
<img src="{{ $row->conf_mainproduct_img7 }}" width="200" />
</div>
<div class="col-4">
<img src="{{ $row->conf_mainproduct_img8 }}" width="200" />
</div>
</div>
 -->



</div>


@endforeach

</body>
</html>