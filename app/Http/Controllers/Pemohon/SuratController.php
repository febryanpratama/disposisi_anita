<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use App\Models\DetailUsers;
use App\Models\User;
use App\Services\Pemohon\SuratService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return view('pages.pemohon.Surat.index', [
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

    public function detail($surat_id)
    {
        $response = $this->SuratPemohonService->detail($surat_id);

        if ($response['status'] == false) {
            # code...
            return back()->withErrors($response['message']);
        }

        // dd("owa");
        return view('pages.pemohon.Surat.detail', [
            'data' => $response['data']
        ]);
    }

    public function indexProfil()
    {
        $user = User::with('detail')->where('id', Auth::user()->id)->first();
        return view('pages.pemohon.profil', [
            'data' => $user
        ]);
    }

    public function editProfil(Request $request)
    {
        // dd($request->all());

        DB::beginTransaction();

        try {
            $user = User::where('id', Auth::user()->id)->first();

            if (!$user) {
                return back()->withErrors('Data User Tidak Ditemukan');
            }

            $user->update([
                'email' => $request['email']
            ]);

            if ($request['foto_identitas']) {
                $foto_identitas = $request->file('foto_identitas');
                $foto_identitas_name = time() . '.' . $foto_identitas->getClientOriginalExtension();
                $foto_identitas->move(public_path('uploads/foto_identitas'), $foto_identitas_name);

                $foto_identitas = $foto_identitas_name;
            }

            if ($request['foto_1']) {
                $foto_1 = $request->file('foto_1');
                $foto_1_name = time() . '.' . $foto_1->getClientOriginalExtension();
                $foto_1->move(public_path('uploads/foto_1'), $foto_1_name);

                $foto_1 = $foto_1_name;
            }

            $detailUser = DetailUsers::where('user_id', $user->id)->update([
                'nama' => $request['nama'],
                'nama_pimpinan' => $request['nama_pimpinan'],
                'identitas' => $request['identitas'],
                'no_telp' => $request['no_telp'],
                'bank' => $request['bank'],
                'no_rek' => $request['no_rek'],
                'nama_pemilik_rek' => $request['nama_pemilik_rek'],
                'alamat' => $request['alamat'],
                'foto_identitas' => $foto_identitas ?? null,
                'foto_1' => $foto_1 ?? null,
            ]);
            DB::commit();

            return back()->withSuccess('Berhasil Merubah Data Profil');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withErrors('Gagal Merubah Data Profil');
        }
    }
}
