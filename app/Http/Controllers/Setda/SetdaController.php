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

    public function index()
    {

        $title = "List Data Surat";

        $response = $this->setdaService->getData();

        return view("pages.setda.surat.index", [
            'title' => $title,
            'data' => $response['data']
        ]);
    }

    public function setuju($surat_id)
    {
        // $title = "Setujui Surat";

        $response = $this->setdaService->setuju($surat_id);

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

        $response = $this->setdaService->tolak($surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            return back()->withErrors($response['message']);
        }
    }
}
