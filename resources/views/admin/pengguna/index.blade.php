@extends('layouts.base_admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">DataTables /</span> Basic
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"> + Pengguna </button>
        </div>
        <div class="card-body">
            <div class="table-responsive pt-0">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">id</th>
                            <th class="text-center">Nama Pengguna</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Tanggal Buat</th>
                            <th class="text-center">Role</th>
                            {{-- <th class="text-center">Status</th> --}}
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                        {{-- {{ dd($item->roles[0]->name) }} --}}
                        <tr class="text-center">
                            <td>{{ $key+1 }}</td>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->email }}</th>
                            <th>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</th>
                            <td>
                                @switch(@$item->roles[0]->name)
                                    @case('Admin')
                                        <div class="alert alert-danger">{{ @$item->roles[0]->name }}</div>
                                        @break
                                        @case('Verifikator')
                                        <div class="alert alert-info">{{ @$item->roles[0]->name }}</div>
                                        @break
                                        @case('Walikota')
                                        <div class="alert alert-warning">{{ @$item->roles[0]->name }}</div>
                                        @break
                                        @case('Pemohon')
                                        <div class="alert alert-primary">{{ @$item->roles[0]->name }}</div>
                                        @break
                                        @case('Setda')
                                        <div class="alert alert-success">{{ @$item->roles[0]->name }}</div>
                                        @break
                                    @default
                                        
                                @endswitch
                            </td>
                            {{-- <th>@switch($item->is_active)
                                @case('Aktif')
                                    <div class="alert alert-primary">{{ $item->is_active }}</div>
                                    @break
                                @case('Tidak Aktif')
                                    
                                    <div class="alert alert-danger">{{ $item->is_active }}</div>
                                    @break
                                @default
                                    
                            @endswitch</th> --}}
                            <td>
                                <a href="{{ url('admin/pengguna/'.$item->id) }}">
                                    <button class="btn btn-sm btn-outline-info">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editUser{{ $item->id }}">
                                    <button class="btn btn-sm btn-outline-warning">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="">
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($data as $item)
        <div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3>Edit Informasi Pengguna</h3>
                        <p>Ubah Data Informasi Pengguna Anda. </p>
                    </div>
                    <form id="editUserForm" class="row g-3" method="POST" action="{{ url('admin/pengguna/ubah') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $item->id }}">
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">Nama Pengguna</label>
                            <input type="text" id="modalEditUserFirstName" name="name" class="form-control" value="{{ $item->detail->nama }}" placeholder="Febryan Pratama" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Email Pengguna</label>
                            <input type="text" id="modalEditUserLastName" name="email" class="form-control" value="{{ $item->email }}" placeholder="febryancpratama@gmail.com" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserName">Password</label>
                            <input type="text" id="modalEditUserName" name="password" class="form-control" placeholder="Password" />
                            <small class="text-danger">Kosongkan jika tidak mengubah password</small>
                        </div>
                        {{-- <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Re-Password</label>
                            <input type="text" id="modalEditUserEmail" name="re-password" class="form-control" placeholder="Ulangi Password" />
                        </div> --}}
                        {{-- <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Role</label>
                            <select name="role_name" class="form-control" id="">
                                <option value="" selected disabled> == PILIH == </option>
                                <option value="Walikota">Walikota</option>
                                <option value="Pemohon">Pemohon</option>
                                <option value="Setda">Setda</option>
                                <option value="Verifikator">Verifikator</option>
                            </select>
                        </div> --}}
                        {{-- <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Is Active</label>
                            <select name="is_active" class="form-control" id="">
                                <option value="" selected disabled> == PILIH == </option>
                                <option value="Aktif" {{ $item->is_active == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Tidak Aktif" {{ $item->is_active == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                        </div> --}}

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="Avatar">Avatar</label>
                            <input type="file" class="form-control" name="avatar" id="">
                            <small class="text-danger">Kosongkan jika tidak ingin diubah</small>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="Avatar">Nomor Identitas</label>
                            <input type="text" class="form-control" name="identitas" value="{{ $item->detail->identitas }}" id="">
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="Avatar">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $item->detail->alamat }}" id="">
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
    @endforeach
    <!-- Modal to add new record -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3>Add User Information</h3>
                        <p>Create user details will receive a privacy audit.</p>
                    </div>
                    <form id="editUserForm" class="row g-3" method="POST" action="{{ url('admin/pengguna') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserFirstName">Nama Pengguna</label>
                            <input type="text" id="modalEditUserFirstName" name="name" class="form-control" placeholder="Febryan Pratama" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserLastName">Email Pengguna</label>
                            <input type="text" id="modalEditUserLastName" name="email" class="form-control" placeholder="febryancpratama@gmail.com" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserName">Password</label>
                            <input type="text" id="modalEditUserName" name="password" class="form-control" placeholder="Password" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Re-Password</label>
                            <input type="text" id="modalEditUserEmail" name="re-password" class="form-control" placeholder="Ulangi Password" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Role</label>
                            <select name="role_name" class="form-control" id="">
                                <option value="" selected disabled> == PILIH == </option>
                                <option value="Walikota">Walikota</option>
                                <option value="Pemohon">Pemohon</option>
                                <option value="Setda">Setda</option>
                                <option value="Verifikator">Verifikator</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="modalEditUserEmail">Is Active</label>
                            <select name="is_active" class="form-control" id="">
                                <option value="" selected disabled> == PILIH == </option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class="form-label" for="Avatar">Avatar</label>
                            <input type="file" class="form-control" name="avatar" id="">
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