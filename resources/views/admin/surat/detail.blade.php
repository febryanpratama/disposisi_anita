@extends('layouts.base_admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <div class="row">
      <div class="col-md-6">
         <h4 class="py-3 breadcrumb-wrapper mb-4"><span class="text-muted fw-light">Pengajuan /</span> Detail Proposal</h4>
      </div>
      <div class="col-md-6" style="text-align: right">
        @if ($data->status  == 'TU Umum')
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah Status Pengajuan</button>
            
        @endif
      </div>
   </div>
   <div class="row gy-4">
      <div class="col-md-6 col-lg-5 mb-4 order-3 order-lg-0">
         <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Profil Pemohon</h4>
                    </div>
                    <div class="col-md-6" style="text-align: right">
                        @switch($data->status)
                            @case('TU Umum')
                                <div class="btn btn-info">
                                    Belum Diverifikasi TU Umum
                                </div>
                                @break
                            @case('Setda')
                                <div class="btn btn-info">
                                    Berhasil Diverifikasi Admin
                                </div>
                                @break
                                @case('Walikota')
                                <div class="btn btn-info">
                                    Berhasil Diverifikasi Kesra
                                </div>
                                @break
                                @case('Ditolak')
                                <div class="btn btn-danger">
                                    Data Ditolak
                                </div>
                                @break
                            @default
                                
                        @endswitch
                    </div>
                </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6 mt-3">
                     <label for="" class="control-label">Nama Pemohon</label>
                     <input type="text" class="form-control mt-2" value="Nama Pemohon" readonly>
                  </div>
                  <div class="col-md-6 mt-3">
                     <label for="" class="control-label">NIK Pemohon</label>
                     <input type="text" class="form-control mt-2" value="Nama Pemohon" readonly>
                  </div>
                  <div class="col-md-6 mt-3">
                     <label for="" class="control-label">Alamat Pemohon</label>
                     <input type="text" class="form-control mt-2" value="Nama Pemohon" readonly>
                  </div>
                  <div class="col-md-6 mt-3">
                     <label for="" class="control-label">Nomor Telpon Pemohon</label>
                     <input type="text" class="form-control mt-2" value="Nama Pemohon" readonly>
                  </div>
                  <div class="col-md-6 mt-3">
                     <label for="" class="control-label">Identitas Pemohon</label>
                     <img src="https://cdn.popmama.com/content-images/community/20221018/community-6151307037af4cffa62490fdc39e65b7.jpg" class="img-fluid mt-2" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-lg-7 mb-4 order-2 order-lg-0">
         <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between">
               <div class="d-flex align-items-center me-3">
                  <img src="../../assets/img/avatars/4.png" alt="Avatar" class="rounded-circle me-3" width="54" />
                  <div class="card-title mb-0">
                     <h5 class="mb-0">{{ $data->user->name }}</h5>
                     <small class="text-muted">Jenis Pemohon : {{ $data->user->detail->jenis_pemohon }}</small>
                  </div>
               </div>
               <div class="dropdown btn-pinned">
                  <button class="btn p-0" type="button" id="financoalReport" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="financoalReport">
                     <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                     <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                     <a class="dropdown-item" href="javascript:void(0);">Share</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="d-flex flex-wrap gap-4 justify-content-center mb-5 mt-4">
                  <div class="d-flex flex-column me-2">
                     <h6>Tanggal Pengajuan</h6>
                     <span class="badge bg-label-success">{{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}</span>
                  </div>
                  <div class="d-flex flex-column me-2">
                     <h6>Tanggal Pelaksanaan</h6>
                     <span class="badge bg-label-danger">{{ Carbon\Carbon::parse($data->tanggal_pelaksanaan)->format('d M Y') }}</span>
                  </div>
                  {{-- 
                  <div class="d-flex flex-column me-2">
                     <h6>Members</h6>
                     <ul class="list-unstyled me-2 d-flex align-items-center avatar-group mb-0">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Vinnie Mostowy">
                           <img class="rounded-circle" src="../../assets/img/avatars/5.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Allen Rieske">
                           <img class="rounded-circle" src="../../assets/img/avatars/12.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Julee Rossignol">
                           <img class="rounded-circle" src="../../assets/img/avatars/6.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Ellen Wagner">
                           <img class="rounded-circle" src="../../assets/img/avatars/14.png" alt="Avatar" />
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" aria-label="Darcey Nooner">
                           <img class="rounded-circle" src="../../assets/img/avatars/10.png" alt="Avatar" />
                        </li>
                     </ul>
                  </div>
                  --}}
                  <div class="d-flex flex-column me-2">
                     <h6>Jumlah Biaya</h6>
                     <span>Rp. {{ number_format($data->jumlah_biaya) }}</span>
                  </div>
                  <div class="d-flex flex-column me-2">
                     <h6>Jumlah Biaya Disetujui</h6>
                     <span> -- </span>
                  </div>
               </div>
               <div class="d-flex flex-column flex-grow-1">
                  <span class="text-nowrap d-block mb-1">
                     <h5>Judul Pengajuan Proposal</h5>
                  </span>
                  <p>{{ $data->judul_permohonan }}</p>
               </div>
               <span>
                  <h5>Deskripsi Pengajuan Proposal</h5>
               </span>
               <p>{{ $data->deskripsi_permohonan }}</p>
            </div>
            {{-- 
            <div class="card-footer border-top">
               <ul class="list-inline mb-0">
                  <li class="list-inline-item"><i class="bx bx-check"></i> 74 Tasks</li>
                  <li class="list-inline-item"><i class="bx bx-chat"></i> 678 Comments</li>
               </ul>
            </div>
            --}}
         </div>
      </div>
   </div>
   <div class="row gy-4">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="text-align: center">
                <h3>Bukti Pendukung</h3>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Dokumen Proposal</b>
                        <br>
                        <a href="{{ url('dokumen_proposal/'.$data->dokumen_proposal) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('dokumen_proposal/'.$data->dokumen_proposal) }}" type="">
                    </div>
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Surat Keterangan Domisili</b>
                        <br>
                        <a href="{{ url('surat_keterangan_domisili/'.$data->surat_keterangan_domisili) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('surat_keterangan_domisili/'.$data->surat_keterangan_domisili) }}" type="">
                    </div>
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Surat Duplikasi Biaya</b>
                        <br>
                        <a href="{{ url('surat_duplikasi_biaya/'.$data->surat_duplikasi_biaya) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('surat_duplikasi_biaya/'.$data->surat_duplikasi_biaya) }}" type="">
                    </div>
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Surat Pernyataan Tidak Konflik</b>
                        <br>
                        <a href="{{ url('surat_pernyataan_konflik/'.$data->surat_pernyataan_konflik) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('surat_pernyataan_konflik/'.$data->surat_pernyataan_konflik) }}" type="">
                    </div>
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Surat Rekomendasi Kecamatan</b>
                        <br>
                        <a href="{{ url('surat_rekomendasi_kecamatan/'.$data->surat_rekomendasi_kecamatan) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('surat_rekomendasi_kecamatan/'.$data->surat_rekomendasi_kecamatan) }}" type="">
                    </div>
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Foto Rekening</b>
                        <br>
                        <a href="{{ url('rekening/'.$data->rekening) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('rekening/'.$data->rekening) }}" type="">
                    </div>
                    <div class="col-md-6 mt-2" style="text-align: center">
                        <b>Surat Pernyataan Lembaga</b>
                        <br>
                        <a href="{{ url('surat_pernyataan_lembaga/'.$data->surat_pernyataan_lembaga) }}" target="_blank">Lihat Disini</a>
                        <br>
                        <embed src="{{ asset('surat_pernyataan_lembaga/'.$data->surat_pernyataan_lembaga) }}" type="">
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 mb-4 order-3 order-lg-0">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title m-0 me-2">Log Proposal</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
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
                        @foreach ($data->log as $item)
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
        </div>
   </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Status Pengajuan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ url('admin/surat/'.$data->id.'/ubah') }}" method="POST">
            @csrf
            <input type="hidden" name="surat_id" value="{{ $data->id }}">
            <div class="modal-body">
                <div class="row">
                <div class="col-md-12 mt-1">
                    <label for="" class="control-label">
                        <h6>Status Pengajuan</h6>
                    </label>
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option selected>Pilih Status</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="Direvisi">Direvisi</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <label for="" class="control-label">
                        <h6>Catatan</h6>
                    </label>
                    <textarea class="form-control" rows="5" name="catatan" placeholder="Catatan"></textarea>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('script')
<script>
   $(document).ready( function () {
       $('#myTable').DataTable();
   });
   
   $('#jenis_pemohon').on('change', function(){
       let value =  $('#jenis_pemohon :selected').val();
   
       if (value == 'Individu') {
           $('#individu').removeClass('hide')
           $('#nikindividu').removeClass('hide')
           $('#organisasi').addClass('hide')
           $('#noorganisasi').addClass('hide')
       }else{
           $('#individu').addClass('hide')
           $('#nikindividu').addClass('hide')
           $('#organisasi').removeClass('hide')
           $('#noorganisasi').removeClass('hide')
       }
       // console.log(value)
   })
</script>
@endsection