@extends('layouts.base_admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <!-- Website Analytics-->
      <div class="col-lg-8 col-md-8 mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h5 class="card-title mb-0">Grafik Chart Pengajuan Tahun Ini</h5>
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
                        {{-- <div class="user-analytics text-center me-2">
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
                        </div> --}}
                     </div>
                     <div id="analyticsBarChart"></div>
                  </div>
               </div>
            </div>
            <div class="col-3 mb-4 mt-3">
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
                                 {{ $all }}
                              </h5>
                              <small class="text-muted">Jumlah Pengajuan Proposal</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-3 mb-4 mt-3">
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
                                 {{ $proses }}
                              </h5>
                              <small class="text-muted">Jumlah Pengajuan Proposal Diproses</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-3 mb-4 mt-3">
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
                                 {{ $proses }}
                              </h5>
                              <small class="text-muted">Jumlah Pengajuan Proposal Divalidasi</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-3 mb-4 mt-3">
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
                                 {{ $setuju }}
                              </h5>
                              <small class="text-muted">Jumlah Pengajuan Proposal Ditolak</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Referral, conversion, impression & income charts -->
      <div class="col-lg-4 col-md-12">
         <div class="row">
            <!-- Referral Chart-->
            {{-- 
            <div class="col-sm-6 col-12 mb-4">
               <div class="card">
                  <div class="card-body text-center">
                     <h2 class="mb-1">$32,690</h2>
                     <span class="text-muted">Referral 40%</span>
                     <div id="referralLineChart"></div>
                  </div>
               </div>
            </div>
            --}}
            <!-- Conversion Chart-->
            {{-- <div class="col-sm-12 col-12 mb-4">
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
            </div> --}}
            <!-- Impression Radial Chart-->
            {{-- 
            <div class="col-sm-6 col-12 mb-4">
               <div class="card">
                  <div class="card-body text-center">
                     <div id="impressionDonutChart"></div>
                  </div>
               </div>
            </div>
            --}}
            <!-- Growth Chart-->
            <div class="col-sm-12 col-12">
               <div class="row">
                  @role('Admin|Setda|Walikota')
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
                                       {{ $pengguna }}
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
                                    <h5 class="card-title font-14 mb-0 me-2">
                                       Rp. {{ number_format($total) }}
                                    </h5>
                                    <small class="text-muted ">Total Pengajuan Hibah dan Bansos</small>
                                 </div>
                              </div>
                              <div id="incomeChart"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endrole
                  @role('Pemohon')
                  {{-- <div class="col-md-4 col-sm-12 mb-4 order-3 order-lg-0">
                  </div> --}}
                  <div class="card">
                     <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2"><span style="font-weight: 100">Log Proposal</span> {{ @$proposal->judul_permohonan }}</h5>
                        {{-- <div class="dropdown">
                              <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                              <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                              <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                              <a class="dropdown-item" href="javascript:void(0);">Share</a>
                              </div>
                        </div> --}}
                     </div>
                     <hr>
                     <div class="card-body">
                        <!-- Activity Timeline -->
                        <ul class="timeline">
                              {{-- 
                              <li class="timeline-item timeline-item-transparent ps-4">
                              <span class="timeline-point timeline-point-primary"></span>
                              <div class="timeline-event pb-2">
                                 <div class="timeline-header mb-1">
                                    <h6 class="mb-0">12 Invoices have been paid</h6>
                                    <small class="text-muted">12 min ago</small>
                                 </div>
                                 <p class="mb-2">Invoices have been paid to the company</p>
                                 <div class="d-flex">
                                    <a href="javascript:void(0)" class="d-flex align-items-center me-3">
                                          <img src="../../assets/img/icons/misc/pdf.png" alt="PDF image" width="23" class="me-2" />
                                          <h6 class="mb-0">Invoices.pdf</h6>
                                    </a>
                                 </div>
                              </div>
                              </li>
                              --}}

                              @if ($proposal != null)
                                 @foreach ($proposal->log as $item)
                                 <li class="timeline-item timeline-item-transparent ps-4">
                                 <span class="timeline-point timeline-point-warning"></span>
                                 <div class="timeline-event pb-2">
                                    <div class="timeline-header mb-1">
                                       <h6 class="mb-0">{{ $item->deskripsi }}</h6>
                                       <small class="text-muted">{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</small>
                                    </div>
                                    <p class="mb-2">{{ $item->deskripsi }}</p>
                                    <div class="d-flex flex-wrap">
                                       <div class="avatar me-3">
                                             <img src="{{ asset('') }}assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                                       </div>
                                       <div>
                                             <h6 class="mb-0">{{ $item->name }}</h6>
                                             <span>Hibsos Pontianak</span>
                                       </div>
                                    </div>
                                 </div>
                                 </li>
                                 @endforeach
                              @endif
                              {{-- 
                              <li class="timeline-item timeline-item-transparent ps-4">
                              <span class="timeline-point timeline-point-info"></span>
                              <div class="timeline-event pb-0">
                                 <div class="timeline-header mb-1">
                                    <h6 class="mb-0">Create a new project for client</h6>
                                    <small class="text-muted">2 Day Ago</small>
                                 </div>
                                 <p class="mb-2">5 team members in a project</p>
                                 <div class="d-flex align-items-center avatar-group">
                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" aria-label="Vinnie Mostowy">
                                          <img src="../../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </div>
                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" aria-label="Marrie Patty">
                                          <img src="../../assets/img/avatars/12.png" alt="Avatar" class="rounded-circle" />
                                    </div>
                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" aria-label="Jimmy Jackson">
                                          <img src="../../assets/img/avatars/9.png" alt="Avatar" class="rounded-circle" />
                                    </div>
                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" aria-label="Kristine Gill">
                                          <img src="../../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                                    </div>
                                    <div class="avatar avatar-sm pull-up" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" aria-label="Nelson Wilson">
                                          <img src="../../assets/img/avatars/14.png" alt="Avatar" class="rounded-circle" />
                                    </div>
                                 </div>
                              </div>
                              </li>
                              --}}
                              <li class="timeline-end-indicator">
                              <i class="bx bx-check-circle"></i>
                              </li>
                        </ul>
                        <!-- /Activity Timeline -->
                     </div>
                  </div>
                  @endrole
               </div>
            </div>
         </div>
      </div>
      <!--/ Referral, conversion, impression & income charts -->
      <!-- Activity -->
      <!--/ Activity -->
      <!--/ Activity Timeline -->
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