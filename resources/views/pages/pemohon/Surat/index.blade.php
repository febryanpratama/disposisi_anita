@extends('layouts.base_admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">DataTables /</span> Basic
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ asset('exampledoc/contohsurat.pdf') }}" class="btn btn-danger m-1" title="Untuh Surat" >
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 10px;height: 10px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Contoh Surat
            </a>
            {{-- <button type="button" class="btn btn-danger m-1" title="Untuh Surat" >
            </button> --}}
            <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#editUser"> + Surat </button>
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
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item=>$key)
                            <tr class="text-center">
                                <td>{{ $item+1 }}</td>
                                <td>{{ $key->jenis_pemohon }}</td>
                                <td>{{ $key->user->name }}</td>
                                <td>{{ $key->judul_permohonan }}</td>
                                <td>{{ $key->tanggal_pelaksanaan }}</td>
                                <td>{{ $key->lokasi_pelaksanaan }}</td>
                                <td>{{ $key->jumlah_biaya }}</td>
                                <td>
                                    @if ($key->status == 'Verifikator')
                                        <span class="badge bg-danger">Sedang ditinjau Verifikator</span>
                                    @elseif($key->status == 'Setda')
                                        <span class="badge bg-warning">Sedang Ditinjau Setda</span>
                                    @else
                                        <span class="badge bg-info">Sedang Ditinjai Walikota</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ url('pemohon/surat/'.$key->id) }}" class="btn btn-primary btn-sm m-1" title="Detail Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 10px;height: 10px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </a>
                                    <a href="{{ url('pemohon/surat/'.$key->id.'/edit') }}" class="btn btn-warning btn-sm m-1" title="Edit Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 10px;height: 10px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </a>
                                    {{-- <form action="{{ url('pemohon/surat/'.$key->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus Surat">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 10px;height: 10px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3>Ajukan Permohonan Surat</h3>
                        <p>Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row g-3" method="POST" action="{{ url('pemohon/surat') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        {{-- <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">Nomor Surat</label>
                            <input type="text" id="modalEditUserFirstName" name="nomor_surat" class="form-control" placeholder="SKEP-187299-2022" />
                        </div> --}}
                        <div class="col-12">
                            <h5>Detail Kegiatan</h5>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Judul Permohonan</label>
                            <input type="text" id="modalEditUserLastName" name="judul_permohonan" class="form-control" placeholder="Judul Permohonan" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserName">Deskripsi Permohonan</label>
                            <input type="text" id="modalEditUserName" name="deskripsi_permohonan" class="form-control" placeholder="Deskripsi Permohonan" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Tanggal Pelaksanaan</label>
                            <input type="date" id="modalEditUserEmail" name="tanggal_pelaksanaan" class="form-control" placeholder="Tanggal Pelaksanaan" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Lokasi Pelaksanaan</label>
                            <input type="text" id="modalEditUserEmail" name="lokasi_pelaksanaan" class="form-control" placeholder="Lokasi Pelaksanaan" />
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Jumlah Biaya</label>
                            <input type="number" id="modalEditUserEmail" name="jumlah_biaya" class="form-control" placeholder="Jumlah Biaya" />
                        </div>
                        
                        
                        <hr>
                        <div class="col-12">
                            <h5>Detail Pemohon</h5>
                        </div>

                        {{-- <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Jenis Pemohon</label>
                            <select name="jenis_pemohon" class="form-control" id="jenis_pemohon" required>
                                <option value="" disabled selected> == Pilih == </option>
                                <option value="Individu">Individu</option>
                                <option value="Organisasi">Organisasi</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 hide" id="individu">
                            <label class="form-label" for="modalEditUserEmail">Nama Pemohon</label>
                            <input type="text" id="modalEditUserEmail" name="nama_pemohon" class="form-control" placeholder="Nama Pemohon" />
                        </div>
                        <div class="col-12 col-md-6 hide" id="nikindividu">
                            <label class="form-label" for="modalEditUserEmail">NIK Pemohon</label>
                            <input type="number" id="modalEditUserEmail" name="nama_pemohon" class="form-control" placeholder="NIK PEMOHON" />
                        </div> --}}
                      
                        {{-- {{ dd(Auth::user()->detail->jenis_pemohon) }} --}}

                        <div class="col-12 col-md-6">
                            <label for="" class="control-label">Jenis Pemohon</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->detail->jenis_pemohon }}" readonly disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="" class="control-label">Nama @if (Auth::user()->detail->jenis_pemohon == 'Individu')
                                Pemohon
                            @else
                                Organisasi
                            @endif</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->detail->nama }}" readonly disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="" class="control-label">Nomor @if (Auth::user()->detail->jenis_pemohon == 'Individu')
                                Pemohon
                            @else
                                Organisasi
                            @endif</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->detail->identitas }}" readonly disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="" class="control-label">Alamat @if (Auth::user()->detail->jenis_pemohon == 'Individu')
                                Pemohon
                            @else
                                Organisasi
                            @endif</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->detail->alamat }}" readonly disabled>
                        </div>

                        {{-- <div class="col-12 col-md-6 hide" id="organisasi">
                            <label class="form-label" for="modalEditUserEmail">Nama Organisasi</label>
                            <input type="text" id="modalEditUserEmail" name="nama_pemohon" class="form-control" placeholder="Nama Organisasi" />
                        </div>
                        <div class="col-12 col-md-6 hide" id="noorganisasi">
                            <label class="form-label" for="modalEditUserEmail">Nomor Organisasi</label>
                            <input type="text" id="modalEditUserEmail" name="nama_pemohon" class="form-control" placeholder="Nomor Organisasi" />
                        </div> --}}

                        
                        <hr>
                        <h5>Lampiran</h5>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Dokumen Proposal <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="dokumen_proposal" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Surat Keterangan</label>
                            <input type="file" id="modalEditUserEmail" name="surat_keterangan" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Surat Rekomendasi</label>
                            <input type="file" id="modalEditUserEmail" name="surat_rekomendasi" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--/ DataTable with Buttons -->

    <!--/ Multilingual -->
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