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

    static function getCountPermohonan($stats, $tahun){

        if($stats == 'Total'){
            $check = Proposal::where('tahun_anggaran', $tahun)->count();

            return $check;
        }else if($stats == 'Diproses'){
            $check = Proposal::where('tahun_anggaran', $tahun)->whereNotIn('status', ['Ditolak', 'Selesai'])->count();
            
            return $check;
        }else if($stats == 'Ditolak'){
            $check = Proposal::where('tahun_anggaran', $tahun)->where('status', 'Ditolak')->count();

            return $check;
        }else if($stats == 'Disetujui'){
            
            $check = Proposal::where('tahun_anggaran', $tahun)->where('status', 'Selesai')->count();

            return $check;
        }else{
            return 0;
        }

    }
}
