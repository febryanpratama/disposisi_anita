<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img src="{{ asset('images/Hibsos.png') }}" style="width: 200px; height: 170px" alt="">
            {{-- <span class="app-brand-logo demo">
                <svg width="26px" height="26px" viewBox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <title>icon</title>
                    <defs>
                        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                            <stop stop-color="#5A8DEE" offset="0%"></stop>
                            <stop stop-color="#699AF9" offset="100%"></stop>
                        </linearGradient>
                        <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-2">
                            <stop stop-color="#FDAC41" offset="0%"></stop>
                            <stop stop-color="#E38100" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <g id="Pages" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Login---V2" transform="translate(-667.000000, -290.000000)">
                            <g id="Login" transform="translate(519.000000, 244.000000)">
                                <g id="Logo" transform="translate(148.000000, 42.000000)">
                                    <g id="icon" transform="translate(0.000000, 4.000000)">
                                        <path
                                            d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5423509 4.74623858,13.2027679 4.78318172,12.8686032 L8.54810407,12.8689442 C8.48567157,13.19852 8.45300462,13.5386269 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.5386269,8.45300462 13.19852,8.48567157 12.8689442,8.54810407 L12.8686032,4.78318172 C13.2027679,4.74623858 13.5423509,4.72727273 13.8863636,4.72727273 Z"
                                            id="Combined-Shape"
                                            fill="#4880EA"
                                        ></path>
                                        <path
                                            d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"
                                            id="Combined-Shape2"
                                            fill="url(#linearGradient-1)"
                                        ></path>
                                        <rect id="Rectangle" fill="url(#linearGradient-2)" x="0" y="0" width="7.68181818" height="7.68181818"></rect>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Frest</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    
    @hasrole('Admin')
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>


        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Management Data</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-check-shield"></i>
              <div data-i18n="Pengajuan">Pengajuan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ url('admin/individu') }}" class="menu-link">
                  <div data-i18n="Individu">Individu</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ url('admin/organisasi') }}" class="menu-link">
                  <div data-i18n="Organisasi">Organisasi</div>
                </a>
              </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ url('admin/anggaran') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Anggaran">Anggaran</div>
            </a>
        </li>

        

        <!-- Components -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen</span>
        </li>
        <!-- Cards -->
        
        {{-- <li class="menu-item active" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="cards-basic.html" class="menu-link">
                        <div data-i18n="Walikota">Walikota</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-advance.html" class="menu-link">
                        <div data-i18n="Pemohon">Pemohon</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-statistics.html" class="menu-link">
                        <div data-i18n="Setda">Setda</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="cards-analytics.html" class="menu-link">
                        <div data-i18n="Verifikator">Verifikator</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        <li class="menu-item">
            <a href="{{ url('admin/pengguna') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
        </li>

        {{-- <li class="menu-item">
            <a href="{{ url('admin/profil') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Profil">Profil</div>
            </a>
        </li> --}}
        
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn  btn-danger-outline form-control menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Logout">Logout</div>
                </button>
            </form>
        </li>
        
    </ul>
    @endrole

    
    @hasrole('Setda')
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>


        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Pengajuan</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-check-shield"></i>
              <div data-i18n="Pengajuan">Pengajuan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ url('setda/individu') }}" class="menu-link">
                  <div data-i18n="Individu">Individu</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ url('setda/organisasi') }}" class="menu-link">
                  <div data-i18n="Organisasi">Organisasi</div>
                </a>
              </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{ url('setda/pertanggungjawaban') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Pertanggungjawaban">Pertanggungjawaban</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Pengguna</span>
        </li>
        {{-- <li class="menu-item">
            <a href="{{ url('setda/anggota') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Anggota">Anggota</div>
            </a>
        </li> --}}

        <!-- Components -->
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen</span>
        </li> --}}
        <!-- Cards -->
        
        {{-- <li class="menu-item active" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="cards-basic.html" class="menu-link">
                        <div data-i18n="Walikota">Walikota</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-advance.html" class="menu-link">
                        <div data-i18n="Pemohon">Pemohon</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-statistics.html" class="menu-link">
                        <div data-i18n="Setda">Setda</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="cards-analytics.html" class="menu-link">
                        <div data-i18n="Verifikator">Verifikator</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- <li class="menu-item">
            <a href="{{ url('admin/pengguna') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('admin/profil') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Profil">Profil</div>
            </a>
        </li> --}}
        
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn  btn-danger-outline form-control menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Logout">Logout</div>
                </button>
            </form>
        </li>

        
        
    </ul>
    @endrole

    @hasrole('Anggota')
    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Pengajuan</span>
        </li>
        <li class="menu-item">
            <a href="{{ url('anggota/surat') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Proposal">Proposal</div>
            </a>
        </li>
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn  btn-danger-outline form-control menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Logout">Logout</div>
                </button>
            </form>
        </li>
    </ul>
    @endrole
    @hasrole('Walikota')
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        {{-- <li class="menu-item">
            <a href="{{ url('walikota/daftar-penerima') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Daftar Penerima">Daftar Penerima</div>
            </a>
        </li> --}}


        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Pengajuan</span>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-check-shield"></i>
              <div data-i18n="Pengajuan">Pengajuan</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ url('walikota/individu') }}" class="menu-link">
                  <div data-i18n="Individu">Individu</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ url('walikota/organisasi') }}" class="menu-link">
                  <div data-i18n="Organisasi">Organisasi</div>
                </a>
              </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="{{ url('walikota/histori-pengajuan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Histori Pengajuan">Histori Pengajuan</div>
            </a>
        </li>
    

        <!-- Components -->
        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen</span>
        </li> --}}
        <!-- Cards -->
        
        {{-- <li class="menu-item active" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="cards-basic.html" class="menu-link">
                        <div data-i18n="Walikota">Walikota</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-advance.html" class="menu-link">
                        <div data-i18n="Pemohon">Pemohon</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="cards-statistics.html" class="menu-link">
                        <div data-i18n="Setda">Setda</div>
                    </a>
                </li>
                <li class="menu-item active">
                    <a href="cards-analytics.html" class="menu-link">
                        <div data-i18n="Verifikator">Verifikator</div>
                    </a>
                </li>
            </ul>
        </li> --}}
        {{-- <li class="menu-item">
            <a href="{{ url('admin/pengguna') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Pengguna">Pengguna</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="{{ url('admin/profil') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar"></i>
                <div data-i18n="Profil">Profil</div>
            </a>
        </li> --}}
        
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn  btn-danger-outline form-control menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Logout">Logout</div>
                </button>
            </form>
        </li>
        
    </ul>
    @endrole
    
    @role('Pemohon')
    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item">
            <a href="{{ url('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>


        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Manajemen Proposal</span>
        </li>
        <li class="menu-item">
            <a href="{{ url('pemohon/surat') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Pengajuan Proposal">Pengajuan Proposal</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('pemohon/profil') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Profil Pemohon">Profil Pemohon</div>
            </a>
        </li>

      
        <li class="menu-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn  btn-danger-outline form-control menu-link">
                    <i class="menu-icon tf-icons bx bx-file"></i>
                    <div data-i18n="Logout">Logout</div>
                </button>
            </form>
        </li>
        
    </ul>
    @endrole
</aside>
