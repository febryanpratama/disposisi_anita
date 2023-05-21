<?php

namespace App\Http\Controllers\Setda;

use App\Http\Controllers\Controller;
use App\Services\Setda\SetdaService;
use Illuminate\Http\Request;

class SetdaController extends Controller
{
    //

    protected $setdaService;

    public function __construct(SetdaService $setdaService)
    {
        $this->setdaService = $setdaService;
    }

    public function indexIndividu()
    {

        $title = "List Data Surat";

        $response = $this->setdaService->getDataIndividu();

        return view("pages.setda.surat.index", [
            'title' => $title,
            'data' => $response['data']
        ]);
    }
    public function indexOrganisasi()
    {

        $title = "List Data Surat";

        $response = $this->setdaService->getDataOrganisasi();

        if ($response['status']) {
            # code...
            return view("pages.setda.surat.index", [
                'title' => $title,
                'data' => $response['data']
            ]);
        } else {
            return back()->withErrors($response['messages']);
        }
    }

    public function detail($surat_id)
    {
        // dd($surat_id);
        $title = "Detail Pengajuan";
        $response = $this->setdaService->detailSurat($surat_id);

        // dd($response);

        return view("pages.setda.surat.detail", [
            'title' => $title,
            'data' => $response['data']
        ]);
    }

    public function setuju(Request $request, $surat_id)
    {
        // dd($request->all());
        // $title = "Setujui Surat";

        $response = $this->setdaService->setuju($request->all(), $surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            // dd($response['message']);
            return back()->withErrors($response['message']);
        }
    }

    public function tolak($surat_id)
    {
        // $title = "Tolak Surat";

        $response = $this->setdaService->tolak($surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            return back()->withErrors($response['message']);
        }
    }
}
