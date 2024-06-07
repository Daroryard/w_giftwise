<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/backend/libs/owl.carousel/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/backend/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body class="auth-body-bg">
    <div id="app">
        <div class="container-fluid p-0">
            <div class="row g-0">
                
                <div class="col-xl-9">
                    <img src="{{ asset('assets/images/B-GW-relations-01-01-01.png') }}" alt="" class="auth-full-bg-img" style="width: 100%; height: 100%; object-fit: cover;">
                    {{-- <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">       
                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center">
                                                
                                                <h4 class="mb-3"><i class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span class="text-primary">5k</span>+ Satisfied clients</h4>
                                                
                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel" id="auth-review-carousel">
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" Fantastic theme with a ton of options. If you just want the HTML to integrate with your project, then this is the package. You can find the files in the 'dist' folder...no need to install git and all the other stuff the documentation talks about. "</p>
        
                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">Abs1981</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
        
                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-16 mb-4">" If Every Vendor on Envato are as supportive as Themesbrand, Development with be a nice experience. You guys are Wonderful. Keep us the good work. "</p>
        
                                                                <div>
                                                                    <h4 class="font-size-16 text-primary">nezerious</h4>
                                                                    <p class="font-size-14 mb-0">- Skote User</p>
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
                        </div>
                    </div> --}}
                </div>
                <!-- end col -->
        
                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
        
                            <div class="d-flex flex-column">
                                <div class="mb-4 mb-md-5">
                                    <a href="index.html" class="d-block auth-logo">
                                        <img src="assets/images/logo-dark.png" alt="" height="18" class="auth-logo-dark">
                                        <img src="assets/images/logo-light.png" alt="" height="18" class="auth-logo-light">
                                    </a>
                                </div>
                                <div class="my-auto">
                                    
                                    <div>
                                        <h5 class="text-primary">Welcome !</h5>
                                        <p class="text-muted">Sign in to continue to GIFTWISE ASIA.</p>
                                    </div>
        
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Username</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                            </div>
                    
                                            <div class="mb-3">
                                                <div class="float-end">
                                                    <a href="auth-recoverpw-2.html" class="text-muted">Forgot password?</a>
                                                </div>
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                            </div>
                    
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="remember">
                                                    Remember me
                                                </label>
                                            </div>
                                            
                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                               
                                        </form>
           
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/backend/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/node-waves/waves.min.js') }}"></script>

    <!-- owl.carousel js -->
    <script src="{{ asset('assets/backend/libs/owl.carousel/owl.carousel.min.js') }}"></script>

    <!-- auth-2-carousel init -->
    <script src="{{ asset('assets/backend/js/pages/auth-2-carousel.init.js') }}"></script>
    
    <!-- App js -->
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>
</body>
</html>
