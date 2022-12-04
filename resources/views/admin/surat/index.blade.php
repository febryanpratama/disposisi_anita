@extends('layouts.base_admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">DataTables /</span> Basic
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser"> + Surat </button>
        </div>
        <div class="card-body">
            <div class="table-responsive pt-0">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">id</th>
                            <th class="text-center">Nomor Surat</th>
                            <th class="text-center">Asal Surat</th>
                            <th class="text-center">Tujuan</th>
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Sifat</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Tanggal Distribusi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                        <tr class="text-center">
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ $item->asal_surat }}</td>
                            <td>{{ $item->tujuan_surat }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->sifat }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_distribusi)->format('d M Y') }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @switch($item->status)
                                    @case('Dikirim')
                                        <a href="{{ url('admin/surat/'.$item->id.'/verifikasi') }}" class="btn btn-sm btn-info">Verifikasi</a>
                                        <a href="{{ url('admin/surat/'.$item->id.'/tolak') }}" class="btn btn-sm btn-danger">Tolak</a>
                                        @break
                                    @case('Verifikasi')
                                        <a href="{{ url('admin/surat/'.$item->id.'/diterima') }}" class="btn btn-sm btn-primary">Terima Surat</a>
                                        @break
                                    @case('Diterima')
                                        <a href="#" class="btn btn-sm btn-success">Diterima</a>
                                        @break
                                    @default
                                        
                                @endswitch
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
                        <h3>Edit User Information</h3>
                        <p>Updating user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row g-3" method="POST" action="{{ url('admin/surat') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">Nomor Surat</label>
                            <input type="text" id="modalEditUserFirstName" name="nomor_surat" class="form-control" placeholder="SKEP-187299-2022" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Asal Surat</label>
                            <input type="text" id="modalEditUserLastName" name="asal_surat" class="form-control" placeholder="Bupati" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserName">Tujuan Surat</label>
                            <input type="text" id="modalEditUserName" name="tujuan_surat" class="form-control" placeholder="Tujuan Surat" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Perihal</label>
                            <input type="text" id="modalEditUserEmail" name="perihal" class="form-control" placeholder="Perihal" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Sifat</label>
                            <input type="text" id="modalEditUserEmail" name="sifat" class="form-control" placeholder="Sifat" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Ringkasan</label>
                            <input type="text" id="modalEditUserEmail" name="ringkasan" class="form-control" placeholder="Ringkasan" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Keterangan</label>
                            <input type="text" id="modalEditUserEmail" name="keterangan" class="form-control" placeholder="Keterangan" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Tanggal Distribusi</label>
                            <input type="date" id="modalEditUserEmail" name="tanggal_distribusi" class="form-control" placeholder="Tanggal Distribusi" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Gambar Surat</label>
                            <input type="file" id="modalEditUserEmail" name="gambar_surat" class="form-control" placeholder="" />
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
    </script>
@endsection