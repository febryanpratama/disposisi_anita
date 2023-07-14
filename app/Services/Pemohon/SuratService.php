<?php

namespace App\Services\Pemohon;

use App\Models\LogProposal;
use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SuratService
{
    static function getData()
    {
        // 
        $proposal = Proposal::with('user')->where('user_id', Auth::user()->id)->get();
        return [
            'status' => false,
            'message' => 'Data Surat Berhasil Diambil',
            'data' => $proposal,
        ];
    }

    static function storeData($data)
    {
        // 
        $validator = Validator::make($data, [
            'user_id' => 'required|exists:users,id',
            'judul_permohonan' => 'required',
            'deskripsi_permohonan' => 'required',
            'tanggal_pelaksanaan' => 'required|date|date_format:Y-m-d',
            'lokasi_pelaksanaan' => 'required',
            'jumlah_biaya' => 'required|numeric',
            'dokumen_proposal' => 'required|file|mimes:pdf,docx|max:2048',
            'surat_keterangan_domisili' => 'required|file|mimes:pdf,docx|max:2048',
            'surat_rekomendasi_kecamatan' => 'required|file|mimes:pdf,docx|max:2048',
            'surat_pernyataan_konflik' => 'required|file|mimes:pdf,docx|max:2048',
            'surat_duplikasi_biaya' => 'required|file|mimes:pdf,docx|max:2048',
            'rekening' => 'required|file|mimes:pdf,docx|max:2048',
            'surat_pernyataan_lembaga' => 'nullable|file|mimes:pdf,docx|max:2048',
        ]);

        if ($validator->fails()) {
            # code...
            dd($validator);
            return [
                'status' => false,
                'message' => $validator->errors()->first(),
                'data' => null,
            ];
        }

        DB::beginTransaction();

        try {
            //code...
            if (array_key_exists('dokumen_proposal', $data)) {
                $file = $data['dokumen_proposal'];
                $dokumen_proposal = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'dokumen_proposal';
                $file->move($tujuan_upload, $dokumen_proposal);
            }

            if (array_key_exists('surat_keterangan_domisili', $data)) {
                $file = $data['surat_keterangan_domisili'];
                $surat_keterangan = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_keterangan_domisili';
                $file->move($tujuan_upload, $surat_keterangan);
            }

            if (array_key_exists('surat_rekomendasi_kecamatan', $data)) {
                $file = $data['surat_rekomendasi_kecamatan'];
                $surat_rekomendasi = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_rekomendasi_kecamatan';
                $file->move($tujuan_upload, $surat_rekomendasi);
            }

            if (array_key_exists('rekening', $data)) {
                $file = $data['rekening'];
                $rekening = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'rekening';
                $file->move($tujuan_upload, $rekening);
            }
            if (array_key_exists('surat_pernyataan_konflik', $data)) {
                $file = $data['surat_pernyataan_konflik'];
                $rab = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_pernyataan_konflik';
                $file->move($tujuan_upload, $rab);
            }
            if (array_key_exists('surat_duplikasi_biaya', $data)) {
                $file = $data['surat_duplikasi_biaya'];
                $kepengurusan = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_duplikasi_biaya';
                $file->move($tujuan_upload, $kepengurusan);
            }

            if (array_key_exists('surat_pernyataan_lembaga', $data)) {
                $file = $data['surat_pernyataan_lembaga'];
                $lampiran_proposal = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_pernyataan_lembaga';
                $file->move($tujuan_upload, $lampiran_proposal);
            }

            $proposal = Proposal::create([
                'user_id' => $data['user_id'],
                // 'tahun_anggaran' => $data['tahun_anggaran'],
                'judul_permohonan' => $data['judul_permohonan'],
                'deskripsi_permohonan' => $data['deskripsi_permohonan'],
                'tanggal_pelaksanaan' => $data['tanggal_pelaksanaan'],
                'lokasi_pelaksanaan' => $data['lokasi_pelaksanaan'],
                'jumlah_biaya' => $data['jumlah_biaya'],
                'jenis_pemohon' => Auth::user()->detail->jenis_pemohon,
                'dokumen_proposal' => $dokumen_proposal,
                'surat_keterangan_domisili' => $surat_keterangan ?? null,
                'surat_rekomendasi_kecamatan' => $surat_rekomendasi ?? null,
                'surat_pernyataan_konflik' => $rab ?? null,
                'surat_duplikasi_biaya' => $kepengurusan ?? null,
                'rekening' => $rekening ?? null,
                'surat_pernyataan_lembaga' => $lampiran_proposal ?? null,
                'status' => 'TU Umum',
                'is_status' => '2'
            ]);

            LogProposal::create([
                'proposal_id' => $proposal->id,
                'tanggal' => Carbon::now(),
                'name' => Auth::user()->name,
                'deskripsi' => "Proposal Baru Dibuat",
            ]);

            DB::commit();


            return [
                'status' => true,
                'message' => 'Pengajuan Proposal Berhasil Disimpan',
                'data' => null,
            ];
        } catch (\Throwable $th) {
            //throw $th;

            dd($th->getMessage());
            DB::rollback();
            return [
                'status' => false,
                'message' => 'Data Proposal Gagal Disimpan',
                'data' => null,
            ];
        }
    }


    static function detail($surat_id)
    {
        $proposal = Proposal::with('user', 'log', 'user.detail')->where('id', $surat_id)->where('user_id', Auth::user()->id)->first();
        // dd($proposal);

        if (!$proposal) {
            # code...
            return [
                'status' => false,
                'message' => 'Data Proposal Tidak Ditemukan',
                'data' => null,
            ];
        }

        return [
            'status' => true,
            'message' => 'Data Surat Berhasil Diambil',
            'data' => $proposal,
        ];
    }
}
