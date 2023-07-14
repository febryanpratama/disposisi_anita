<?php

namespace App\Http\Controllers\Walikota;

use App\Http\Controllers\Controller;
use App\Models\LogProposal;
use App\Models\Proposal;
use App\Services\Walikota\WalikotaService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WalikotaController extends Controller
{
    //

    protected $walikotaService;

    public function __construct(WalikotaService $walikotaService)
    {
        $this->walikotaService = $walikotaService;
    }
    public function indexIndividu()
    {
        $title = "List Data Pengajuan Individu";

        $response = $this->walikotaService->getDataIndividu();

        return view('pages.walikota.surat.index', [
            'title' => $title,
            'data' => $response['data']
        ]);
    }

    public function indexOrganisasi()
    {
        $title = "List Data Pengajuan Organisasi";

        $response = $this->walikotaService->getDataOrganisasi();

        return view('pages.walikota.surat.index', [
            'title' => $title,
            'data' => $response['data']
        ]);
    }

    public function ubah(Request $request, $surat_id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'surat_id' => 'required|numeric|exists:proposals,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // dd($request->all());
        $proposal = Proposal::where('id', $surat_id)->update([
            'catatan_walikota' => $request['catatan_walikota'],
            // 'jumlah' => $request['jumlah'],
            'is_status' => '1',
            'nominal_disetujui_walikota' => $request['nominal_disetujui_walikota'],
            'status' => 'Selesai'
        ]);

        // dd($proposal);


        LogProposal::create([
            'proposal_id' => $surat_id,
            'catatan' => $request->catatan ?? null,
            'name' => 'Walikota',
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Proposal telah disetujui oleh Walikota'
        ]);

        return back()->withSuccess('Berhasil Mengubah Data');
    }
    public function setuju($surat_id)
    {
        // $title = "Setujui Surat";

        $response = $this->walikotaService->setuju($surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            return back()->withErrors($response['message']);
        }
    }

    public function tolak($surat_id)
    {
        // $title = "Tolak Surat";

        $response = $this->walikotaService->tolak($surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            return back()->withErrors($response['message']);
        }
    }

    public function historiPengajuan()
    {
        $response = $this->walikotaService->historiPengajuan();
        // dd($data);

        return view('pages.walikota.surat.histori', [
            'data' => $response['data']
        ]);
    }
    public function caridaftarpenerima()
    {
        $response = $this->walikotaService->historiPengajuan();
        // dd($data);

        return view('pages.walikota.surat.penerima', [
            'data' => $response['data']
        ]);
    }

    public function cariHistoriPengajuan(Request $request)
    {
        // dd($request->all());
        $response = $this->walikotaService->historiPengajuan($request->tahun);
        return view('pages.walikota.surat.histori', [
            'data' => $response['data']
        ]);
    }

    public function detailSurat($surat_id)
    {

        // dd($surat_id);
        $data = Proposal::with('log', 'user', 'user.detail', 'anggota')->where('id', $surat_id)->first();

        return view('pages.walikota.surat.detail', [
            'data' => $data,
            'surat_id' => $surat_id
        ]);
    }
}
