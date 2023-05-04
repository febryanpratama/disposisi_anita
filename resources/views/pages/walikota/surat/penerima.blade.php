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
                        <button type="submit" class="btn btn-success">Export Excel</button>
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
                            <th class="text-center">Nama Pemohon</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item=>$key)
                            <tr class="text-center">
                                <td>{{ $item+1 }}</td>
                                <td>{{ $key->user->name }}</td>
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