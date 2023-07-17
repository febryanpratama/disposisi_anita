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
            <div class="col-6 mb-4 mt-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                           <div class="avatar">
                              <span class="avatar-initial bg-label-info rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
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
                              <span class="avatar-initial bg-label-warning rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
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
                              <span class="avatar-initial bg-label-success rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
                           </div>
                           <div class="card-info">
                              <h5 class="card-title mb-0 me-2">
                                 {{ $setuju }}
                              </h5>
                              <small class="text-muted">Jumlah Pengajuan Proposal Disetujui</small>
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
                              <span class="avatar-initial bg-label-danger rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
                           </div>
                           <div class="card-info">
                              <h5 class="card-title mb-0 me-2">
                                 {{ $ditolak }}
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
                     List Data Pengajuan Proposal Terbaru
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped">
                           <thead>
                              <tr class="text-center">
                                 <th>Pengajuan Proposal</th>
                                 <th>Tanggal Pelaksanaan</th>
                                 <th>Biaya Pengajuan</th>
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($listproposal as $item)
                              <tr class="text-center">
                                 <td>{{ $item->judul_permohonan }}</td>
                                 <td>{{ $item->tanggal_pelaksanaan }}</td>
                                 <td>Rp. {{ number_format($item->jumlah_biaya) }}</td>
                                 <td>
                                    @if ($item->status == 'TU Umum')
                                        <span class="badge bg-danger">Sedang Di Verifikasi TU Umum</span>
                                    @elseif($item->status == 'Setda')
                                        <span class="badge bg-warning">Sedang Ditinjau Setda</span>
                                    @elseif($item->status == 'Walikota')
                                        <span class="badge bg-info">Sedang Ditinjai Walikota</span>
                                    @elseif($item->status == 'Selesai')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif($item->status == 'Ditolak')
                                       <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                 </td>
                              </tr>
                                  
                              @endforeach
                           </tbody>
                        </table>
                     </div>
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
                              <span class="avatar-initial bg-label-info rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
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
                              <span class="avatar-initial bg-label-warning rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
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
                              <span class="avatar-initial bg-label-success rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
                           </div>
                           <div class="card-info">
                              <h5 class="card-title mb-0 me-2">
                                 {{ $setuju }}
                              </h5>
                              <small class="text-muted">Jumlah Pengajuan Proposal Disetujui</small>
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
                              <span class="avatar-initial bg-label-danger rounded-circle"><i
                                 class="bx bx-file fs-4"></i></span>
                           </div>
                           <div class="card-info">
                              <h5 class="card-title mb-0 me-2">
                                 {{ $ditolak }}
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
                     List Data Pengajuan Proposal Terbaru
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-striped">
                           <thead>
                              <tr class="text-center">
                                 <th>Pengajuan Proposal</th>
                                 <th>Tanggal Pelaksanaan</th>
                                 <th>Biaya Pengajuan</th>
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($listproposal as $item)
                              <tr class="text-center">
                                 <td>{{ $item->judul_permohonan }}</td>
                                 <td>{{ $item->tanggal_pelaksanaan }}</td>
                                 <td>Rp. {{ number_format($item->jumlah_biaya) }}</td>
                                 <td>
                                    @if ($item->status == 'TU Umum')
                                        <span class="badge bg-danger">Sedang Di Verifikasi TU Umum</span>
                                    @elseif($item->status == 'Setda')
                                        <span class="badge bg-warning">Sedang Ditinjau Setda</span>
                                    @elseif($item->status == 'Walikota')
                                        <span class="badge bg-info">Sedang Ditinjai Walikota</span>
                                    @elseif($item->status == 'Selesai')
                                        <span class="badge bg-success">Diterima</span>
                                    @endif
                                 </td>
                              </tr>
                                  
                              @endforeach
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

                  <div class="col-12 mb-4">
                     <div class="card">
                        <div class="card-body">
                           <h4>Realisasi Anggaran Hibah dan Bantuan Sosial</h4>
                           <hr>
                           <div class="container d-flex justify-container-center">
                              {{-- <div class="row"> --}}
                                 {{-- <div class="col-md-12"> --}}
                                       <div id="chart" style="width: 20rem; height: 10rem;"></div>
                                 {{-- </div> --}}
                              {{-- </div> --}}
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
<script>
   $(document).ready(function(){
      var jumlah = "{{ $total }}"
      var jumint = parseInt(jumlah)
       var options = {
          series: [jumint, 100000000],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Realisasi Hibah', 'Total Anggaran'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
});
</script>
<script>
   $(document).ready(function(){
      
      var januari = "{{ $januari }}"
      var februari = "{{ $februari }}"
      var maret = "{{ $maret }}"
      var april = "{{ $april }}"
      var mei = "{{ $mei }}"
      var juni = "{{ $juni }}"
      var juli = "{{ $juli }}"
      var agustus = "{{ $agustus }}"
      var september = "{{ $september }}"
      var oktober = "{{ $oktober }}"
      var november = "{{ $november }}"
      var desember = "{{ $desember }}"


      var options = {
          series: [{
          name: 'Net Profit',
          data: [januari, februari, maret, april, mei, juni, juli, agustus, september, oktober, november, desember]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
      
      //   var options = {
      //     series: [{
      //     name: 'Net Profit',
      //     data: [44, 55, 57, 56, 61, 58, 63, 60, 66,70]
      //   }],
      //     chart: {
      //     type: 'bar',
      //     height: 350
      //   },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov', 'Dec'],
        },
        yaxis: {
          title: {
            text: 'Pengajuan'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return " " + val + " Pengajuan"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#analyticsBarChart"), options);
        chart.render();
   });
</script>
@endsection