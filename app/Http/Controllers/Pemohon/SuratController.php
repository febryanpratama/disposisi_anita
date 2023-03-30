<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Services\Pemohon\SuratService;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    //

    protected $SuratPemohonService;
    public function __construct(SuratService $SuratPemohonService)
    {
        $this->SuratPemohonService = $SuratPemohonService;
    }

    public function index()
    {
        // return "ok";
        $response = $this->SuratPemohonService->getData();

        return view('pages.pemohon.surat.index', [
            'data' => $response['data']
        ]);
    }

    public function inputSurat(Request $request)
    {

        // dd($request->all());
        $response = $this->SuratPemohonService->storeData($request->all());

        // dd($response);
        if ($response['status'] == false) {
            return back()->withErrors($response['message']);
        }

        return back()->withSuccess($response['message']);
    }
}
