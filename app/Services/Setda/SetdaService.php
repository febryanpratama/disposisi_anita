<?php

namespace App\Services\Setda;

use App\Models\LogProposal;
use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SetdaService
{
    // 
    static function getData()
    {
        $data = Proposal::with('user', 'log')->where('status', 'Setda')->where('is_status', '2')->get();
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
        $data->status = 'Walikota';
        $data->save();

        LogProposal::create([
            'proposal_id' => $surat_id,
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Surat Disetujui oleh Setda'
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
            'deskripsi' => 'Surat Ditolak oleh Setda'
        ]);

        return [
            'status' => true,
            'message' => 'Data Berhasil Diambil',
            'data' => $data
        ];
    }
}
