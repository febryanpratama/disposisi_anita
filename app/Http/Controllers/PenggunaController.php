<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function detail($pengguna_id)
    {
        // dd($pengguna_id);
        $data = User::with('detail')->where('id', $pengguna_id)->first();
        // dd($data);
        if (!$data) {
            return back()->with('error', 'Data tidak ditemukan');
        }

        return view('admin.pengguna.detail', [
            'data' => $data
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
