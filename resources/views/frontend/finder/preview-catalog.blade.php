<style>
  @media print {
    @page {
      size: 100mm 200mm landscape;
    }

    div.page-break-after {
      display: block !important;
      page-break-after: always;
      padding: auto;
      background-color: #fff;

    }



  }

  table,
  th,
  td {
    padding: 9.5px !important;
    border: 1px solid #ddd;
    text-align: center;
  }

  input {
    border: none;
    border-bottom: 1px solid #000;
    text-align: center;
    height: 100px;

  }
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/libs/toastr/toastr.min.css') }}">
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<div class="d-print-none">
  <div class="" id="list-bt" style="float:center !important">
    <a href="javascript:window.print()" class="btn btn-info waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
    <a href="{{ route('catalog.index') }}" class="btn btn-primary w-md waves-effect waves-light">กลับหน้าที่แล้ว</a>
  </div>
</div>



@foreach($catalog as $row)

<div class='page-break-after' style="font-size: 13px !important;">
  <div class="row" style="margin-top:10px;">
    <div class="col-5">
      <div class="w3-content" style="height:fit-content !important;margin-top: 50px">
        <img class="mySlides" src="{{ asset($row->ms_product_pic1) }}" style="width:100%;height:100%;object-fit: contain">

        <div class="w3-row-padding w3-section">
          <div class="w3-col s4">
            <img src="{{ asset($row->ms_product_pic2) }}" style="width:100%">
          </div>
          <div class="w3-col s4">
            <img src="{{ asset($row->ms_product_pic3) }}" style="width:100%">
          </div>
          <div class="w3-col s4">
            <img src="{{ asset($row->ms_product_pic4) }}" style="width:100%">
          </div>
        </div>
      </div>
    </div>



    <div class="col-7">
      <div class="row">
        <div class="col-7">
          <label class="form-label">รหัสสินค้า</label>
          <input type="text" class="form-control" value="{{ $row->ms_product_code }}" style="font-size: 18px;" disabled>
        </div>
        <div class="col-5">
          <label class="form-label">project No:</label>
          <input type="text" class="form-control" value="{{ $row->sal_project_hd_docuno }}" style="font-size: 18px;" disabled>
        </div>
        <div class="col-12">
          <label class="form-label">ชื่อสินค้า</label>
          <input type="text" class="form-control" value="{{ $row->ms_product_name1 }}" style="font-size: 16px;" disabled>
        </div>
        <div class="col-7">
          <label class="form-label">รายละเอียดสินค้า</label>
          <textarea type="text" class="form-control" value="ชื่อสินค้า" disabled style="height:240px;font-size: 16px;">
          {{ $row->ms_product_remark }}
          </textarea>
        </div>
        <div class="col-5">
          <label class="form-label"></label>
          <img src="{{ asset($row->ms_product_pic2) }}" style="width:100%;height:250px;">
        </div>
        <div class="col-12">
          <table class="table" style="margin-top: 5px;">
            <thead>
              <tr>
                <th scope="col">ขนาด</th>
                <th scope="col">ต่ำกว่า 100</th>
                <th scope="col">100-300</th>
                <th scope="col">300-500</th>
                <th scope="col">500-1000</th>
                <th scope="col">1000 ขึ้นไป</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $row->ms_product_size_name }}</td>
                <td>{{ number_format($row->ms_productsub_price1,2) }}</td>
                <td>{{ number_format($row->ms_productsub_price2,2) }}</td>
                <td>{{ number_format($row->ms_productsub_price3,2) }}</td>
                <td>{{ number_format($row->ms_productsub_price4,2) }}</td>
                <td>{{ number_format($row->ms_productsub_price5,2) }}</td>
              </tr>
            </tbody>

          </table>


        </div>


      </div>

    </div>


  </div>

</div>



@endforeach