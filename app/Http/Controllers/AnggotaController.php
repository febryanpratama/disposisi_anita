<?php

namespace App\Http\Controllers;

use App\Models\FotoLapangan;
use App\Models\Proposal;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    //

    public function indexSurat()
    {
        $data = Proposal::with('log', 'user', 'user.detail', 'anggota')->where('anggota_id', auth()->user()->anggota->id)->get();

        // Proposal::with('log', 'user', 'user.detail', 'anggota')
        // dd($data);
        return view('pages.anggota.surat.index', [
            'data' => $data
        ]);
    }

    public function detailSurat($surat_id)
    {
        // dd($surat_id);
        $data = Proposal::with('log', 'user', 'user.detail', 'anggota', 'foto')->where('id', $surat_id)->first();
        // dd($data);
        // $anggota = Anggota::get()
        return view('pages.anggota.surat.detail', [
            'data' => $data,
            'surat_id' => $surat_id
        ]);
    }

    public function inputDataLapangan(Request $request)
    {
        // dd($request->all());
        // dd($reques);
        foreach ($request->foto_lapangan as $item) {

            // dd($item);
            $iname = time() . "_" . $item->getClientOriginalName() . "." . $item->getClientOriginalExtension();
            $tujuan_upload = 'file_lapangan';
            $item->move($tujuan_upload, $iname);

            FotoLapangan::create([
                'proposal_id' => $request['surat_id'],
                'foto_lapangan' => $iname
            ]);
        }

        return back()->withSuccess('Data Lapangan Berhasil Diinput');
    }
}
