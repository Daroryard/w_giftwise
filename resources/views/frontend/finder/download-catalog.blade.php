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
  border-bottom: 1px solid #000;
  text-align: center;
  height: 80px;

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
                  <img src="{{ $row->conf_mainproduct_img1 }}" width="400" />
                  <br>
                  <br>
                  <img src="{{ $row->conf_mainproduct_img2 }}" width="150" />
                  <img src="{{ $row->conf_mainproduct_img3 }}" width="150" />
                  <img src="{{ $row->conf_mainproduct_img4 }}" width="150" />
                </div>
              </div>
            </td>
            <td class="w-half">
            <div class="row">
  <div class="col-12">
    <label class="form-label">Product Code</label>
    <br>
    <input type="text"  value="{{$row->conf_mainproduct_code}}" style="font-size: 20px;width:100% !important;text-align: center;" disabled>
  </div>
   <div class="col-12">
    <label class="form-label">Product Name</label>
    <input type="text"  value="{{$row->conf_mainproduct_name_th}}" style="font-size: 20px;width:100% !important;text-align: center;" disabled>
  </div>
  <div class="col-12">
    <label class="form-label">Product Detail</label>
    <textarea type="text"   disabled style="height:210px;font-size: 16px;width:100%;text-align: center;" disabled>
    {{$row->conf_mainproduct_remark_th}}
    </textarea>  
  </div>
              </td>
        </tr>
   
    </div>

    </table>

</div>

@endforeach





</body>
</html>