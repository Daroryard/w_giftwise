@extends('layouts.app')

@section('css')
    <!-- select2 css -->
    <link href="{{ asset('assets/backend/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ asset('assets/backend/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <link href="{{ asset('assets/backend/libs/fileinput/css/fileinput.css') }}" media="all" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/backend/libs/fileinput/themes/explorer-fa5/theme.css') }}" media="all" rel="stylesheet"
        type="text/css" />
    </head>
    <style>
        #editor {
            height: 300px;
        }

        .select2-container .select2-dropdown {
            width: 100px;
            /* Adjust to your desired width */
        }

        .select2-container--bootstrap5 {
    z-index: 1001; /* Adjust this value as needed */
}
.select2-container {
    z-index: 1001; /* Adjust this value as needed */
}
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">DASHBOARD</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">PRODUCTS</a></li>
                        <li class="breadcrumb-item active">NEW PRODUCT</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form id="form-product" class="outer-repeater" action="{{ route('product.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_code" id="ms_product_code" value="{{ old('product_code') }}">
        <input type="hidden" name="ms_product_category_id" id="ms_product_category_id" value="{{ old('ms_product_category_id') }}">
        <input type="hidden" name="ms_product_categorysub_id" id="ms_product_categorysub_id" value="{{ old('ms_product_categorysub_id') }}">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                        <h5 class="mb-1 mt-3">NEW PRODUCT</h5>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                        <button class="btn btn-label-secondary" id="btn-reset">Discard</button>
                        <button type="submit" class="btn btn-soft-primary waves-effect waves-light">Publish
                            product</button>
                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
                <script>
                    // Automatically close the alert after 3 seconds
                    setTimeout(function() {
                        $(".alert").alert('close');
                    }, 3000);
                </script>
                @elseif($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach                                   
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    </div>
                        <script>
                            // Automatically close the alert after 3 seconds
                            setTimeout(function() {
                                $(".alert").alert('close');
                            }, 3000);
                        </script>
            @endif
            </div>

            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 card-title flex-grow-1">Product Informations</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="mb-4">
                                    <select name="erp_product" id="erp_product" class="form-control product-erp" onchange="selectErp(this.value)">
                                        <option value="" selected>Select product</option>
                                        @foreach ($erp_products as $product)
                                            <option value="{{ $product->ms_product_id }}" @if(old('erp_product') == $product->ms_product_id) selected @endif>{{ $product->ms_product_name1 }}</option>
                                        @endforeach
                                    </select>
                                    <datalist id="product_categorysub_list_en">

                                    </datalist>
                                </div>
                                <div class="form-group row">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified mb-4" id="editorTabs"
                                        role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" data-editor-index="0"
                                                href="#product_en" role="tab">
                                                EN @error('product_name_en')<span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span class="visually-hidden">unread messages</span></span>@enderror
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" data-editor-index="1"
                                                href="#product_th" role="tab">
                                                TH @error('product_name_th')<span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><span class="visually-hidden">unread messages</span></span>@enderror
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group row">
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="product_en" role="tabpanel">
                                            <div class="mb-4">
                                                <div class="col-lg-12">
                                                    <label for="product_name_en" class="form-label">Name</label>
                                                    <input id="product_name_en" name="product_name_en" type="text" value="{{ old('product_name_en') }}" class="form-control @error('product_name_en') is-invalid @enderror"
                                                        placeholder="Product EN">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="meta-title-en" class="form-label">Meta title</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" id="meta-title-en" name="meta_title_en"
                                                        value="{{ old('meta_title_en') }}" placeholder="Meta title en" />
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="meta-description-en" class="form-label">Meta
                                                    description</label>
                                                <div class="col-lg-12">
                                                    <textarea class="form-control" id="meta-description-en" name="meta_description_en"
                                                        placeholder="Meta description en">{!! old('meta_description_en') !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="hashtag-en" class="form-label">Hashtag EN</label>
                                                <select class="product-tag form-control" id="hashtag-en" multiple
                                                    name="hashtag_en[]">
                                                    @if (old('hashtag_en'))
                                                        @foreach (old('hashtag_en') as $hashtag)
                                                            <option value="{{ $hashtag }}" selected>
                                                                {{ $hashtag }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="slug" class="form-label">Slug</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                                                        value="{{ old('slug') }}">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="product_active" class="form-label">Active</label>
                                                <div class="col-lg-12">
                                                    <select name="product_active" id="product_active" class="form-control">
                                                    <option value="{{ config('constants.inactive_value') }}" @if(old('product_active') == config('constants.inactive_value')) selected @endif>Inactive</option>
                                                    <option value="{{ config('constants.active_value') }}" @if(old('product_active') == config('constants.active_value')) selected @endif>Aactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="description-en" class="form-label">Description en</label>
                                                <div class="col-lg-12">
                                                    <textarea class="form-control editor" id="description-en" name="product_remark_en">{{ old('product_remark_en') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="product_th" role="tabpanel">
                                            <div class="mb-4">
                                                <div class="col-lg-12">
                                                    <label for="product_name_th" class="form-label">Name</label>
                                                    <input id="product_name_th" name="product_name_th" type="text"
                                                        class="form-control @error('product_name_th') is-invalid @enderror" value="{{ old('product_name_th') }}" placeholder="Product title th">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="meta-title-th" class="form-label">Meta title</label>
                                                <div class="col-lg-12">
                                                    <input class="form-control" id="meta-title-th" name="meta_title_th"
                                                        value="{{ old('meta_title_th') }}" placeholder="Meta title th">
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="meta-description-th" class="form-label">Meta
                                                    description</label>
                                                <div class="col-lg-12">
                                                    <textarea class="form-control" id="meta-description-th" name="meta_description_th"
                                                        placeholder="Meta description th">{!! old('meta_description_th') !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label for="hashtag-th" class="form-label">Hashtag TH</label>
                                                <select class="product-tag form-control" id="hashtag-th" multiple
                                                    name="hashtag_th[]">
                                                    @if (old('hashtag_th'))
                                                        @foreach (old('hashtag_th') as $hashtag)
                                                            <option value="{{ $hashtag }}" selected>
                                                                {{ $hashtag }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="description-th" class="form-label">Description th</label>
                                                <div class="col-lg-12">
                                                    <textarea class="form-control editor" id="description-th" name="product_remark_th">{!! old('product_remark_th') !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <!-- Pricing Card -->
                <div class="card mb-4">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 card-title flex-grow-1">Pricing and Stock</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="product_price_qty50">50 pieces</label>
                            <input type="number" class="form-control @error('product_price_qty50') is-invalid @enderror" name="product_price_qty50" id="product_price_qty50"
                                value="{{ old('product_price_qty50') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product_price_qty100">100 pieces</label>
                            <input type="number" class="form-control @error('product_price_qty100') is-invalid @enderror" name="product_price_qty100" id="product_price_qty100"
                                value="{{ old('product_price_qty100') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product_price_qty300">300 pieces</label>
                            <input type="number" class="form-control @error('product_price_qty300') is-invalid @enderror" name="product_price_qty300" id="product_price_qty300"
                                value="{{ old('product_price_qty300') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product_price_qty500">500 pieces</label>
                            <input type="number" class="form-control @error('product_price_qty500') is-invalid @enderror" name="product_price_qty500" id="product_price_qty500"
                                value="{{ old('product_price_qty500') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="product_price_qty1000">1000 pieces</label>
                            <input type="number" class="form-control @error('product_price_qty1000') is-invalid @enderror" name="product_price_qty1000" id="product_price_qty1000"
                                value="{{ old('product_price_qty1000') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="stockqty">Stock</label>
                            <input type="number" class="form-control" name="stockqty"
                                value="{{ old('stockqty') }}">
                        </div>
                    </div>
                </div>
                <!-- /Pricing Card -->

                <div class="card mb-4">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 card-title flex-grow-1">Organize</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <ul class="nav nav-tabs nav-tabs-custom nav-justified mb-4" id="editorTabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" data-editor-index="0"
                                        href="#organize_en" role="tab">
                                        EN
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" data-editor-index="1" href="#organize_th"
                                        role="tab">
                                        TH
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="form-group row">
                            <div class="tab-content p-2 text-muted">
                                <div class="tab-pane active" id="organize_en" role="tabpanel">
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="product_category_en">
                                            <span>Category EN</span><a href="" class="fw-medium">New category</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_category_en" id="product_category_en">
                                    </div>
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="category-org">
                                            <span>Sub Category EN</span><a href="">New sub category</a>
                                        </label>
                                        <input type="text" list="product_categorysub_list_en" class="form-control" name="product_categorysub_en" id="product_categorysub_en">
                                        <datalist id="product_categorysub_list_en">
                                            @foreach ($erp_categorysublist as $categorysub)
                                            <option value="{{ $categorysub->ms_product_categorysub_name }}" >
                                        @endforeach
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="size">
                                            <span>Unit EN</span><a href="">New unit</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_unit_en" id="product_unit_en" value="{{ old('product_unit_en') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="size">
                                            <span>Size EN</span><a href="">New size</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_size_en" id="product_size_en" value="{{ old('product_size_en') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="color">
                                            <span>Color EN</span><a href="">New color</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_color_en" id="product_color_en" value="{{ old('product_color_en') }}">
                                    </div>
                                </div>

                                <div class="tab-pane" id="organize_th" role="tabpanel">
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="product_category_th">
                                            <span>Category TH</span><a href="" class="fw-medium">New category</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_category_th" id="product_category_th">
                                    </div>
                                    <!-- Category -->
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="category-org">
                                            <span>Sub Category TH</span><a href="">New sub category</a>
                                        </label>
                                        <input type="text" list="product_categorysub_list_th" class="form-control" name="product_categorysub_th" id="product_categorysub_th">
                                        <datalist id="product_categorysub_list_th">
                                            @foreach ($erp_categorysublist as $categorysub)
                                            <option value="{{ $categorysub->ms_product_categorysub_name }}" >
                                        @endforeach
                                        </datalist>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="size">
                                            <span>Unit TH</span><a href="">New unit</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_unit_th" id="product_unit_th" value="{{ old('product_unit_th') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="size">
                                            <span>Size TH</span><a href="">New size</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_size_th" id="product_size_th"  value="{{ old('product_size_th') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                                            for="color">
                                            <span>Color TH</span><a href="">New color</a>
                                        </label>
                                        <input type="text" class="form-control" name="product_color_th" id="product_color_th" value="{{ old('product_color_th') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body border-bottom">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 card-title flex-grow-1">Media</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="file" id="product_image" name="product_image[]" accept=".jpg, .jpeg, .png, .gif"
                            multiple>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end row -->
@endsection

@section('js')
    <!-- select 2 plugin -->
    <script src="{{ asset('assets/backend/libs/select2/js/select2.min.js') }}"></script>

    <!-- dropzone plugin -->
    <script src="{{ asset('assets/backend/libs/dropzone/min/dropzone.min.js') }}"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="{{ asset('assets/backend/libs/fileinput/plugins/buffer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/libs/fileinput/plugins/filetype.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/libs/fileinput/plugins/piexif.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/libs/fileinput/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/libs/fileinput/fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/libs/fileinput/themes/fa5/theme.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/libs/fileinput/themes/explorer-fa5/theme.js') }}" type="text/javascript">
    </script>

    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            @if(old('erp_product'))
            selectErp({{ old('erp_product') }});
            @endif
            $('#product_image').fileinput({
                uploadUrl: '#',
                allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
                overwriteInitial: true,
                maxFileSize: 2000,
                maxFileCount: 9,
            }).on('filebatchselected', function(event, files) {
                $(".fileinput-upload").remove();
                $(".kv-file-upload").remove();
            })

            $(".product-tag").select2({
                theme: "classic",
                tags: true
            })

            // $('.bs-example-modal-center').on('shown.bs.modal', function () {
                $(".product-erp").select2({
                    // theme: "bootstrap5"
                })
// });


            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                $(".product-tag").select2({
                    theme: "classic",
                    tags: true
                })
            })

            $('.editor').summernote({
                height: 300,
                toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'table', 'hr']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ]
            });
        })

        $('#btn-reset').click(function(e) {
             e.preventDefault();
            $('#form-product').trigger("reset");
            $('#ms_product_code').val(null);
            $('#erp_product').val(null).trigger('change');
            return false;
        })

        function selectErp(id){
                var products = @json($erp_products);
                var product = products.find(product => product.ms_product_id == id);
                var pattern = /^[\u0E00-\u0E7F\s]+$/;
                console.log(product);
                $('#product_name_en').val(product.ms_product_name1);
                $('#product_name_th').val(product.ms_product_name1);
                $('#meta-title-en').val(product.ms_product_name1);
                $('#meta-title-th').val(product.ms_product_name1);
                $('#meta-description-en').val(product.ms_product_remark.replace(/(\r\n|\n|\r)/gm, ""));
                $('#meta-description-th').val(product.ms_product_remark.replace(/(\r\n|\n|\r)/gm, ""));
                $('#product_category_en').val(product.ms_product_category_name);
                $('#product_category_th').val(product.ms_product_category_name);
                $('#product_categorysub_en').val(product.ms_product_categorysub_name);
                $('#product_categorysub_th').val(product.ms_product_categorysub_name);
                $('#product_size_en').val(product.ms_product_size_name);
                $('#product_size_th').val(product.ms_product_size_name);
                $('#product_unit_en').val(product.ms_product_unit_name);
                $('#product_unit_th').val(product.ms_product_unit_name);
                $('#product_color_th').val(product.ms_product_color_name);
                $('#product_color_en').val(product.ms_product_color_name);
                $('#description-en').summernote('code',product.ms_product_remark);
                $('#description-th').summernote('code',product.ms_product_remark);
                $('#product_price_qty50').val(product.ms_productsub_price1);
                $('#product_price_qty100').val(product.ms_productsub_price2);
                $('#product_price_qty300').val(product.ms_productsub_price3);
                $('#product_price_qty500').val(product.ms_productsub_price4);
                $('#product_price_qty1000').val(product.ms_productsub_price5);
                $('#ms_product_code').val(product.ms_product_code);
            }
    </script>
@endsection
