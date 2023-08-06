<?php

namespace App\Http\Controllers;

use App\Models\DetailUsers;
use App\Models\User;
use App\Services\PenggunaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function ubah(Request $request)
    {
        // dd($request->all());

        $check = User::where('id', $request['user_id'])->first();

        if (!$check) {
            return back()->withErrors("Data Tidak Ditemukan");
        }

        if (!$request['password']) {
            $check->update([
                'password' => Hash::make($request['password'])
            ]);
        }

        if (array_key_exists('avatar', $request->all())) {
            $file = $request['avatar'];
            $avatar = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = 'avatar';
            $file->move($tujuan_upload, $avatar);

            $check->update([
                'avatar' => $request['avatar']
            ]);
        }

        $check->update([
            'name' => $request['name']
        ]);

        $detail = DetailUsers::where('user_id', $request['user_id'])->first();

        if (!$detail) {
            return back()->withErrors("Detail User Tidak Ditemukan");
        }

        $detail->update([
            'identitas' => $request['identitas'],
            'alamat' => $request['alamat'],
        ]);

        return back()->withSuccess('Berhasil Mengubah Data Pengguna');
    }
}
