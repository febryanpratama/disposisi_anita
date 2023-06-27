<?php

namespace App\Http\Controllers;

use App\Models\DetailUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('pages.auth.register');
    }

    public function storeData(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            // 'nama' => 'required',
            // 'identitas' => 'required',
            'alamat' => 'required',
            'jenis_pemohon' => 'required',
        ]);

        if ($validator->fails()) {
            # code...
            // dd($validator->errors()->first());
            return back()->withErrors($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $nama = $request->nama_pemohon == null ? $request->nama_organisasi : $request->nama_pemohon;
            $identitas = $request->identitas_pemohon == null ? $request->identitas_organisasi : $request->identitas_pemohon;

            // dd($nama);
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'name' => $nama ?? $request->nama_organisasi,
            ]);

            $detailUsers = DetailUsers::create([
                'user_id' => $user->id,
                'nama' => $nama,
                'identitas' => $identitas,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'jenis_pemohon' => $request->jenis_pemohon,
            ]);

            $user->assignRole('Pemohon');

            DB::commit();

            return redirect('/login')->withSuccess('Berhasil mendaftar, silahkan login');
        } catch (\Throwable $th) {
            //throw $th;

            dd($th->getMessage());
            DB::rollBack();
            return back()->withErrors($th->getMessage());
        }
    }
}
