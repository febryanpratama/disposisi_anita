@extends('layouts.base_admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">DataTables /</span> Basic
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-header d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser"> + Anggaran </button>
        </div>
        <div class="card-body">
            <div class="table-responsive pt-0">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center">No</th>
                            <th class="text-center">Jenis Anggaran</th>
                            <th class="text-center">Nominal</th>
                            <th class="text-center">Tahun Anggaran</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$item)
                            <tr class="text-center">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->jenis_anggaran }}</td>
                                <td>{{ number_format($item->nominal_anggaran) }}</td>
                                <td>{{ $item->tahun_anggaran }}</td>
                                <td>
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#editAnggaran{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#"  data-bs-toggle="modal" data-bs-target="#hapusAnggaran{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($data as $edit)
        
        <div class="modal fade" id="editAnggaran{{ $edit->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Ubah Anggaran</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, delectus?</p>
                        </div>
                        <form id="editUserForm" class="row g-3" method="POST" action="{{ url('admin/anggaran/ubah') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="anggaran_id" value="{{ $edit->id }}">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="modalEditUserFirstName">Jenis Anggaran</label>
                                <select name="jenis_anggaran" class="form-control" id="">
                                    <option value="" selected disabled> == Pilih == </option>
                                    <option value="Bantuan Sosial" {{ $edit->jenis_anggaran == 'Bantuan Sosial' ? 'selected' : '' }}>Bantuan Sosial</option>
                                    <option value="Hibah" {{ $edit->jenis_anggaran == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="modalEditUserLastName">Nominal Anggaran</label>
                                <input type="number" id="modalEditUserLastName" name="nominal_anggaran" value="{{ $edit->nominal_anggaran }}" class="form-control" placeholder="" />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="modalEditUserName">Tahun Anggaran</label>
                                <select name="tahun_anggaran" class="form-control" id="">
                                    <option value="" selected disabled> == Pilih == </option>
                                    @for ($i = 2020; $i < 2030; $i++)
                                        <option value="{{ $i }}" {{ $edit->tahun_anggaran == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
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

        <div class="modal fade" id="hapusAnggaran{{ $edit->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Hapus Anggaran</h3>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, delectus?</p>
                        </div>
                        <form id="editUserForm" class="row g-3" method="POST" action="{{ url('admin/anggaran/delete') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="anggaran_id" value="{{ $edit->id }}">
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="modalEditUserFirstName">Jenis Anggaran</label>
                                <select name="jenis_anggaran" class="form-control" id="" disabled>
                                    <option value="" selected disabled> == Pilih == </option>
                                    <option value="Bantuan Sosial" {{ $edit->jenis_anggaran == 'Bantuan Sosial' ? 'selected' : '' }}>Bantuan Sosial</option>
                                    <option value="Hibah" {{ $edit->jenis_anggaran == 'Hibah' ? 'selected' : '' }}>Hibah</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="modalEditUserLastName">Nominal Anggaran</label>
                                <input type="number" id="rupiah" name="nominal_anggaran" value="{{ $edit->nominal_anggaran }}" class="form-control" placeholder="" disabled />
                            </div>
                            <div class="col-12 col-md-12">
                                <label class="form-label" for="modalEditUserName">Tahun Anggaran</label>
                                <select name="tahun_anggaran" class="form-control" id="" disabled>
                                    <option value="" selected disabled> == Pilih == </option>
                                    @for ($i = 2020; $i < 2030; $i++)
                                        <option value="{{ $i }}" {{ $edit->tahun_anggaran == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
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
        <div class="modal-dialog modal-simple modal-edit-user">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3>Tambah Anggaran</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vitae, delectus?</p>
                    </div>
                    <form id="editUserForm" class="row g-3" method="POST" action="{{ url('admin/anggaran') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalEditUserFirstName">Jenis Anggaran</label>
                            <select name="jenis_anggaran" class="form-control" id="">
                                <option value="" selected disabled> == Pilih == </option>
                                <option value="Bantuan Sosial">Bantuan Sosial</option>
                                <option value="Hibah">Hibah</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalEditUserLastName">Nominal Anggaran</label>
                            <input type="number" id="modalEditUserLastName" name="nominal_anggaran" class="form-control" placeholder="" />
                        </div>
                        <div class="col-12 col-md-12">
                            <label class="form-label" for="modalEditUserName">Tahun Anggaran</label>
                            <select name="tahun_anggaran" class="form-control" id="">
                                <option value="" selected disabled> == Pilih == </option>
                                @for ($i = 2020; $i < 2030; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
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
    <script>
        var rupiah = document.getElementById('rupiah');
        $('#rupiah').on('keyup', function(e){
        //   console.log("ok")
          rupiah.value = formatRupiah(this.value, 'Rp. ');
        })
        // rupiah.on('keyup', function(e){
        //   // tambahkan 'Rp.' pada saat form di ketik
        //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        // });
    
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split   		= number_string.split(','),
          sisa     		= split[0].length % 3,
          rupiah     		= split[0].substr(0, sisa),
          ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    
          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }
    
          rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
          return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
@endsection