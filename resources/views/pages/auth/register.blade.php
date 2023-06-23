<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-bordered" data-assets-path="{{ asset('') }}assets/" data-template="vertical-menu-template-bordered">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Register Basic - Pages | Frest - Bootstrap Admin Template</title>

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

        <style>
          .hide {
            display: none;
          }
        </style>
        <!-- Helpers -->
        {{-- <script src="{{ asset('') }}assets/vendor/js/helpers.js"></script> --}}

        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        {{-- <script src="{{ asset('') }}assets/vendor/js/template-customizer.js"></script> --}}
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        {{-- <script src="{{ asset('') }}assets/js/config.js"></script> --}}

        <!-- Global site tag (gtag.js) - Google Analytics -->
        {{-- <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script> --}}
        {{-- <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());
            gtag("config", "GA_MEASUREMENT_ID");
        </script> --}}
        <!-- Custom notification for demo -->
        <!-- beautify ignore:end -->
    </head>

    <body>
        <!-- Content -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner col-md-12">
                    <!-- Register Card -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <div class="app-brand justify-content-center">
                                <img src="https://febryancaesarpratama.com/wp-content/uploads/2023/06/Disnaker-120x120.png" alt="">
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2">Selamat Datang di HIBSOS Pontianak 👋</h4>
                            <p class="mb-4">Silahkan mendaftar terlebih dahulu</p>

                            <form  class="mb-3" action="{{ url('auth/register') }}" method="POST" novalidate>
                              @csrf
                              <div class="row">
                                <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="">Jenis Pemohon</label>
                                  <select name="jenis_pemohon" class="form-control" name="jenis_pemohon" id="jenis_pemohon" required>
                                    <option value="" selected disabled> == Pilih == </option>
                                    <option value="Individu">Individu</option>
                                    <option value="Organisasi">Organisasi</option>
                                  </select>
                                </div>

                                <div class="col-md-6 col-sm-12 mb-2 hide" id="namaPemohon">
                                  <label for="">Nama Pemohon</label>
                                  <input type="text" class="form-control" name="nama_pemohon" placeholder="Nama Pemohon" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2 hide" id="namaOrganisasi">
                                  <label for="">Nama Organisasi</label>
                                  <input type="text" class="form-control" name="nama_organisasi" placeholder="Nama Organisasi" required>
                                </div>
  
                                <div class="col-md-6 col-sm-12 mb-2 hide" id="identitasPemohon">
                                  <label for="">NIK Pemohon</label>
                                  <input type="text" class="form-control" name="identitas_pemohon" placeholder="Nama Organisasi" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2 hide" id="identitasOrganisasi">
                                  <label for="">Nomor Organisasi</label>
                                  <input type="text" class="form-control" name="identitas_organisasi" placeholder="Nama Organisasi" required>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="">Alamat</label>
                                  <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                  <label for="">Nomor Telpon</label>
                                  <input type="number" class="form-control" name="telpon" id="">
                                </div>
                                
                                <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="">Email</label>
                                  <input type="email" class="form-control" name="email" placeholder="Email Pengguna" required>
                                </div>
                                <div class="col-md-6 col-sm-12 mb-2">
                                  <label for="">Password</label>
                                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                              </div>

                                <div class="mb-3 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                        <label class="form-check-label" for="terms-conditions">
                                            I agree to
                                            <a href="javascript:void(0);">privacy policy & terms</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-info form-control">
                                    Sign up
                                </button>
                                {{-- <button type="submit" class ="btn btn-outline-info form-control">
                                    Sign up
                                </button> --}}
                            </form>

                        </div>
                    </div>
                    <!-- Register Card -->
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
        {{-- <script src="{{ asset('') }}assets/vendor/libs/popper/popper.js"></script>
        <script src="{{ asset('') }}assets/vendor/js/bootstrap.js"></script> --}}
        {{-- <script src="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> --}}

        {{-- <script src="{{ asset('') }}assets/vendor/libs/hammer/hammer.js"></script> --}}

        {{-- <script src="{{ asset('') }}assets/vendor/libs/i18n/i18n.js"></script> --}}
        {{-- <script src="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.js"></script> --}}

        {{-- <script src="{{ asset('') }}assets/vendor/js/menu.js"></script> --}}
        <!-- endbuild -->

        <!-- Vendors JS -->
        {{-- <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script> --}}
        {{-- <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script> --}}
        {{-- <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script> --}}

        <!-- Main JS -->
        {{-- <script src="{{ asset('') }}assets/js/main.js"></script> --}}

        <!-- Page JS -->
        {{-- <script src="{{ asset('') }}assets/js/pages-auth.js"></script> --}}

        <script>
          $('#jenis_pemohon').on('change', function(){
            // console.log("data")
            let value = $(this).val()
            // console.log(value)
            if(value == 'Individu'){
              $('#namaPemohon').removeClass('hide')
              $('#identitasPemohon').removeClass('hide')
              $('#namaOrganisasi').addClass('hide')
              $('#identitasOrganisasi').addClass('hide')
            }else{
              $('#namaPemohon').addClass('hide')
              $('#identitasPemohon').addClass('hide')
              $('#namaOrganisasi').removeClass('hide')
              $('#identitasOrganisasi').removeClass('hide')

            }
            // console.log(value)
          })
        </script>
    </body>

    <!-- Mirrored from pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/html/vertical-menu-template-bordered/auth-register-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 03 Nov 2022 12:03:04 GMT -->
</html>
