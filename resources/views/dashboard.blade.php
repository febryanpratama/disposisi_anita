@extends('layouts.base_admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Website Analytics-->
            <div class="col-lg-8 col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Jumlah Hibah dan Bantuan Sosial</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="analyticsOptions" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="analyticsOptions">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                    </div>
                    <div class="card-body pb-2">
                    <div class="d-flex justify-content-around align-items-center flex-wrap mb-4">
                        <div class="user-analytics text-center me-2">
                        <i class="bx bx-user me-1"></i>
                        <span>Pengguna</span>
                        <div class="d-flex align-items-center mt-2">
                            <div class="chart-report" data-color="success" data-series="35"></div>
                            <h3 class="mb-0">20</h3>
                        </div>
                        </div>
                        <div class="sessions-analytics text-center me-2">
                        <i class="bx bx-pie-chart-alt me-1"></i>
                        <span>Sessions</span>
                        <div class="d-flex align-items-center mt-2">
                            <div class="chart-report" data-color="warning" data-series="76"></div>
                            <h3 class="mb-0">92K</h3>
                        </div>
                        </div>
                        <div class="bounce-rate-analytics text-center">
                        <i class="bx bx-trending-up me-1"></i>
                        <span>Bounce Rate</span>
                        <div class="d-flex align-items-center mt-2">
                            <div class="chart-report" data-color="danger" data-series="65"></div>
                            <h3 class="mb-0">72.6%</h3>
                        </div>
                        </div>
                    </div>
                    <div id="analyticsBarChart"></div>
                    </div>
                </div>
            </div>

            <!-- Referral, conversion, impression & income charts -->
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <!-- Referral Chart-->
                    {{-- <div class="col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                        <h2 class="mb-1">$32,690</h2>
                        <span class="text-muted">Referral 40%</span>
                        <div id="referralLineChart"></div>
                        </div>
                    </div>
                    </div> --}}
                    <!-- Conversion Chart-->
                    <div class="col-sm-12 col-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-3">
                            <div class="conversion-title">
                                <h5 class="card-title mb-1">Conversion</h5>
                                <p class="mb-0 text-muted">
                                60%
                                <i class="bx bx-chevron-up text-success"></i>
                                </p>
                            </div>
                            <h2 class="mb-0">89k</h2>
                            </div>
                            <div class="card-body">
                            <div id="conversionBarchart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Impression Radial Chart-->
                    {{-- <div class="col-sm-6 col-12 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                        <div id="impressionDonutChart"></div>
                        </div>
                    </div>
                    </div> --}}
                    <!-- Growth Chart-->
                    <div class="col-sm-12 col-12">
                        <div class="row">
                            <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <span class="avatar-initial bg-label-primary rounded-circle"><i
                                            class="bx bx-user fs-4"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="card-title mb-0 me-2">
                                        20
                                        </h5>
                                        <small class="text-muted">Jumlah Pengguna</small>
                                    </div>
                                    </div>
                                    <div id="conversationChart"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center gap-3">
                                    <div class="avatar">
                                        <span class="avatar-initial bg-label-warning rounded-circle"><i
                                            class="bx bx-dollar fs-4"></i></span>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="card-title mb-0 me-2">
                                        Rp. 90.000.000
                                        </h5>
                                        <small class="text-muted">Total Hibah dan Bansos</small>
                                    </div>
                                    </div>
                                    <div id="incomeChart"></div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Referral, conversion, impression & income charts -->

            <!-- Activity -->
            <!--/ Activity -->
            
            <!--/ Activity Timeline -->
        </div>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        {{-- <a href="{{ asset('exampledoc/contohsurat.pdf') }}" class="btn btn-danger m-1" title="Untuh Surat" >
                            
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 10px;height: 10px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>
                            Contoh Surat
                        </a>
                        <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#editUser"> + Surat </button> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive pt-0">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Jenis Pemohon</th>
                                        <th class="text-center">Nama Pemohon</th>
                                        <th class="text-center">Perihal Permohonan</th>
                                        <th class="text-center">Tanggal Pelaksanaan</th>
                                        <th class="text-center">Lokasi Pelaksanaan</th>
                                        <th class="text-center">Biaya</th>
                                        <th class="text-center">Lokasi Surat</th>
                                        <th class="text-center">Status Surat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td class="text-center">1</td>
                                        <td class="text-center">Organisasi</td>
                                        <td class="text-center">Nama Pemohon</td>
                                        <td class="text-center">Perihal Permohonan</td>
                                        <td class="text-center">Tanggal Pelaksanaan</td>
                                        <td class="text-center">Lokasi Pelaksanaan</td>
                                        <td class="text-center">Biaya</td>
                                        <td class="text-center">Lokasi Surat</td>
                                        <td class="text-center">Status Surat</td>
                                        <td class="text-center">Action</td>
                                    </tr>
                                    {{-- @foreach ($data as $item=>$key)
                                        <tr class="text-center">
                                            <td>{{ $item+1 }}</td>
                                            <td>{{ $key->jenis_pemohon }}</td>
                                            <td>{{ $key->user->name }}</td>
                                            <td>{{ $key->judul_permohonan }}</td>
                                            <td>{{ $key->tanggal_pelaksanaan }}</td>
                                            <td>{{ $key->lokasi_pelaksanaan }}</td>
                                            <td>{{ $key->jumlah_biaya }}</td>
                                            <td>
                                                @if ($key->status == 'TU Umum')
                                                    <span class="badge bg-danger">Sedang Di Verifikasi TU Umum</span>
                                                @elseif($key->status == 'Setda')
                                                    <span class="badge bg-warning">Sedang Ditinjau Setda</span>
                                                @else
                                                    <span class="badge bg-info">Sedang Ditinjai Walikota</span>
                                                @endif
                                            </td>
                                            <td>
                                                @switch($key->is_status)
                                                    @case(1)
                                                        <span class="badge bg-success">Setuju</span>
                                                        
                                                        @break
                                                    @case(0)
                                                        <span class="badge bg-danger">Ditolak</span>
                                                        
                                                        @break
                                                        @default
                                                        <span class="badge bg-warning">Sedang Ditinjau</span>
                                                        
                                                @endswitch
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ url('setda/surat/'.$key->id) }}" class="btn btn-primary btn-sm m-1" title="Detail Surat">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 15px;height:15px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                                                    </svg>
                                                </a>
                                                <div class="dropdown m-1">
                                                    <button class="btn btn-light btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 15px;height:15px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                        </svg>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#setuju{{ $key->id }}">Setuju</a></li>
    
                                                        <li><a class="dropdown-item" href="{{ url('setda/surat/'.$key->id.'/tolak') }}">Tolak</a></li>
                                                    </ul>
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection