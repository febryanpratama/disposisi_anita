<?php

namespace App\Services\Setda;

use App\Models\Anggota;
use App\Models\BuktiPendukung;
use App\Models\LogProposal;
use App\Models\Proposal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SetdaService
{
    // 
    static function getDataIndividu()
    {
        $data = Proposal::with('user', 'log', 'user.detail', 'foto')->where('is_status', '2')->whereRelation('user.detail', 'jenis_pemohon', 'Individu')->get();
        // dd($data);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }
    static function getDataPertanggungjawaban()
    {
        $data = Proposal::with('user', 'log', 'user.detail', 'foto')->where('status', 'Selesai')->where('is_status', '1')->get();
        // dd($data);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }
    static function getDataOrganisasi()
    {
        $data = Proposal::with('user', 'log', 'user.detail')->where('is_status', '2')->whereRelation('user.detail', 'jenis_pemohon', 'Organisasi')->get();
        // dd($data);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }

    static function setuju($data, $surat_id)
    {

        $proposal = Proposal::where('id', $surat_id)->first();

        if (!$proposal) {
            return [
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ];
        }

        DB::beginTransaction();

        try {
            $proposal->update([
                'uraian_usulan' => $data['uraian_usulan'],
                'jumlah' => $data['jumlah'],
                'nominal_usulan' => $data['nominal_usulan'],
                'status' => 'Walikota'
            ]);

            // dd(count($data['bukti_pendukung']));
            foreach ($data['bukti_pendukung'] as $i) {

                // dd($i);
                $file = $i;
                $iname = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'bukti_pendukung';
                $file->move($tujuan_upload, $iname);


                BuktiPendukung::create([
                    'proposal_id' => $proposal->id,
                    'path_bukti' => $iname
                ]);
            }

            LogProposal::create([
                'proposal_id' => $surat_id,
                'tanggal' => Carbon::now(),
                'name' => 'KESRA',
                'deskripsi' => 'Surat Disetujui oleh Setda'
            ]);

            DB::commit();

            return [
                'status' => true,
                'message' => 'Surat Berhasil Disetujui'
            ];
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            DB::rollBack();
            return [
                'status' => false,
                'message' => 'terjadi error pada Server'
            ];
        }
    }

    static function tolak($surat_id)
    {
        $data = Proposal::find($surat_id);
        $data->is_status = "0";
        $data->save();

        LogProposal::create([
            'proposal_id' => $surat_id,
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Surat Ditolak oleh Setda'
        ]);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }

    static function detailSurat($surat_id)
    {
        $data = Proposal::with('log', 'user', 'user.detail', 'anggota')->where('id', $surat_id)->first();

        if (!$data) {
            return [
                'status' => false,
                'message' => "Data Tidak Ditemukan"
            ];
        }

        return [
            "status" => true,
            "message" => "Data Berhasil Ditemukan",
            "data" => $data
        ];
    }

    static function postAnggota($data)
    {
        $validator = Validator::make($data, [
            'nama' => 'required',
            'nip' => 'required|unique:anggotas,nip',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()->first()
            ];
        }

        DB::beginTransaction();

        try {
            //code...
            $user = User::create([
                'name' => $data['nama'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'is_active' => '1'
            ]);

            $user->assignRole('Anggota');

            $anggota = Anggota::create([
                'user_id' => $user->id,
                'nip' => $data['nip'],
                'nama' => $data['nama'],
            ]);

            DB::commit();

            return [
                'status' => true,
                'message' => 'Data Berhasil Ditambahkan',
                'data' => $anggota
            ];
        } catch (\Throwable $th) {
            //throw $th;

            DB::rollBack();
            return [
                'status' => false,
                'message' => 'Terjadi Error Pada Server'
            ];
        }
    }
}
