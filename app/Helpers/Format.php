<?php

namespace App\Helpers;

use App\Models\Proposal;

class Format
{
    static function getRealisasiAnggaran($jenis, $tahun)
    {
        $check = Proposal::where('jenis_permohonan', $jenis)->where('tahun_anggaran', $tahun)->where('status', 'selesai')->sum('nominal_disetujui_walikota');

        return $check;
    }
}
