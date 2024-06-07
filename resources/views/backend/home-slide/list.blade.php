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

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Homeslide</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">DASHBOARD</a></li>
                            <li class="breadcrumb-item active">HOME SLIDE LISTS</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body border-bottom">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 card-title flex-grow-1">HOME SLIDE LISTS</h5>
                            <div class="flex-shrink-0">
                                <a href="{{ route('home-slide.create') }}" class="btn btn-primary waves-effect waves-light">NEW HOME SLIDE</a>
                            </div>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                        <script>
                            // Automatically close the alert after 3 seconds
                            setTimeout(function() {
                                $(".alert").alert('close');
                            }, 5000);
                        </script>
                        @elseif($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            
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
                                    }, 5000);
                                </script>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-homeslide" class="table align-middle table-nowrap table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th class="col no-sort" style="width: 20px;"></th>
                                        <th scope="col" style="width: 40px;">#</th>
                                        <th scope="col">Thumbnail</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Updated at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($homeslides as $key => $homeslide)
                                        <tr data-id="{{ $homeslide->conf_homeslide_id }}" data-homeslide-id="{{ $homeslide->conf_homeslide_id }}">
                                            <td class="text-center" style="cursor: pointer;"><i class="bx bx-move-vertical text-secondary"></i></td>
                                            <td class="text-center">
                                                {{ $key + 1  }}
                                            </td>
                                            <td>
                                                @if($homeslide->conf_homeslide_img)
                                                <a class="zoom-gallery" href="{{ asset($homeslide->conf_homeslide_img) }}"><img src="{{ asset($homeslide->conf_homeslide_img) }}" class="img-fluid" width="40"></a>
                                                @else
                                                <img src="https://placehold.co/600x400?text=No image" alt="" class="img-fluid" width="40">
                                                @endif
                                            </td>
                                            <td></td>
                                            <td>
                                                <div class="square-switch mt-2">
                                                    <input type="checkbox" class="homeslide-status" data-id="{{ $homeslide->conf_homeslide_id }}" id="square-switch{{ $homeslide->conf_homeslide_id }}" switch="none" {{ $homeslide->conf_homeslide_active ? 'checked' : null }} />
                                                    <label for="square-switch{{ $homeslide->conf_homeslide_id }}" data-on-label="On"
                                                        data-off-label="Off"></label>
                                                </div>
                                            </td>
                                            <td>{{ $homeslide->created_at }}</td>    
                                            <td>{{ $homeslide->updated_at }}</td>                                    
                                            <td>
                                                <ul class="list-inline font-size-20 contact-links mb-0">
                                                    <li class="list-inline-item px-2">
                                                        <a href="{{ route('home-slide.edit' , $homeslide->conf_homeslide_id) }}" title="Edit"><i
                                                                class="bx bx-edit"></i></a>
                                                    </li>
                                                    <li class="list-inline-item px-2">
                                                        <a href="javascript: void(0);" class="btn-delete" data-id="{{ $homeslide->conf_homeslide_id }}" data-delete="{{ route('home-slide.destroy' , $homeslide->conf_homeslide_id) }}" title="Delete"><i
                                                                class="bx bx-trash-alt"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <!-- end container-fluid -->
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
        $(document).ready(function() {
        var table =  $('#table-homeslide').DataTable({
            order: [[ 1, 'asc' ]],
            columnDefs: [
            { orderable: false, targets: [0 , -1] }, // Disable ordering for the hidden column
        ],
        rowReorder: {
            selector: 'tr td:nth-child(1)',
            dataSrc: 1, // Specify the index of the column containing the icon
        }
        })

      table.on('row-reorder', function (e, diff, edit) {
        var homeslides = diff.map(function(item) {  
                return {
                    id: item.node.dataset.id, // Assuming your row has a data-id attribute
                    newOrder: item.newPosition+1,
                    homeslide_id: item.node.dataset.homeslideId
                };  
        });

        if(homeslides.length > 0){
        $.ajax({
            url: "{{ route('home-slide.sort') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                homeslides: homeslides
            },
            dataType: "json",
            success: function(response) {
                if(response.success == true){
                    toastr.success('Success', 'Reorder Homeslide', {
                    positionClass: 'toast-bottom-right',
                    progressBar: true,
                    timeOut: 2000
                });
                } else{
                    toastr.error('Error', 'Reorder Homeslide', {
                    positionClass: 'toast-bottom-right',
                    progressBar: true,
                    timeOut: 2000
                });
                }
            }
        });
        }
      });

      $('.zoom-gallery').magnificPopup({
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: true,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        },
        gallery: {
            enabled: false
        },
        zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
                return element.find('img');
            }
        }
    });

      $('.homeslide-status').change(function(){
        var id = $(this).data('id');
        var status = Number($(this).prop('checked'));
        $.ajax({
            url: "{{ route('home-slide.status') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                conf_homeslide_active : status
            },
            dataType: "json",
            success: function(response) {
                if(response.success == true){
                   toastr.success(response.msg, 'Updated Homeslide', {
                    positionClass: 'toast-bottom-right',
                    progressBar: true,
                    timeOut: 2000
                });
                } else{
                    toastr.error(response.msg, 'Updated Homeslide', {
                    positionClass: 'toast-bottom-right',
                    progressBar: true,
                    timeOut: 2000
                });
                }
            }
        });
      });

      $('.btn-delete').click(function(){
        var id = $(this).data('id');
        var deleteUrl = $(this).data('delete');
        swal.fire({
            title: 'Are you sure?',
            html: "<span class='text-warning'>You won't be able to revert this!</span>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor:'#3085d6',
            cancelButtonColor:'#d33',
            confirmButtonText:'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    url: deleteUrl,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        if(response.success == true){
                            swal.fire({
                                title:'Deleted!',
                                text:response.msg,
                                showConfirmButton: false,
                                icon:'success',
                                timer:2000,
                            }).then((result) => {                        
                                    window.location.reload();                           
                            })
                        } else{
                            swal.fire({
                                title:'Error!',
                                text:response.msg,
                                showConfirmButton: false,
                                icon:'error',
                                timer:2000,
                            })
                        }
    
                    }
                });
            }
        })
      });
    });
    </script>
@endsection
