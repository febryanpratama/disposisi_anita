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
    public function index()
    {
        $title = "List Data Surat";

        $response = $this->walikotaService->getData();

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
}
