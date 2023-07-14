<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-bordered" data-assets-path="{{ asset('') }}assets/" data-template="vertical-menu-template-bordered">
    <!-- Mirrored from pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/vertical-menu-template-bordered/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Nov 2022 12:03:03 GMT -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Login Basic - Pages | Frest - Bootstrap Admin Template</title>

        <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
        <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 admin, bootstrap 5 design, bootstrap 5" />
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://1.envato.market/frest_admin" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="https://pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/assets/img/favicon/favicon.ico" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
            rel="stylesheet"
        />

        <!-- Icons -->
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/css/rtl/theme-bordered.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{ asset('') }}assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.css" />
        <!-- Vendor -->
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset('') }}assets/vendor/css/pages/page-auth.css" />
        <!-- Helpers -->
        <script src="{{ asset('') }}assets/vendor/js/helpers.js"></script>

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        <script src="{{ asset('') }}assets/vendor/js/template-customizer.js"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{ asset('') }}assets/js/config.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "GA_MEASUREMENT_ID");
        </script>
        <!-- Custom notification for demo -->
        <!-- beautify ignore:end -->
    </head>

    <body>
        <!-- Content -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">
                    <!-- Register -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <img src="https://setda.pontianak.go.id/storage/settings/May2021/PyErfz6T5IwOwylq43iM.png" width="150rem"  alt="">
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Selamat Datang di HIBSOS Pontianak 👋</h4>
                            <p class="mb-4">Silahkan login menggunakan akun yang telah terdaftar</p>

                            <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email </label>
                                    <input type="text" class="form-control" id="email" name="email" :value="old('email')" placeholder="Masukkan email anda" autofocus />
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                        <a href="auth-forgot-password-basic.html">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" type="password"
                                name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me" />
                                        <label class="form-check-label" for="remember-me">
                                            Remember Me
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /Register -->
                </div>
            </div>
        </div>

        <!-- / Content -->

        <div class="buy-now">
            <a href="https://1.envato.market/frest_admin" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
        </div>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="{{ asset('') }}assets/vendor/libs/jquery/jquery.js"></script>
        <script src="{{ asset('') }}assets/vendor/libs/popper/popper.js"></script>
        <script src="{{ asset('') }}assets/vendor/js/bootstrap.js"></script>
        <script src="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="{{ asset('') }}assets/vendor/libs/hammer/hammer.js"></script>

        <script src="{{ asset('') }}assets/vendor/libs/i18n/i18n.js"></script>
        <script src="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>

        <script src="{{ asset('') }}assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
        <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
        <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

        <!-- Main JS -->
        <script src="{{ asset('') }}assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="{{ asset('') }}assets/js/pages-auth.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
          $(document).ready(function() {
            // $('#example').DataTable();

            @if (session('success'))
            Swal.fire(
              'Great !',
              '{{ session("success") }}',
              'success'
            )
            // swal("Great !", "{{ session('success') }}", "success");
            @endif ()
            
            @if (session('errors'))
            Swal.fire(
              'Oh No !',
              '{{ session("errors") }}',
              'error'
            )
            // swal("Oh No !", "{{ session('errors') }}", "errors");
            @endif ()

          });
        </script>
    </body>

    <!-- Mirrored from pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/vertical-menu-template-bordered/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Nov 2022 12:03:03 GMT -->
</html>
