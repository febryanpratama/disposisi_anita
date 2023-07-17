@extends('layouts.base_admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-lg-8 col-md-8 mb-4">
         <div class="row">
            @role('Admin|Setda|Walikota')
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
                     </div>
                     <div id="analyticsBarChart"></div>
                  </div>
               </div>
            </div>
            @endrole
            @role('Pemohon')
            <div class="col-6 mb-4 mt-3">
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
            <div class="col-6 mb-4 mt-3">
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
            <div class="col-6 mb-4 mt-3">
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
            <div class="col-6 mb-4 mt-3">
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
            <div class="col-12 mb-4 mt-3">
               <div class="card">
                  <div class="card-header">
                     List Data Pengajuan Proposal
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped">
                           <thead>
                              <tr>
                                 <th>Pengajuan Proposal</th>
                                 <th>Tanggal Pelaksanaan</th>
                                 <th>Biaya Pengajuan</th>
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>1</td>
                                 <td>1</td>
                                 <td>1</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            @endrole
         </div>
      </div>
      <div class="col-lg-4 col-md-12">
         <div class="row">
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
                  <div class="card">
                     <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2"><span style="font-weight: 100">Log Proposal</span> {{ @$proposal->judul_permohonan }}</h5>

                     </div>
                     <hr>
                     <div class="card-body">
                        <ul class="timeline">

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
                              <li class="timeline-end-indicator">
                              <i class="bx bx-check-circle"></i>
                              </li>
                        </ul>
                     </div>
                  </div>
                  @endrole
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