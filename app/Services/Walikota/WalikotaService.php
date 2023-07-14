<?php

namespace App\Services\Walikota;

use App\Models\LogProposal;
use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class WalikotaService
{
    static function getDataIndividu()
    {
        $data = Proposal::with('user', 'log')->where('status', 'Walikota')->where('jenis_pemohon', 'Individu')->whereIn('is_status', ['1', '2'])->get();
        // dd($data);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }
    static function getDataOrganisasi()
    {
        $data = Proposal::with('user', 'log')->where('status', 'Walikota')->where('jenis_pemohon', 'Organisasi')->whereIn('is_status', ['1', '2'])->get();
        // dd($data);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }

    static function setuju($surat_id)
    {
        $data = Proposal::find($surat_id);
        $data->is_status = '1';
        $data->save();

        LogProposal::create([
            'proposal_id' => $surat_id,
            'tanggal' => Carbon::now(),
            'name' => 'Admin Walikota',
            'deskripsi' => 'Surat Disetujui oleh Walikota'
        ]);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }

    static function tolak($surat_id)
    {
        $data = Proposal::find($surat_id);
        $data->is_status = "0";
        $data->save();

        LogProposal::create([
            'proposal_id' => $surat_id,
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Surat Ditolak oleh Walikota'
        ]);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }

    static function historiPengajuan($tahun = null)
    {
        if (!$tahun) {
            $data = Proposal::with('user', 'log')->whereYear('created_at', Carbon::now()->year)->where('status', 'Walikota')->whereIn('is_status', ['1', '2'])->get();
        } else {
            $data = Proposal::with('user', 'log')->whereYear('created_at', $tahun)->where('status', 'Walikota')->whereIn('is_status', ['1', '2'])->get();
        }
        // dd($data);


        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }
}
