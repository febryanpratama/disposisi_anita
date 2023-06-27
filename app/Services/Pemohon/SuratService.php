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
            'surat_keterangan' => 'nullable|file|mimes:pdf,docx|max:2048',
            'surat_rekomendasi' => 'nullable|file|mimes:pdf,docx|max:2048',
            'surat_permohonan' => 'nullable|file|mimes:pdf,docx|max:2048',
            'lampiran_proposal' => 'nullable|file|mimes:pdf,docx|max:2048',
            'kepengurusan' => 'nullable|file|mimes:pdf,docx|max:2048',
            'rab' => 'nullable|file|mimes:pdf,docx|max:2048',
            'rekening' => 'nullable|file|mimes:pdf,docx|max:2048'
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

            if (array_key_exists('surat_keterangan', $data)) {
                $file = $data['surat_keterangan'];
                $surat_keterangan = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_keterangan';
                $file->move($tujuan_upload, $surat_keterangan);
            }

            if (array_key_exists('surat_rekomendasi', $data)) {
                $file = $data['surat_rekomendasi'];
                $surat_rekomendasi = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_rekomendasi';
                $file->move($tujuan_upload, $surat_rekomendasi);
            }

            if (array_key_exists('rekening', $data)) {
                $file = $data['rekening'];
                $rekening = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'rekening';
                $file->move($tujuan_upload, $rekening);
            }
            if (array_key_exists('rab', $data)) {
                $file = $data['rab'];
                $rab = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'rab';
                $file->move($tujuan_upload, $rab);
            }
            if (array_key_exists('kepengurusan', $data)) {
                $file = $data['kepengurusan'];
                $kepengurusan = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'kepengurusan';
                $file->move($tujuan_upload, $kepengurusan);
            }

            if (array_key_exists('lampiran_proposal', $data)) {
                $file = $data['lampiran_proposal'];
                $lampiran_proposal = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'lampiran_proposal';
                $file->move($tujuan_upload, $lampiran_proposal);
            }
            if (array_key_exists('surat_permohonan', $data)) {
                $file = $data['surat_permohonan'];
                $surat_permohonan = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
                $tujuan_upload = 'surat_permohonan';
                $file->move($tujuan_upload, $surat_permohonan);
            }

            $proposal = Proposal::create([
                'user_id' => $data['user_id'],
                'tahun_anggaran' => $data['tahun_anggaran'],
                'judul_permohonan' => $data['judul_permohonan'],
                'deskripsi_permohonan' => $data['deskripsi_permohonan'],
                'tanggal_pelaksanaan' => $data['tanggal_pelaksanaan'],
                'lokasi_pelaksanaan' => $data['lokasi_pelaksanaan'],
                'jumlah_biaya' => $data['jumlah_biaya'],
                'jenis_pemohon' => Auth::user()->detail->jenis_pemohon,
                'dokumen_proposal' => $dokumen_proposal,
                'surat_keterangan' => $surat_keterangan ?? null,
                'surat_rekomendasi' => $surat_rekomendasi ?? null,
                'rab' => $rab ?? null,
                'kepengurusan' => $kepengurusan ?? null,
                'lampiran_proposal' => $lampiran_proposal ?? null,
                'surat_permohonan' => $surat_permohonan ?? null,
                'rekening' => $rekening ?? null,
                'status' => 'TU Umum',
                'is_status' => '1'
            ]);

            LogProposal::create([
                'proposal_id' => $proposal->id,
                'tanggal' => Carbon::now(),
                'deskripsi' => "Proposal Baru Dibuat",
            ]);

            DB::commit();


            return [
                'status' => true,
                'message' => 'Data Proposal Berhasil Disimpan',
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
