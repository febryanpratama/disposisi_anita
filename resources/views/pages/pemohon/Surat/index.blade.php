@extends('layouts.base_admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">DataTables /</span> Basic
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <a href="{{ asset('exampledoc/contohsurat.pdf') }}" class="btn btn-outline-danger m-1" title="Untuh Surat" >
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 10px;height: 10px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
                Contoh Surat
            </a>
            {{-- <button type="button" class="btn btn-danger m-1" title="Untuh Surat" >
            </button> --}}
            <button type="button" class="btn btn-outline-primary m-1" data-bs-toggle="modal" data-bs-target="#editUser"> + Surat </button>
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
                        {{--  --}}
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
                                    <a href="{{ url('pemohon/surat/'.$key->id) }}" class="btn btn-outline-primary btn-sm m-1" title="Detail Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 20px;height: 20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                        </svg>

                                    </a>
                                    <a href="{{ url('pemohon/surat/'.$key->id) }}" class="btn btn-outline-info btn-sm m-1" title="Cetak Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 20px;height: 20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75l3 3m0 0l3-3m-3 3v-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>

                                    </a>
                                    <a href="{{ url('pemohon/surat/'.$key->id.'/edit') }}" class="btn btn-outline-warning btn-sm m-1" title="Edit Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="width: 20px;height: 20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </a>
                                    <a href="{{ url('pemohon/surat/'.$key->id.'/edit') }}" class="btn btn-outline-danger btn-sm m-1" title="Hapus Surat">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" style="widht: 20px;height: 20px" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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
                            <label class="form-label" for="modalEditUserLastName">Tahun Anggaran</label>
                            <select name="tahun_anggaran" class="form-control" id="">
                                <option value="" selected disabled> == Pilih == </option>
                                @for ($i = 2022; $i < 2030; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
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
                            <label class="form-label" for="modalEditUserEmail">Surat Permohonan <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="surat_permohonan" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Dokumen Proposal <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="dokumen_proposal" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Lampiran Proposal <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="lampiran_proposal" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Susunan Kepengurusan Kepanitiaan <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="kepengurusan" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Rancangan Anggaran Biaya <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="rab" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Foto Rekening Bantuan Penerima <span class="text-danger">*</span></label>
                            <input type="file" id="modalEditUserEmail" name="rekening" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Surat Keterangan Desa</label>
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