@extends('layouts.app')

@section('css')
    <!-- select2 css -->
    <link href="{{ asset('assets/backend/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    {{-- <link href="{{ asset('assets/backend/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <style>
        .dz-progress {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">EDIT HOME STAFF PICK</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">DASHBOARD</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">HOME STAFF PICK LISTS</a></li>
                        <li class="breadcrumb-item active">EDIT HOME STAFF PICK</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form class="outer-repeater needs-validation" novalidate action="{{ route('home-staff-pick.update' , $homestaffpick->conf_homestaffpick_id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if ($errors->any())
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
                        <div data-repeater-list="outer-group" class="outer">
                            <div data-repeater-item class="outer">
                                <div class="form-group row mb-4">
                                    <label for="conf_homestaffpick_active" class="col-form-label col-lg-2">Home staff pick Image</label>
                                    <div class="col-md-6 col-lg-5 mb-3 mb-md-0 mb-lg-0">
                                        <input name="conf_homestaffpick_img" class="form-control" id="conf_homestaffpick_img" type="file" accept="image/*" />
                                    </div>
                                    <div class="col-md-6 col-lg-5 text-center">
                                        <img class="img-fluid" src="{{ asset($homestaffpick->conf_homestaffpick_img) }}" width="250"
                                            id="preview" alt="preview">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="conf_homestaffpick_url" class="col-form-label col-lg-2">Hyper link</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="conf_homestaffpick_url" id="conf_homestaffpick_url" value="{{ old('conf_homestaffpick_url' , $homestaffpick->conf_homestaffpick_url) }}">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label for="slug" class="col-form-label col-lg-2">Active</label>
                                    <div class="col-lg-10">
                                        <div class="form-check form-switch form-switch-md mt-1">
                                            <input class="form-check-input" type="checkbox" name="conf_homestaffpick_active" id="conf_homestaffpick_active" value="1" @if(old('conf_homestaffpick_active' ,  $homestaffpick->conf_homestaffpick_active) == 1 ) checked @endif>
                                            <label class="form-check-label" for="conf_homestaffpick_active"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-end gap-2">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                            <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- end row -->
@endsection

@section('js')
    <!-- select 2 plugin -->
    <script src="{{ asset('assets/backend/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#conf_homestaffpick_img').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
