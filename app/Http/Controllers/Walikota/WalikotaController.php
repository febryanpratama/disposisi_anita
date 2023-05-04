<?php

namespace App\Http\Controllers\Walikota;

use App\Http\Controllers\Controller;
use App\Services\Walikota\WalikotaService;
use Illuminate\Http\Request;

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
}
