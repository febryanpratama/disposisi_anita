@extends('layouts.base_admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">DataTables /</span> Basic
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <form action="{{ url('walikota/histori-pengajuan') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <select name="tahun" class="form-control" aria-placeholder="2020" id="">
                            <option value="" disabled selected> == Pilih Tahun == </option>
                            @for ($i = 2022; $i < 2030; $i++)
                            <option value="{{ $i }}"> {{ $i }} </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
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
                        @foreach ($data as $item=>$key)
                            <tr class="text-center">
                                <td>{{ $item+1 }}</td>
                                <td>{{ $key->jenis_pemohon }}</td>
                                <td>{{ $key->user->name }}</td>
                                <td>{{ $key->judul_permohonan }}</td>
                                <td>{{ $key->tanggal_pelaksanaan }}</td>
                                <td>{{ $key->lokasi_pelaksanaan }}</td>
                                <td>{{ number_format($key->jumlah_biaya) }}</td>
                                <td>
                                    @if ($key->status == 'Verifikator')
                                        <span class="badge bg-danger">Sedang ditinjau Verifikator</span>
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
                                    <a href="{{ url('walikota/surat/'.$key->id) }}" class="btn btn-primary btn-sm m-1" title="Detail Surat">
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
                                            <li><a class="dropdown-item" href="{{ url('walikota/surat/'.$key->id.'/setuju') }}">Setuju</a></li>
                                            <li><a class="dropdown-item" href="{{ url('walikota/surat/'.$key->id.'/tolak') }}">Tolak</a></li>
                                        </ul>
                                    </div>
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