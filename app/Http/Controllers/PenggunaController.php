<?php

namespace App\Http\Controllers;

use App\Services\PenggunaService;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    //
    protected $penggunaService;

    public function __construct(PenggunaService $penggunaService)
    {
        $this->penggunaService = $penggunaService;
    }

    public function index()
    {
        $response = $this->penggunaService->getPengguna();

        // dd($response);
        return view('admin.pengguna.index', [
            'data' => $response
        ]);
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $response = $this->penggunaService->storePengguna($request->all());

        if ($response['status']) {
            return back()->with('success', $response['message']);
        } else {
            return back()->with('error', $response['message']);
        }
    }
}
